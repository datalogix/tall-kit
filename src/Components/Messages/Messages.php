<?php

namespace TALLKit\Components\Messages;

use Illuminate\Support\Collection;
use TALLKit\Components\BladeComponent;
use TALLKit\Notify;

class Messages extends BladeComponent
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $messages;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $session
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $session = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->messages = Collection::wrap(session($session ?? Notify::getNotifyKey()))->sortKeysDesc();
    }
}
