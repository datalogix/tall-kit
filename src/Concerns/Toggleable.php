<?php

namespace TALLKit\Concerns;

trait Toggleable
{
    protected static $SHOW = false;

    protected static $OVERLAY = false;

    protected static $CLOSEABLE = true;

    protected static $ALIGN = 'left';

    /**
     * @var string|bool|null
     */
    public $name;

    /**
     * @var bool|int
     */
    public $show;

    /**
     * @var bool
     */
    public $overlay;

    /**
     * @var bool
     */
    public $closeable;

    /**
     * @var string
     */
    public $align;

    /**
     * Set toogleable.
     *
     * @param  string|bool|null  $name
     * @param  bool|int|null  $show
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @return void
     */
    public function setToggleable($name = null, $show = null, $overlay = null, $closeable = null, $align = null)
    {
        $this->name = $name;
        $this->show = $show ?? static::$SHOW;
        $this->overlay = $overlay ?? static::$OVERLAY;
        $this->closeable = $closeable ?? static::$CLOSEABLE;
        $this->align = $align ?? static::$ALIGN;
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
