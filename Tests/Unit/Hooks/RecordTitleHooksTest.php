<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Tests\Unit\Hooks;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Sto\Theaterinfo\Domain\Model\Enumeration\ActorType;
use Sto\Theaterinfo\Hooks\RecordTitleHooks;

/**
 * @internal
 */
#[CoversClass(RecordTitleHooks::class)]
final class RecordTitleHooksTest extends TestCase
{
    private RecordTitleHooks $hooks;

    protected function setUp(): void
    {
        $this->hooks = new RecordTitleHooks();
    }

    public function testGetActorTitleSetsTitleToCompanyNameForCompany(): void
    {
        $params = [
            'table' => 'tx_theaterinfo_domain_model_actor',
            'row' => [
                'type' => ActorType::COMPANY->value,
                'company' => 'Randolf AG',
            ],
        ];

        $expectedParams = $params;
        $expectedParams['title'] = 'Randolf AG';

        $this->hooks->getActorTitle($params);

        $this->assertSame($expectedParams, $params);
    }

    public function testGetActorTitleSetsTitleToLastnameFirstnameForPerson(): void
    {
        $params = [
            'table' => 'tx_theaterinfo_domain_model_actor',
            'row' => [
                'type' => ActorType::PERSON->value,
                'firstname' => 'Bernd',
                'lastname' => 'Randolf',
            ],
        ];

        $expectedParams = $params;
        $expectedParams['title'] = 'Randolf, Bernd';

        $this->hooks->getActorTitle($params);

        $this->assertSame($expectedParams, $params);
    }

    public function testGetActorTitleSkipsIfTableNameDoesNotMatch(): void
    {
        $params = ['table' => 'dummy'];
        $expectedParams = $params;

        $this->hooks->getActorTitle($params);

        $this->assertSame($expectedParams, $params);
    }

    public function testGetActorTitleSkipsIfTypeCanNotBeDetected(): void
    {
        $params = [
            'table' => 'tx_theaterinfo_domain_model_actor',
            'row' => ['type' => -1],
        ];
        $expectedParams = $params;

        $this->hooks->getActorTitle($params);

        $this->assertSame($expectedParams, $params);
    }
}
