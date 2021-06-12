<?php

namespace TALLKit\Tests\Feature\Form;

use Illuminate\Http\Request;
use TALLKit\Tests\TestCase;

class RadioTest extends TestCase
{
    public function testCheckTheRightElementAsDefault()
    {
        $this->registerTestRoute('form.default-radio');

        $this->visit('/form.default-radio')
            ->seeElement('input[value="a"]:checked')
            ->seeElement('input[value="b"]:not(:checked)');
    }

    public function testDoesCheckTheRightInputElementAfterAValidationError()
    {
        $this->registerTestRoute('form.radio-validation', function (Request $request) {
            $data = $request->validate([
                'radio' => 'required|in:a',
            ]);
        });

        $this->visit('/form.radio-validation')
            ->select('b', 'radio')
            ->press('Submit')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked');
    }
}
