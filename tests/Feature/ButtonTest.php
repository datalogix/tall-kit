<?php

namespace Datalogix\TALLKit\Tests\Feature;

use Datalogix\TALLKit\Tests\TestCase;

class ButtonTest extends TestCase
{
    public function testButtonStyles()
    {
        $this->registerTestRoute('button');

        $this->visit('/button')
            ->seeInElement('button.bg-gray-500', 'Default')
            ->seeInElement('button.bg-blue-500', 'Info')
            ->seeInElement('button.bg-red-500', 'Error')
            ->seeInElement('button.bg-green-500', 'Success')
            ->seeInElement('button.bg-yellow-500', 'Warning')
            ->seeInElement('button.bg-transparent,text-gray-700', 'Outlined')
            ->seeInElement('button.border.border-gray-700', 'Bordered')
            ->seeInElement('button.rounded-sm', 'Rounded')
            ->seeInElement('button.shadow-lg', 'Shadow');
    }
}
