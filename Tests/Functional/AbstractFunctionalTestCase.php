<?php

declare(strict_types=1);

namespace Tx\Tinyurls\Tests\Functional;

use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

class AbstractFunctionalTestCase extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = ['typo3conf/ext/theaterinfo'];
}
