<?php

namespace Tests;

use Illuminate\Container\Container;
use Styde\Form;

class FormTest extends TestCase
{
    const TEST_TEMPLATE_NAMESPACE = '__test_template';

    /** @test */
    function renders_a_form_template()
    {
        $this->assertTemplateRenders(<<<'html'
<form method="get"></form>
html,
            '<x-form></x-form>'
        );
    }

    /** @test */
    function renders_a_form_with_post_method()
    {
        $this->assertTemplateRenders(<<<'html'
<form method="post">

</form>
html,
            '<x-form method="post"></x-form>'
        );
    }

    /** @test */
    function renders_a_form_with_put_method()
    {
        $this->assertTemplateRenders(<<<'html'
<form method="post">
    <input type="hidden" name="_method" value="put">
</form>
html,
            '<x-form method="put"></x-form>'
        );
    }

    protected function assertTemplateRenders($expected, $actual)
    {
        // Compile view
        $factory = $this->app->make('view');

        $factory->addNamespace(
            self::TEST_TEMPLATE_NAMESPACE,
            $directory = __DIR__.'/../storage/framework/views/'
        );

        if (! file_exists($viewFile = $directory.'/'.sha1($actual).'.blade.php')) {

            $methodName = debug_backtrace()[1]['class'].'::'.debug_backtrace()[1]['function'];

            file_put_contents($viewFile, $actual."\n\n\n<?php //".$methodName);
        }

        $view = view(self::TEST_TEMPLATE_NAMESPACE.'::'.basename($viewFile, '.blade.php'));

        $this->assertSame(
            $this->removeExtraWhitespaces($expected),
            $this->removeExtraWhitespaces($view->render())
        );
    }

    private function removeExtraWhitespaces($string)
    {
        return trim(str_replace('> <', '><', preg_replace('/\s+/', ' ', $string)));
    }
}
