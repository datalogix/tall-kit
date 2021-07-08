<?php

namespace TALLKit\Components\Menus;

class UserMenu extends MenuDropdown
{
    /**
     * @var string|null
     */
    public $userName;

    /**
     * @var string|null
     */
    public $userAvatar;

    /**
     * @var string|null
     */
    public $avatarSearch;

    /**
     * @var string|null
     */
    public $avatarProvider;

    /**
     * @var string|null
     */
    public $avatarFallback;

    /**
     * @var string|bool|null
     */
    public $avatarIcon;

    /**
     * Create a new component instance.
     *
     * @param  array  $items
     * @param  bool  $inline
     * @param  string|bool|null  $name
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|bool|null  $iconName
     * @param  mixed  $user
     * @param  string|null  $guard
     * @param  string|null  $userName
     * @param  string|null  $userAvatar
     * @param  string|null  $avatarSearch
     * @param  string|null  $avatarProvider
     * @param  string|null  $avatarFallback
     * @param  string|bool|null  $avatarIcon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = [],
        $inline = false,
        $name = null,
        $show = false,
        $overlay = true,
        $align = 'right',
        $iconName = null,
        $user = null,
        $guard = null,
        $userName = null,
        $userAvatar = null,
        $avatarSearch = null,
        $avatarProvider = null,
        $avatarFallback = null,
        $avatarIcon = null,
        $theme = null
    ) {
        parent::__construct(
            $items,
            $inline,
            $name,
            $show,
            $overlay,
            $align,
            $iconName,
            $theme
        );

        $user = $user ?? (auth($guard)->check() ? auth($guard)->user() : null);

        $this->userName = $userName ?? optional((object) $user)->name;
        $this->userAvatar = $userAvatar ?? optional((object) $user)->avatar;
        $this->avatarSearch = $avatarSearch ?? optional((object) $user)->email;
        $this->avatarProvider = $avatarProvider;
        $this->avatarFallback = $avatarFallback;
        $this->avatarIcon = $avatarIcon;
    }
}
