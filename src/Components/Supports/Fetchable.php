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
     * @var mixed
     */
    public $default;

    /**
     * @var bool
     */
    public $autoload;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $url
     * @param  mixed  $data
     * @param  bool|null  $autoload
     * @param  array|null  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $url = null,
        $data = null,
        $autoload = null,
        $options = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->url = $url;
        $this->default = json_encode((object) $data);
        $this->autoload = $autoload ?? true;
        $this->setOptions($options);
    }
}
