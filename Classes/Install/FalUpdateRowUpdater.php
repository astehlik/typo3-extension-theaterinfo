<?php

namespace Sto\Theaterinfo\Install;

use InvalidArgumentException;
use PDO;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\Index\FileIndexRepository;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Resource\ResourceStorage;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\RowUpdater\RowUpdaterInterface;

class FalUpdateRowUpdater implements RowUpdaterInterface, SingletonInterface
{
    /**
     * @var ConnectionPool
     */
    private $connectionPool;

    /**
     * @var FileIndexRepository
     */
    private $fileIndexRepository;

    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @var ResourceStorage
     */
    private $storage;

    /**
     * Table fields to migrate
     *
     * @var array
     */
    private $tables = [
        'tx_theaterinfo_domain_model_actor' => [
            'picture' => [
                'sourcePath' => 'uploads/tx_theaterinfo',
                'targetPath' => '_migrated/theaterinfo/actor_pictures',
            ],
        ],
        'tx_theaterinfo_domain_model_helpertype' => [
            'icon' => [
                'sourcePath' => 'uploads/tx_theaterinfo',
                'targetPath' => '_migrated/theaterinfo/helpertype_icons',
            ],
        ],
        'tx_theaterinfo_domain_model_play' => [
            'logo' => [
                'sourcePath' => 'uploads/tx_theaterinfo',
                'targetPath' => '_migrated/theaterinfo/play_logos',
            ],
            'pictures' => [
                'sourcePath' => 'uploads/tx_theaterinfo',
                'targetPath' => '_migrated/theaterinfo/play_pictures',
            ],
        ],
        'tx_theaterinfo_domain_model_role' => [
            'picture' => [
                'sourcePath' => 'uploads/tx_theaterinfo',
                'targetPath' => '_migrated/theaterinfo/role_pictures',
            ],
        ],
    ];

    public function __construct()
    {
        $this->connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
        $this->storage = $resourceFactory->getDefaultStorage();
        $this->fileIndexRepository = FileIndexRepository::getInstance();
    }

    /**
     * Get a description of this single row updater
     *
     * @return string
     */
    public function getTitle(): string
    {
        return 'Migrate old group file fields of theaterextension to FAL';
    }

    /**
     * Return true if this row updater may have updates for given table rows.
     *
     * @param string $tableName Given table
     * @return bool
     */
    public function hasPotentialUpdateForTable(string $tableName): bool
    {
        if (!array_key_exists($tableName, $this->tables)) {
            return false;
        }

        foreach ($this->tables[$tableName] as $fieldName => $config) {
            if ($this->hasMigratableRecords($tableName, $fieldName)) {
                return true;
            }
        }

        return false;
    }

    public function setChattyOutput(OutputInterface $output): void
    {
        $this->output = $output;
    }

    /**
     * Update a single row from a table.
     *
     * @param string $tableName Given table
     * @param array $row Given row
     * @return array Potentially modified row
     */
    public function updateTableRow(string $tableName, array $row): array
    {
        if (!array_key_exists($tableName, $this->tables)) {
            throw new InvalidArgumentException('This table can not be migrated: ' . $tableName);
        }

        $updatedRow = $row;
        foreach ($this->tables[$tableName] as $fieldToMigrate => $fieldConfiguration) {
            $updatedFields = $this->migrateField($tableName, $row, $fieldToMigrate, $fieldConfiguration);
            $updatedRow = array_merge($updatedRow, $updatedFields);
        }
        return $updatedRow;
    }

    private function countReferences(string $table, string $fieldname, int $uid): int
    {
        $referenceQuery = $this->connectionPool->getQueryBuilderForTable('sys_file_reference');
        $referenceCount = $referenceQuery->count('uid')
            ->from('sys_file_reference')
            ->where(
                $referenceQuery->expr()->eq(
                    'fieldname',
                    $referenceQuery->createNamedParameter($fieldname, PDO::PARAM_STR)
                )
            )
            ->andWhere(
                $referenceQuery->expr()->eq(
                    'uid_foreign',
                    $referenceQuery->createNamedParameter($uid, PDO::PARAM_INT)
                )
            )
            ->andWhere(
                $referenceQuery->expr()->eq(
                    'tablenames',
                    $referenceQuery->createNamedParameter($table, PDO::PARAM_STR)
                )
            )
            ->execute()
            ->fetchColumn(0);

        return (int)$referenceCount;
    }

    private function createQueryBuilderForTable(string $tableName): QueryBuilder
    {
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $connection = $connectionPool->getConnectionForTable($tableName);
        $query = $connection->createQueryBuilder();
        return $query;
    }

    /**
     * Counts records from table where the field to migrate is not empty (NOT NULL and != '')
     * and also not numeric (which means that it is migrated)
     *
     * @param string $tableName
     * @param string $fieldToMigrate
     * @return bool
     */
    private function hasMigratableRecords(string $tableName, string $fieldToMigrate): bool
    {
        $query = $this->createQueryBuilderForTable($tableName);

        $query->from($tableName);
        $query->count('uid');
        $query->where(
            $query->expr()->isNotNull($fieldToMigrate),
            $query->expr()->neq($fieldToMigrate, $query->createNamedParameter('', PDO::PARAM_STR)),
            'CAST(CAST(' . $fieldToMigrate . ' AS DECIMAL) AS CHAR) <> CAST(' . $fieldToMigrate . ' AS CHAR)'
        );

        $result = $query->execute();
        $count = $result->fetchColumn(0);

        return $count > 0;
    }

