<?php

declare(strict_types=1);

namespace Sto\Theaterinfo;

use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

class TheaterinfoPageTitleProvider extends AbstractPageTitleProvider
{
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
