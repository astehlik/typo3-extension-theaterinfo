<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\ViewHelpers;

use Closure;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class PageTitleViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * @param array $arguments
     * @param Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(
        array $arguments,
        Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $content = trim($renderChildrenClosure());
        if ($content === '') {
            return '';
        }

        $tsfe = static::getTypoScriptFrontendController();
        $tsfe->altPageTitle = $content;
        $tsfe->indexedDocTitle = $content;

        return '';
    }

    private static function getTypoScriptFrontendController(): TypoScriptFrontendController
    {
        return $GLOBALS['TSFE'];
    }
}
