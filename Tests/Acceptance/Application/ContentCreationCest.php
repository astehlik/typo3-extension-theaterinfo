<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Tests\Acceptance\Application;

use Codeception\Util\Locator;
use Sto\Theaterinfo\Tests\Acceptance\Support\BackendTester;
use Sto\Theaterinfo\Tests\Acceptance\Support\Helper\ModalDialog;
use Sto\Theaterinfo\Tests\Acceptance\Support\Helper\PageTree;

class ContentCreationCest
{
    public function _before(BackendTester $I): void
    {
        $I->useExistingSession('admin');
    }

    public function playRecordCanBeCreated(BackendTester $I, PageTree $pageTree, ModalDialog $modalDialog): void
    {
        $I->click('List');
        $pageTree->openPath(['Theaterinfo', 'Data', 'Plays data']);

        $I->wait(0.2);
        $I->switchToContentFrame();

        $I->click('Create new record');

        $playLink = Locator::contains('.list-group-item-action', 'Play');
        $I->waitForElement($playLink);
        $I->click($playLink);

        $nameInputSelector = 'input[data-formengine-input-name$="[title]"]';
        $I->waitForElement($nameInputSelector);
        $I->fillField($nameInputSelector, 'A cool play');

        $I->click('Save');

        $I->waitForElement($nameInputSelector);

        $I->dontSeeInSource('alert-danger');

        $I->seeInField($nameInputSelector, 'A cool play');
    }
}
