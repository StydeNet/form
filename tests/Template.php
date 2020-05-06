<?php

namespace Tests;

use Gajus\Dindent\Indenter;
use Illuminate\View\Factory;
use PHPUnit\Framework\Assert as PHPUnit;

class Template
{
    /**
     * @var string
     */
    private $viewsDirectory;
    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var Factory
     */
    private $view;
    /**
     * @var Indenter
     */
    private $indenter;

    public function __construct(Factory $view, Indenter $indenter)
    {
        $this->viewsDirectory = __DIR__.'/views/';

        $this->view = $view;

        $this->view->addNamespace('_test', $this->viewsDirectory);

        $this->indenter = $indenter;
    }

    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    public function withData($var, $value)
    {
        $this->data[$var] = $value;

        return $this;
    }

    public function assertRender($expectedHtml)
    {
        PHPUnit::assertSame(
            $this->indentHtml($expectedHtml),
            $this->indentHtml($this->render())
        );
    }

    public function assertContain($expectedHtml)
    {
        PHPUnit::assertStringContainsString($expectedHtml, $this->render());

        return $this;
    }

    private function render()
    {
        file_put_contents($this->viewsDirectory.md5($this->content).'.blade.php', $this->content);
        return $this->view->make('_test::' . md5($this->content), $this->data)->toHtml();
    }

    private function indentHtml(string $html)
    {
        return $this->indenter->indent($html);
    }
}
