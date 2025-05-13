<?php

namespace TALLKit\Concerns;

trait Toggleable
{
    /**
     * @var bool
     */
    protected static $SHOW = false;

    /**
     * @var bool
     */
    protected static $OVERLAY = false;

    /**
     * @var bool
     */
    protected static $CLOSEABLE = true;

    /**
     * @var string
     */
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
    public function setToggleable(
        $name = null,
        $show = null,
        $overlay = null,
        $closeable = null,
        $align = null
    ) {
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
        if (!$this->name) {
            return [];
        }

        return [
            '@'.$this->name.'-open.window' => 'open',
            '@'.$this->name.'-close.window' => 'close',
            '@'.$this->name.'-toggle.window' => 'toggle',
        ];
    }
}
