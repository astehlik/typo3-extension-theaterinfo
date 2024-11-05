<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Service;

use Sto\Theaterinfo\Domain\Model\CardOrder;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;
use TYPO3\CMS\Core\View\ViewInterface;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class CardOrderMailService
{
    private array $settings;

    public function __construct(
        protected readonly ConfigurationManagerInterface $configurationManager,
        protected readonly ViewFactoryInterface $viewFactory,
    ) {}

    public function sendCardOrderMails(CardOrder $cardOrder): void
    {
        $this->settings = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
        );

        $this->sendCardOrderTeamMail($cardOrder);
        $this->sendUserMail($cardOrder);
    }

    private function getMailBodyTemplate(CardOrder $cardOrder): ViewInterface
    {
        $viewFactoryData = new ViewFactoryData(
            templateRootPaths: $this->settings['cardOrderMail']['templateRootPaths'],
            partialRootPaths: $this->settings['cardOrderMail']['partialRootPaths'],
            format: 'txt',
        );

        $view = $this->viewFactory->create($viewFactoryData);

        $view->assign('cardOrder', $cardOrder);
        $view->assign('settings', $this->settings);

        return $view;
    }

    private function getMailMessage(): MailMessage
    {
        $mailMessage = new MailMessage();
        $mailMessage->setFrom(
            [$this->settings['cardOrderMail']['fromEmail'] => $this->settings['cardOrderMail']['fromName']],
        );
        return $mailMessage;
    }

    private function sendCardOrderTeamMail(CardOrder $cardOrder): void
    {
        $cardOrderTeamMail = $this->getMailMessage();
        $cardOrderTeamToEmail = $this->settings['cardOrderMail']['cardOrderTeam']['toEmail'];
        $cardOrderTeamToName = $this->settings['cardOrderMail']['cardOrderTeam']['toName'];
        $cardOrderTeamMail->setTo([$cardOrderTeamToEmail => $cardOrderTeamToName]);
        $cardOrderTeamMail->setSubject($this->settings['cardOrderMail']['cardOrderTeam']['subject']);

        $cardOrderTeamTemplate = $this->getMailBodyTemplate($cardOrder);
        $cardOrderTeamMail->text($cardOrderTeamTemplate->render('CardOrderTeam'));
        $cardOrderTeamMail->send();
    }

    private function sendUserMail(CardOrder $cardOrder): void
    {
        $userMail = $this->getMailMessage();
        $userMail->setTo([$cardOrder->getEmail() => $cardOrder->getFullName()]);
        $userMail->setSubject($this->settings['cardOrderMail']['user']['subject']);

        $userTemplate = $this->getMailBodyTemplate($cardOrder);
        $userMail->text($userTemplate->render('User'));
        $userMail->send();
    }
}
