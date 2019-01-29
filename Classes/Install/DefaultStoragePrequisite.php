<?php

namespace Sto\Theaterinfo\Install;

use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\ChattyInterface;
use TYPO3\CMS\Install\Updates\PrerequisiteInterface;

class DefaultStoragePrequisite implements PrerequisiteInterface, ChattyInterface
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * Ensure this prerequisite is fulfilled
     *
     * Gets called if "isFulfilled" returns false
     * and should ensure the prerequisite
     *
     * Returns true on success, false on error
     *
     * @see isFulfilled
     * @return bool
     */
    public function ensure(): bool
    {
        $this->output->writeln('This prequisite needs to be fulfilled manually!');
        return false;
    }

    /**
     * Get speaking name of this prerequisite
     *
     * @return string
     */
    public function getTitle(): string
    {
        return 'Mark a storage "default storage"';
    }

    /**
     * Is this prerequisite met?
     *
     * Checks whether this prerequisite is fulfilled. If it is not,
     * ensure should be called to fulfill it.
     *
     * @see ensure
     * @return bool
     */
    public function isFulfilled(): bool
    {
        $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
        $defaultStorage = $resourceFactory->getDefaultStorage();
        return !is_null($defaultStorage);
    }

    /**
     * Setter injection for output into upgrade wizards
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output): void
    {
        $this->output = $output;
    }
}
