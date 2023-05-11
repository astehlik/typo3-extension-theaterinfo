<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Service;

use Sto\Theaterinfo\Domain\Model\CardOrder;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

class CardOrderMailService implements SingletonInterface
{
    private $settings;

    public function injectConfigurationManager(ConfigurationManagerInterface $configurationManager): void
    {
        $this->settings = $configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS
        );
    }

    public function sendCardOrderMails(CardOrder $cardOrder): void
    {
        $this->sendCardOrderTeamMail($cardOrder);
        $this->sendUserMail($cardOrder);
    }

    private function getMailBodyTemplate(string $templateName, CardOrder $cardOrder): StandaloneView
    {
        $view = new StandaloneView();

        $view->setPartialRootPaths($this->settings['cardOrderMail']['partialRootPaths']);
        $view->setTemplateRootPaths($this->settings['cardOrderMail']['templateRootPaths']);
        $view->setTemplate($templateName);
        $view->setFormat('txt');

        $view->assign('cardOrder', $cardOrder);
        $view->assign('settings', $this->settings);

        return $view;
    }

    private function getMailMessage(): MailMessage
    {
        $mailMessage = new MailMessage();
        $mailMessage->setFrom(
            [$this->settings['cardOrderMail']['fromEmail'] => $this->settings['cardOrderMail']['Name']]
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

        $cardOrderTeamTemplate = $this->getMailBodyTemplate('CardOrderTeam', $cardOrder);
        $cardOrderTeamMail->setBody($cardOrderTeamTemplate->render(), 'text/plain');
        $cardOrderTeamMail->send();
    }

    private function sendUserMail(CardOrder $cardOrder): void
    {
        $userMail = $this->getMailMessage();
        $userMail->setTo([$cardOrder->getEmail() => $cardOrder->getFullName()]);
        $userMail->setSubject($this->settings['cardOrderMail']['user']['subject']);

        $userTemplate = $this->getMailBodyTemplate('User', $cardOrder);
        $userMail->setBody($userTemplate->render(), 'text/plain');
        $userMail->send();
    }
}
