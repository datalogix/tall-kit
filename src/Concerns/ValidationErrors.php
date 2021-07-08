<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;

trait ValidationErrors
{
    /**
     * Show errors.
     *
     * @var bool
     */
    public $showErrors = true;

    /**
     * Returns a boolean wether the given attribute has an error and the should be shown.
     *
     * @param  string|null  $name
     * @param  string  $bag
     * @return bool
     */
    public function hasErrorAndShow($name, $bag = 'default')
    {
        return $this->showErrors && $name
            ? $this->hasError($name, $bag)
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
    public function hasError($name, $bag = 'default')
    {
        if (! $name) {
            return false;
        }

        $name = str_replace(['[', ']'], ['.', ''], Str::before($name, '[]'));

        $errorBag = $this->getErrorBag($bag);

        return $errorBag->has($name) || $errorBag->has($name.'.*');
    }
}
