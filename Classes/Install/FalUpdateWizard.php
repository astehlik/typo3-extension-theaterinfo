<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Install;

use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\ChattyInterface;
use TYPO3\CMS\Install\Updates\DatabaseRowsUpdateWizard;

class FalUpdateWizard extends DatabaseRowsUpdateWizard implements ChattyInterface
{
    /**
     * @var array Single classes that may update rows
     */
    protected $rowUpdater = [FalUpdateRowUpdater::class,];

    /**
     * @var string Title of this updater
     */
    protected $title = 'Updates theaterinfo file fields to FAL relations.';

    /**
     * @var OutputInterface
     */
    private $output;

    public function getPrerequisites(): array
    {
        $prequisites = parent::getPrerequisites();
        $prequisites[] = DefaultStoragePrequisite::class;
        return $prequisites;
    }

    public function setOutput(OutputInterface $output): void
    {
        $this->output = $output;

        $falRowUpdater = GeneralUtility::makeInstance(FalUpdateRowUpdater::class);
        $falRowUpdater->setChattyOutput($output);
    }
}
