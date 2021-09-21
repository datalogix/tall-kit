<?php

namespace TALLKit\Tests\Components\Layouts;

use TALLKit\Tests\Components\ComponentTestCase;

class ContainerTest extends ComponentTestCase
{
    public function testRender()
    {
        $template = <<<'HTML'
            <x-container />
            HTML;

        $expected = <<<'HTML'
            <div class="container mx-auto">
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    public function testWithContent()
    {
        $template = <<<'HTML'
            <x-container>
                Content
            </x-container>
            HTML;

        $expected = <<<'HTML'
            <div class="container mx-auto">
                Content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
