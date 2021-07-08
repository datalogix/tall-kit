<?php

namespace TALLKit\Concerns;

trait Toggleable
{
    protected static $ALIGN_DEFAULT = 'left';

    /**
     * @var string|bool|null
     */
    public $name;

    /**
     * @var bool
     */
    public $show;

    /**
     * @var bool
     */
    public $overlay;

    /**
     * @var string
     */
    public $align;

    /**
     * Set toogleable.
     *
     * @param  string|bool|null  $name
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @return void
     */
    public function setToggleable($name = null, $show = false, $overlay = true, $align = null)
    {
        $this->name = $name;
        $this->show = $show;
        $this->overlay = $overlay;
        $this->align = $align ?? static::$ALIGN_DEFAULT;
    }

    /**
     * Get events.
     *
     * @return array
     */
    public function events()
    {
        // 2x -> https://github.com/alpinejs/alpine/blob/2.x/README.pt.md#x-on
        // 3x -> https://alpinejs.dev/directives/on#window
        return $this->name ? [
            '@'.$this->name.'-open.window' => 'open',
            '@'.$this->name.'-close.window' => 'close',
            '@'.$this->name.'-toggle.window' => 'toggle',
        ] : [];
    }
}
