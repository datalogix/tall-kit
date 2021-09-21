<?php

namespace TALLKit\Tests\Components;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase;
use TALLKit\TALLKitServiceProvider;

abstract class ComponentTestCase extends TestCase
{
    use InteractsWithViews;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('view:clear');
    }

    protected function flashOld(array $input)
    {
        session()->flashInput($input);

        request()->setLaravelSession(session());
    }

    protected function getPackageProviders($app)
    {
        return [TALLKitServiceProvider::class];
    }

    public function assertComponentRenders($expected, $template, $data = [])
    {
        $blade = (string) $this->blade($template, $data);

        $cleaned = rtrim(preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", str_replace(
            [' >', "\n/>", ' </div>', '> ', "\n>"],
            ['>', ' />', "\n</div>", ">\n    ", '>'],
            $blade,
        )));

        $this->assertSame($expected, $cleaned);
    }
}
