<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\ViewHelpers;

use Sto\Theaterinfo\Domain\Model\ManagementMembership;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
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

    public function render()
    {
        $storage = $this->renderChildren();

        assert(
            $storage instanceof ObjectStorage,
            'Invalid usage of SortMembershipsViewHelper. Expected ObjectStorage.',
        );

        $memberships = $storage->toArray();

        usort(
            $memberships,
            static function (ManagementMembership $a, ManagementMembership $b) {
                $aSorting = $a->getActor()->getName();
                $bSorting = $b->getActor()->getName();

                return strnatcmp($aSorting, $bSorting);
            },
        );

        return $memberships;
    }
}
