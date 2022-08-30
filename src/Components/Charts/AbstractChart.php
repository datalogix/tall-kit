<?php

namespace TALLKit\Components\Charts;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

abstract class AbstractChart extends BladeComponent
{
    use JsonOptions;

    /**
     * @var bool
     */
    public $canvas = false;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $url;

    /**
     * @var int|string|null
     */
    public $width;

    /**
     * @var int|string|null
     */
    public $height;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|null  $url
     * @param  int|string|null  $width
     * @param  int|string|null  $height
     * @param  array|null  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $url = null,
        $width = null,
        $height = null,
        $options = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
        $this->setOptions($options);
    }

    /**
     * Size.
     *
     * @return array
     */
    public function size()
    {
        $sizes = Collection::make();

        if ($this->width) {
            $sizes->put('width', $this->width.'px');
        }

        if ($this->height) {
            $sizes->put('height', $this->height.'px');
        }

        if ($sizes->isEmpty()) {
            return [];
        }

        return [
            'style' => $sizes->map(function ($value, $key) {
                return $key.':'.$value;
            })->join(';'),
        ];
    }

    /**
     * Get theme key.
     *
     * @return string
     */
    protected function getThemeKey()
    {
        return Str::kebab(class_basename($this));
    }

    /**
     * Get component key.
     *
     * @return string
     */
    protected function getComponentKey()
    {
        return 'base-chart';
    }
}
