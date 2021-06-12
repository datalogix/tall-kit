<?php

namespace TALLKit\Tests\Feature\Form;

use Illuminate\Http\Request;
use TALLKit\Tests\TestCase;

class ChekboxTest extends TestCase
{
    public function testCheckTheRightElementAsDefault()
    {
        $this->registerTestRoute('form.default-checkbox');

        $this->visit('/form.default-checkbox')
            ->seeElement('input[value="a"]:checked')
            ->seeElement('input[value="b"]:not(:checked)');
    }

    public function testDoesCheckTheRightInputElementAfterAValidationError()
    {
        $this->registerTestRoute('form.checkbox-validation', function (Request $request) {
            $request->validate([
                'checkbox'   => 'required|array',
                'checkbox.*' => 'in:a',
            ]);
        });

        $this->visit('/form.checkbox-validation')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked')
            ->press('Submit')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked');
    }
}
