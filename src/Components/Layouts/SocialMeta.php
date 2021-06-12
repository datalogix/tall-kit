<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class SocialMeta extends BladeComponent
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $card;

    /**
     * @var string
     */
    public $image;

    /**
     * @var string
     */
    public $url;

    public function __construct(
        $title = '',
        $description = '',
        $type = 'website',
        $card = 'summary_large_image',
        $image = '',
        $url = '',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title ?: config('app.name');
        $this->description = $description;
        $this->type = $type;
        $this->card = $card;
        $this->image = $image;
        $this->url = $url ?: url()->current();
    }
}
