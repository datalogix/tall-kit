<?php

namespace TALLKit\Components\Bars;

use TALLKit\Concerns\User;

class UserSidebar extends Sidebar
{
    use User;

    /**
     * @var string|bool|null
     */
    public $logoImage;

    /**
     * @var string|bool|null
     */
    public $logoName;

    /**
     * @var string|bool|null
     */
    public $logoUrl;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $items
     * @param  string|bool|null  $breakpoint
     * @param  string|bool|null  $name
     * @param  bool|null  $show
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @param  string|null  $target
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
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
        $breakpoint = null,
        $name = null,
        $show = null,
        $overlay = null,
        $closeable = null,
        $align = null,
        $target = null,
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
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
        $this->setUserInfo($userName, $userAvatar, $avatarSearch, $avatarProvider, $avatarFallback, $avatarIcon);

        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl ?? route_detect([$this->guard.'.index', $this->guard.'.dashboard', $this->guard.'.home', 'index', 'dashboard', 'home']);

        parent::__construct(
            $items ?? $this->getUserValue('sidebar', $this->guard.'Sidebar'),
            $this->getUserValue('sidebarBreakpoint', $this->guard.'SidebarBreakpoint') ?? $breakpoint ?? 'none',
            $name ?? $this->guard ? $this->guard.'-sidebar' : 'sidebar',
            $show,
            $overlay,
            $closeable,
            $align,
            $target,
            $theme
        );
    }
}
