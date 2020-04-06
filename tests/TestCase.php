<?php

namespace Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders()
    {
        return [
            'Styde\FormServiceProvider'
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
