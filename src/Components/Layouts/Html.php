<?php

namespace Datalogix\TALLKit\Components\Layouts;

use Datalogix\TALLKit\Components\BladeComponent;

class Html extends BladeComponent
{
    /**
     * The title.
     *
     * @var string
     */
    public $title;

    /**
     * The charset.
     *
     * @var string
     */
    public $charset;

    /**
     * The stack styles.
     *
     * @var string|bool
     */
    public $stackStyles;

    /**
     * The stack scripts.
     *
     * @var string|bool
     */
    public $stackScripts;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @param  string  $charset
     * @param  string|bool  $stackStyles
     * @param  string|bool  $stackScripts
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = '',
        $charset = 'utf-8',
        $stackStyles = 'styles',
        $stackScripts = 'scripts',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title ?: config('app.name');
        $this->charset = $charset;
        $this->stackScripts = $stackStyles;
        $this->stackScripts = $stackScripts;
    }
}
