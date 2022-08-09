<?php

namespace TALLKit\Components\Supports;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class Fetchable extends BladeComponent
{
    use JsonOptions;

    /**
     * @var string|null
     */
    public $url;

    /**
     * @var bool
     */
    public $autoload;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $url
     * @param  bool|null  $autoload
     * @param  array|null  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $url = null,
        $options = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->url = $url;
        $this->autoload = $autoload ?? true;
        $this->setOptions($options);
    }
}
