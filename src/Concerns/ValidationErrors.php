<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

trait ValidationErrors
{
    use FieldNameAndValue;

    /**
     * Show errors.
     *
     * @var bool
     */
    public $showErrors = true;

    /**
     * Returns a boolean wether the given attribute has an error and the should be shown.
     *
     * @param  string  $bag
     * @return bool
     */
    public function hasErrorAndShow($bag = 'default')
    {
        return $this->showErrors && $this->hasName()
            ? $this->hasError($bag)
            : false;
    }

    /**
     * Getter for the ErrorBag.
     *
     * @param  string  $bag
     * @return \Illuminate\Contracts\Support\MessageBag
     */
    protected function getErrorBag($bag = 'default')
    {
        $bags = View::shared('errors', function () {
            return request()->session()->get('errors', new ViewErrorBag); // @codeCoverageIgnore
        });

        return $bags->getBag($bag);
    }

    /**
     * Returns a boolean wether the given attribute has an error.
     *
     * @param  string|null  $name
     * @param  string  $bag
     * @return bool
     */
    public function hasError($bag = 'default')
    {
        $name = $this->getFieldName();
        $errorBag = $this->getErrorBag($bag);

        return $errorBag->has($name) || $errorBag->has($name.'.*');
    }
}
