<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\ViewHelpers\Form;

/*                                                                        *
 * This script belongs to the TYPO3 extension "swhlib".                   *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;
use TYPO3\CMS\Core\View\ViewInterface;
use TYPO3\CMS\Extbase\Error\Message;
use TYPO3\CMS\Extbase\Error\Result;
use TYPO3\CMS\Extbase\Mvc\RequestInterface;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Displays validation errors as inline helptext.
 */
class InlineHelpOrErrorsViewHelper extends AbstractViewHelper
{
    /**
     * @var bool
     */
    protected $escapeChildren = false;

    /**
     * @var bool
     */
    protected $escapeOutput = false;

    public function __construct(
        protected readonly ViewFactoryInterface $viewFactory,
    ) {}

    /**
     * Initialize all arguments.
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('validationResultsVariableName', 'string', '', false, 'validationResults');
        $this->registerArgument('translationPrefix', 'string', '', false, 'error.');
        $this->registerArgument('additionalPropertyPrefix', 'string', '', false, '');
        $this->registerArgument('flattenMessages', 'boolean', '', false, true);
        $this->registerArgument('forProperties', 'array', '');
        $this->registerArgument('includeChildProperties', 'array', '');
        $this->registerArgument('excludeForPartsFromTranslationKey', 'array', '');
    }

    /**
     * Displays validation errors as inline helptext.
     */
    public function render(): string
    {
        $errorMessages = implode('<br />', $this->getErrorMessages());

        if ($errorMessages !== '') {
            return '<div class="invalid-feedback">' . $errorMessages . '</div>';
        }

        $helpText = (string)$this->renderChildren();

        if ($helpText === '') {
            return '';
        }

        return '<div class="form-text">' . $helpText . '</div>';
    }

    /**
     * Builds the translated error messages for the given parameters.
     */
    protected function buildErrorMessages(
        Result $validationResult,
        string $forProperty,
        string $originalProperty,
        bool $includeChildProperties,
    ): array {
        $errorMessages = [];

        $request = $this->getRequest();

        $for = $originalProperty;
        if (!empty($this->arguments['excludeForPartsFromTranslationKey']) && $for) {
            $forParts = explode('.', $for);
            foreach ($this->arguments['excludeForPartsFromTranslationKey'] as $excludeKey) {
                unset($forParts[$excludeKey]);
            }
            $for = implode('.', $forParts);
        }

        $for = $this->arguments['additionalPropertyPrefix'] . ($for ? $for . '.' : '');
        $translationPrefix = $this->arguments['translationPrefix'];
        $controllerPrefix = $translationPrefix . 'controller.' . lcfirst($request->getControllerName())
            . '.' . $request->getControllerActionName() . '.' . $for;
        $propertyPrefix = $translationPrefix . 'property.' . $for;
        $genericPrefix = $translationPrefix . 'generic.';

        $forSubProperty = substr($forProperty, strlen($originalProperty) + 1);
        if ($forSubProperty) {
            $controllerPrefix .= $forSubProperty . '.';
            $propertyPrefix .= $forSubProperty . '.';
            $validationResult = $validationResult->forProperty($forSubProperty);
        }

        if ($includeChildProperties) {
            $messages = $this->getFattenedMessages($validationResult->getFlattenedErrors());
            $messages = array_merge($messages, $this->getFattenedMessages($validationResult->getFlattenedWarnings()));
            $messages = array_merge($messages, $this->getFattenedMessages($validationResult->getFlattenedNotices()));
        } else {
            $messages = $validationResult->getErrors();
            $messages = array_merge($messages, $validationResult->getWarnings());
            $messages = array_merge($messages, $validationResult->getNotices());
        }

        if (empty($messages)) {
            return $errorMessages;
        }

        $view = $this->viewFactory->create(new ViewFactoryData());

        /** @var Message $message */
        foreach ($messages as $message) {
            $controllerId = $controllerPrefix . $message->getCode();
            $translatedMessage = $this->translateById($controllerId);
            if (!isset($translatedMessage)) {
                $propertyId = $propertyPrefix . $message->getCode();
                $translatedMessage = $this->translateById($propertyId);
                if (!isset($translatedMessage)) {
                    $genericId = $genericPrefix . $message->getCode();
                    $translatedMessage = $this->translateById($genericId);
                    if (!isset($translatedMessage)) {
                        $translatedMessage = $message . ' [' . $controllerId . ' or ' . $propertyId
                            . ' or ' . $genericId . ']';
                    }
                }
            }
            $this->setViewTemplateSource($view, $translatedMessage);
            $view->assign('message', $message);
            $errorMessages[] = $view->render();
        }

        return $errorMessages;
    }

    /**
     * Renders all error messages to a string seperated by line breaks.
     */
    protected function getErrorMessages(): array
    {
        $errorMessageArray = [];

        if (!$this->templateVariableContainer->exists($this->arguments['validationResultsVariableName'])) {
            return $errorMessageArray;
        }

        $validationResultsVariableName = $this->arguments['validationResultsVariableName'];
        $validationResultData = $this->templateVariableContainer->get($validationResultsVariableName);

        $validationResult = $validationResultData['validationResults'];

        if (!$validationResult instanceof Result) {
            return $errorMessageArray;
        }

        $for = $validationResultData['for'];

        if (!isset($this->arguments['forProperties'])) {
            return $this->buildErrorMessages($validationResult, $for, $for, true);
        }

        foreach ($this->arguments['forProperties'] as $index => $propertyPath) {
            $includeChildProperties = !isset($this->arguments['includeChildProperties'][$index])
                || $this->arguments['includeChildProperties'][$index];
            $errorMessageArray = array_merge(
                $errorMessageArray,
                $this->buildErrorMessages($validationResult, $propertyPath, $for, $includeChildProperties),
            );
        }
        return $errorMessageArray;
    }

    /**
     * Flattens the given array of property messages.
     *
     * @return Message[]
     */
    protected function getFattenedMessages(array $propertyMessages): array
    {
        $messages = [];
        foreach ($propertyMessages as $messageArray) {
            $messages = array_merge($messages, $messageArray);
        }
        return $messages;
    }

    protected function getRequest(): RequestInterface
    {
        $request = $this->renderingContext->getAttribute(ServerRequestInterface::class);

        assert($request instanceof RequestInterface, 'Expect Request to be a MVC request instance');

        return $request;
    }

    protected function setViewTemplateSource(ViewInterface $view, string $translatedMessage): void
    {
        assert(method_exists($view, 'getRenderingContext'), 'View does not have a rendering context');

        $renderingContext = $view->getRenderingContext();

        assert(
            $renderingContext instanceof RenderingContextInterface,
            'View rendering context is not of type RenderingContextInterface',
        );

        $renderingContext->getTemplatePaths()->setTemplateSource($translatedMessage);
    }

    /**
     * Returns the translation for the given ID.
     */
    protected function translateById(string $id): ?string
    {
        $request = $this->getRequest();
        return LocalizationUtility::translate($id, $request->getControllerExtensionName());
    }
}
