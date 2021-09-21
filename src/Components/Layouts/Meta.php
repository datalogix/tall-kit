<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Meta extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $title;

    /**
     * @var string|bool|null
     */
    public $description;

    /**
     * @var string|bool|null
     */
    public $keywords;

    /**
     * @var string|bool|null
     */
    public $author;

    /**
     * @var string|bool|null
     */
    public $robots;

    /**
     * @var string|bool|null
     */
    public $type;

    /**
     * @var string|bool|null
     */
    public $card;

    /**
     * @var string|bool|null
     */
    public $image;

    /**
     * @var string|bool|null
     */
    public $url;

    /**
     * @var string|bool|null
     */
    public $locale;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $title
     * @param  string|bool|null  $description
     * @param  string|bool|null  $keywords
     * @param  string|bool|null  $author
     * @param  string|bool|null  $robots
     * @param  string|bool|null  $type
     * @param  string|bool|null  $card
     * @param  string|bool|null  $image
     * @param  string|bool|null  $url
     * @param  string|bool|null  $locale
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = null,
        $description = null,
        $keywords = null,
        $author = null,
        $robots = null,
        $type = 'website',
        $card = 'summary_large_image',
        $image = null,
        $url = null,
        $locale = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title ?? config('app.name');
        $this->description = $description;
        $this->keywords = $keywords;
        $this->author = $author;
        $this->robots = $robots;
        $this->type = $type;
        $this->card = $card;
        $this->image = $image;
        $this->url = $url ?? url()->current();
        $this->locale = $locale ?? app()->getLocale();
    }
}
