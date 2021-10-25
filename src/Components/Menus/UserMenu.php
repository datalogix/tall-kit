<?php

namespace TALLKit\Components\Menus;

use TALLKit\Concerns\User;

class UserMenu extends MenuDropdown
{
    use User;

    /**
     * @var string|bool|null
     */
    public $userName;

    /**
     * @var string|bool|null
     */
    public $userAvatar;

    /**
     * @var string|bool|null
     */
    public $avatarSearch;

    /**
     * @var string|bool|null
     */
    public $avatarProvider;

    /**
     * @var string|bool|null
     */
    public $avatarFallback;

    /**
     * @var string|bool|null
     */
    public $avatarIcon;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $items
     * @param  bool  $inline
     * @param  string|bool|null  $name
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|bool|null  $iconName
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|null  $guard
     * @param  string|bool|null  $userName
     * @param  string|bool|null  $userAvatar
     * @param  string|bool|null  $avatarSearch
     * @param  string|bool|null  $avatarProvider
     * @param  string|bool|null  $avatarFallback
     * @param  string|bool|null  $avatarIcon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
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
        $this->setUser($user, $guard);

        parent::__construct(
            $items ?? $this->getUserValue('userMenu'),
            $inline,
            $name,
            $show,
            $overlay,
            $align,
            $iconName,
            $theme
        );

        $this->userName = $userName ?? $this->getUserValue('name');
        $this->userAvatar = $userAvatar ?? $this->getUserValue('avatar_url') ?? $this->getUserValue('avatar');
        $this->avatarSearch = $avatarSearch ?? $this->getUserValue('email');
        $this->avatarProvider = $avatarProvider;
        $this->avatarFallback = $avatarFallback;
        $this->avatarIcon = $avatarIcon;
    }
}
