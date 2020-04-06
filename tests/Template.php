<?php

namespace Tests;

use Gajus\Dindent\Indenter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use PHPUnit\Framework\Assert as PHPUnit;

class Template
{
    /**
     * @var Factory
     */
    private $view;

    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $data = [];

    public function __construct(Factory $view, Indenter $indenter)
    {
        $this->view = $view;

        $this->view->addNamespace('_test', __DIR__.'/views/');

        $this->indenter = $indenter;
    }

    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    public function with($var, $value)
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

    private function render()
    {
        file_put_contents(__DIR__.'/views/'.md5($this->content).'.blade.php', $this->content);

        return $this->view->make('_test::'.md5($this->content), $this->data)->toHtml();
    }

    private function indentHtml(string $html)
    {
        return $this->indenter->indent($html);
    }
}
