<?php

namespace Tests;

use Gajus\Dindent\Indenter;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders($app)
    {
        return [
            'Styde\Form\FormServiceProvider'
        ];
    }

    protected function assertTemplateRenders($expectedHtml, $actualTemplate)
    {
        $this->makeTemplate($actualTemplate)
            ->assertRender($expectedHtml);
    }

    protected function makeTemplate($actualTemplate): Template
    {
        return $this->app[Template::class]->setContent($actualTemplate);
    }
}
