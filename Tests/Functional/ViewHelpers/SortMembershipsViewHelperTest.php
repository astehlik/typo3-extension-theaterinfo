<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Tests\Functional\ViewHelpers;

use PHPUnit\Framework\Attributes\CoversClass;
use Sto\Theaterinfo\Domain\Model\Actor;
use Sto\Theaterinfo\Domain\Model\Enumeration\ActorType;
use Sto\Theaterinfo\Domain\Model\ManagementMembership;
use Sto\Theaterinfo\Tests\Functional\AbstractFunctionalTestCase;
use Sto\Theaterinfo\ViewHelpers\SortMembershipsViewHelper;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextFactory;
use TYPO3Fluid\Fluid\View\TemplateView;

#[CoversClass(SortMembershipsViewHelper::class)]
class SortMembershipsViewHelperTest extends AbstractFunctionalTestCase
{
    /** @noinspection PhpInternalEntityUsedInspection */
    public function testSortsBy(): void
    {
        $actor1 = new Actor();
        $actor1->_setProperty('company', 'Company2');
        $actor1->_setProperty('type', ActorType::COMPANY);

        $actor2 = new Actor();
        $actor2->_setProperty('company', 'Company1');
        $actor2->_setProperty('type', ActorType::COMPANY);

        $membership1 = new ManagementMembership();
        $membership1->_setProperty('actor', $actor1);
        $membership2 = new ManagementMembership();
        $membership2->_setProperty('actor', $actor2);

        $memberships = new ObjectStorage();
        $memberships->attach($membership1);
        $memberships->attach($membership2);

        $context = $this->get(RenderingContextFactory::class)->create();
        $context->getVariableProvider()->add('memberships', $memberships);

        /** @noinspection XmlUnusedNamespaceDeclaration */
        $context->getTemplatePaths()->setTemplateSource('
            <html data-namespace-typo3-fluid="true" xmlns:ti="http://typo3.org/ns/Sto/Theaterinfo/ViewHelpers">
            <f:for each="{memberships -> ti:sortMemberships()}" as="membership">{membership.actor.name}</f:for>
            </html>
        ');

        $this->assertSame('Company1Company2', trim((new TemplateView($context))->render()));
    }
}
