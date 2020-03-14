<?php

namespace Tests;

use Illuminate\View\Factory as ViewFactory;
use PHPUnit\Framework\Assert as PHPUnit;

class AssertTemplate
{
    /**
     * @var ViewFactory
     */
    private $view;

    /**
     * @var string
     */
    private $template;

    /**
     * @var string
     */
    private $viewName;

    /**
     * @var string
     */
    private $directory;

    public function __construct(ViewFactory $view, string $template)
    {
        $this->view = $view;
        $this->template = $template;
        $this->viewName = sha1($this->template);
        $this->directory = __DIR__.'/views/';
    }

    public function renders($expectedHtml)
    {
        PHPUnit::assertSame(
            $this->removeExtraSpaces($expectedHtml),
            $this->removeExtraSpaces($this->renderTemplate())
        );
    }

    private function renderTemplate()
    {
        $this->view->addNamespace('_test', $this->directory);

        file_put_contents("{$this->directory}{$this->viewName}.blade.php", $this->template);

        return $this->view->make("_test::{$this->viewName}")->render();
    }

    private function removeExtraSpaces(string $expectedHtml)
    {
        return trim(preg_replace('@\s+@', ' ', $expectedHtml));
    }
}
