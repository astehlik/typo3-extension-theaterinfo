<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Updates;

use Doctrine\DBAL\Types\Types;
use TYPO3\CMS\Core\Attribute\UpgradeWizard;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Upgrades\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Core\Upgrades\UpgradeWizardInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

#[UpgradeWizard('txTheaterinfoMmTableMigration')]
class ManyToManyTableMigration implements UpgradeWizardInterface
{
    private const INSERT_FIELDS = [
        'uid_local',
        'uid_foreign',
        'sorting',
        'sorting_foreign',
    ];

    private const INSERT_TYPES = [
        Types::INTEGER,
        Types::INTEGER,
        Types::INTEGER,
        Types::INTEGER,
    ];

    private const TABLE_SUFFIXES = [
        'role',
        'helper',
    ];

    public function __construct(
        private readonly ConnectionPool $connectionPool,
    ) {}

    public function executeUpdate(): bool
    {
        foreach (self::TABLE_SUFFIXES as $tableSuffix) {
            $this->migrateTable($tableSuffix);
        }

        return true;
    }

    public function getDescription(): string
    {
        return 'Migrate role-to-actor and helper-to-actor relations from comma separated lists to MM tables';
    }

    public function getPrerequisites(): array
    {
        return [DatabaseUpdatedPrerequisite::class];
    }

    public function getTitle(): string
    {
        return 'EXT:theaterinfo: MM table migration';
    }

    public function updateNecessary(): bool
    {
        foreach (self::TABLE_SUFFIXES as $tableSuffix) {
            $count = $this->createBuilder($tableSuffix)
                ->count('uid')
                ->executeQuery()
                ->fetchOne();

            if ($count > 0) {
                return true;
            }

            $baseTable = $this->buildBaseTableName($tableSuffix);
            $builder = $this->connectionPool->getQueryBuilderForTable($baseTable);
            $countEmptyFields = $builder->count('uid')
                ->from($baseTable)
                ->where($builder->expr()->eq('actors', $builder->expr()->literal('')))
                ->orWhere($builder->expr()->isNull('actors'))
                ->executeQuery()
                ->fetchOne();

            if ($countEmptyFields > 0) {
                return true;
            }
        }

        return false;
    }

    private function buildBaseTableName(string $baseTableSuffix): string
    {
        return sprintf('tx_theaterinfo_domain_model_%s', $baseTableSuffix);
    }

    private function buildMmTableName(string $baseTableSuffix): string
    {
        return sprintf('tx_theaterinfo_domain_model_%s_actor_mm', $baseTableSuffix);
    }

    private function createBuilder(string $baseTableSuffix): QueryBuilder
    {
        $baseTable = $this->buildBaseTableName($baseTableSuffix);
        $mmTable = $this->buildMmTableName($baseTableSuffix);
        $actorsField = sprintf('%s.actors', $baseTableSuffix);

        $builder = $this->connectionPool->getQueryBuilderForTable($baseTable);

        $builder->getRestrictions()->removeAll();

        $joinCondition = $builder->expr()->eq('mm.uid_local', $builder->quoteIdentifier($baseTableSuffix . '.uid'));

        $builder->from($baseTable, $baseTableSuffix)
            ->leftJoin($baseTableSuffix, $mmTable, 'mm', $joinCondition)
            ->where($builder->expr()->isNotNull($actorsField))
            ->andWhere($builder->expr()->neq($actorsField, $builder->expr()->literal('')))
            ->andWhere($builder->expr()->neq($actorsField, $builder->expr()->literal('0')))
            ->andWhere($builder->expr()->isNull('mm.uid_local'));

        return $builder;
    }

    private function migrateTable(string $baseTableSuffix): void
    {
        $baseTable = $this->buildBaseTableName($baseTableSuffix);
        $mmTable = $this->buildMmTableName($baseTableSuffix);

        $builder = $this->createBuilder($baseTableSuffix);

        $builder->select('uid', 'actors')
            ->distinct()
            ->executeQuery();

        while ($row = $builder->fetchAssociative()) {
            $uid = (int)$row['uid'];
            $insertData = [];
            $actorUids = GeneralUtility::trimExplode(',', $row['actors'], true);
            $sorting = 0;

            foreach ($actorUids as $actorUid) {
                $insertData[] = [
                    $uid,
                    (int)$actorUid,
                    $sorting,
                    $sorting,
                ];

                $sorting += 10;
            }

            if (count($insertData) === 0) {
                continue;
            }

            $this->connectionPool->getConnectionForTable($mmTable)
                ->bulkInsert($mmTable, $insertData, self::INSERT_FIELDS, self::INSERT_TYPES);

            $this->connectionPool->getConnectionForTable($baseTable)
                ->update($baseTable, ['actors' => count($insertData)], ['uid' => $uid]);
        }

        $builder = $this->connectionPool->getQueryBuilderForTable($baseTable);
        $builder->update($baseTable)
            ->set('actors', '0')
            ->where($builder->expr()->isNull('actors'))
            ->orWhere($builder->expr()->eq('actors', $builder->expr()->literal('')))
            ->executeStatement();
    }
}
