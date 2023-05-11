<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\ViewHelpers;

use Sto\Theaterinfo\Domain\Model\ManagementMembership;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class SortMembershipsViewHelper extends AbstractViewHelper
{
    /**
     * @var bool
     */
    protected $escapeChildren = false;

    /**
     * @var bool
     */
    protected $escapeOutput = false;

    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $storage = $renderChildrenClosure();

        if (!$storage instanceof ObjectStorage) {
            throw new \RuntimeException('Invalid usage of SortMembershipsViewHelper. Expected ObjectStorage.');
        }

        $memberships = $storage->toArray();

        usort($memberships, function (ManagementMembership $a, ManagementMembership $b) {
            $aSorting = $a->getActor()->getName();
            $bSorting = $b->getActor()->getName();

            return strnatcmp($aSorting, $bSorting);
        });

        return $memberships;
    }

    public function initializeArguments(): void
    {
    }
}
