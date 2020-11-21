<?php

namespace Datalogix\TALLKit\Components\Layouts;

use Datalogix\TALLKit\Components\BladeComponent;

class SocialMeta extends BladeComponent
{
    /**
     * The title.
     *
     * @var string
     */
    public $title;

    /**
     * The description.
     *
     * @var string
     */
    public $description;

    /**
     * The type.
     *
     * @var string
     */
    public $type;

    /**
     * The card.
     *
     * @var string
     */
    public $card;

    /**
     * The image.
     *
     * @var string
     */
    public $image;

    /**
     * The url.
     *
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