    /**
     * Migrates a single field.
     *
     * @param string $table
     * @param array $row
     * @param string $fieldname
     * @param array $fieldConfiguration
     * @return array The updated database fields.
     * @throws \Exception
     */
    private function migrateField(string $table, array $row, string $fieldname, array $fieldConfiguration): array
    {
        $titleTextContents = [];
        $alternativeTextContents = [];
        $captionContents = [];
        $linkContents = [];

        $fieldItems = GeneralUtility::trimExplode(',', $row[$fieldname], true);
        if (empty($fieldItems) || is_numeric($row[$fieldname])) {
            return [];
        }

        if (isset($fieldConfiguration['titleTexts'])) {
            $titleTextField = $fieldConfiguration['titleTexts'];
            $titleTextContents = explode(LF, $row[$titleTextField]);
        }

        if (isset($fieldConfiguration['alternativeTexts'])) {
            $alternativeTextField = $fieldConfiguration['alternativeTexts'];
            $alternativeTextContents = explode(LF, $row[$alternativeTextField]);
        }
        if (isset($fieldConfiguration['captions'])) {
            $captionField = $fieldConfiguration['captions'];
            $captionContents = explode(LF, $row[$captionField]);
        }
        if (isset($fieldConfiguration['links'])) {
            $linkField = $fieldConfiguration['links'];
            $linkContents = explode(LF, $row[$linkField]);
        }

        $i = -1;
        $publicPath = Environment::getPublicPath() . DIRECTORY_SEPARATOR;
        foreach ($fieldItems as $item) {
            $i++;

            $sourcePath = $publicPath . $fieldConfiguration['sourcePath'] . DIRECTORY_SEPARATOR . $item;
            $targetPath = $fieldConfiguration['targetPath'] . DIRECTORY_SEPARATOR . basename($item);

            $targetFile = $this->moveOrFetchTargetFile($sourcePath, $targetPath);
            if (!$targetFile) {
                $this->writeline(
                    sprintf('Could not retrieve file %s from anywhere, it seems it was deleted.', $sourcePath)
                );
                continue;
            }

            $fileReferenceData = [
                'fieldname' => $fieldname,
                'table_local' => 'sys_file',
                // the sys_file_reference record should always placed on the same page
                // as the record to link to, see issue #46497
                'pid' => ($table === 'pages' ? (int)$row['uid'] : (int)$row['pid']),
                'uid_foreign' => (int)$row['uid'],
                'uid_local' => $targetFile->getUid(),
                'tablenames' => $table,
                'crdate' => time(),
                'tstamp' => time(),
                'sorting' => (2 ^ $i),
                'sorting_foreign' => $i,
            ];
            if (isset($titleTextField)) {
                $fileReferenceData['title'] = trim($titleTextContents[$i]);
            }
            if (isset($alternativeTextField)) {
                $fileReferenceData['alternative'] = trim($alternativeTextContents[$i]);
            }
            if (isset($captionField)) {
                $fileReferenceData['description'] = trim($captionContents[$i]);
            }
            if (isset($linkField)) {
                $fileReferenceData['link'] = trim($linkContents[$i]);
            }

            $referenceInsertQuery = $this->connectionPool->getQueryBuilderForTable('sys_file_reference');
            $referenceInsertQuery->insert('sys_file_reference')
                ->values($fileReferenceData)
                ->execute();
        }

        $referenceCount = $this->countReferences($table, $fieldname, (int)$row['uid']);

        return [$fieldname => $referenceCount];
    }

    private function moveOrFetchTargetFile(string $sourcePath, string $targetPath): ?File
    {
        // File already exists at target location.
        if ($this->storage->hasFile($targetPath)) {
            return $this->storage->getFile($targetPath);
        }

        // File does not exist anywhere. Nothing we can do.
        if (!file_exists($sourcePath)) {
            return null;
        }

        // File only exists with matching hash at different location already in storage.
        $sourceHash = sha1($sourcePath);
        $existingFiles = $this->fileIndexRepository->findByContentHash($sourceHash);
        foreach ($existingFiles as $existingFileData) {
            $existingFileIdentifier = $existingFileData['identifier'];
            if ((int)$existingFileData['storage'] === $this->storage->getUid()
                && $this->storage->hasFile($existingFileIdentifier)) {
                // File already exists in current storage at a different path.
                return $this->storage->getFile($existingFileIdentifier);
            }
        }

        $targetFolderPath = dirname($targetPath);
        if (!$this->storage->hasFolder($targetFolderPath)) {
            $this->storage->createFolder($targetFolderPath);
        }
        $targetFolder = $this->storage->getFolder($targetFolderPath);

        return $this->storage->addFile($sourcePath, $targetFolder);
    }

    private function writeline(string $message): void
    {
        if (!$this->output) {
            return;
        }

        $this->output->writeln($message);
    }
}
