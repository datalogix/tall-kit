<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class AdminPanel extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $guard;

    /**
     * @var mixed
     */
    public $user;

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
     * @var array
     */
    public $sidebarItems;

    /**
     * @var string|bool
     */
    public $sidebarBreakpoint;

    /**
     * @var string|bool|null
     */
    public $sidebarName;

    /**
     * @var bool
     */
    public $sidebarShow;

    /**
     * @var bool
     */
    public $sidebarOverlay;

    /**
     * @var string
     */
    public $sidebarAlign;

    /**
     * @var array
     */
    public $userMenuItems;

    /**
     * @var bool
     */
    public $userMenuInline;

    /**
     * @var string|bool|null
     */
    public $userMenuName;

    /**
     * @var bool
     */
    public $userMenuShow;

    /**
     * @var bool
     */
    public $userMenuOverlay;

    /**
     * @var string
     */
    public $userMenuAlign;

    /**
     * @var string|bool|null
     */
    public $userMenuIconName;

    /**
     * @var string|null
     */
    public $userMenuUserName;

    /**
     * @var string|null
     */
    public $userMenuUserAvatar;

    /**
     * @var string|null
     */
    public $userMenuAvatarSearch;

    /**
     * @var string|null
     */
    public $userMenuAvatarProvider;

    /**
     * @var string|null
     */
    public $userMenuAvatarFallback;

    /**
     * @var string|bool|null
     */
    public $userMenuAvatarIcon;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $title
     * @param  string|null  $guard
     * @param  mixed  $user
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
     * @param  array  $sidebarItems
     * @param  string|bool  $sidebarBreakpoint
     * @param  string|bool|null  $sidebarName
     * @param  bool  $sidebarShow
     * @param  bool  $sidebarOverlay
     * @param  string|null  $sidebarAlign
     * @param  array  $userMenuItems
     * @param  bool  $userMenuInline
     * @param  string|bool|null  $userMenuName
     * @param  bool  $userMenuShow
     * @param  bool  $userMenuOverlay
     * @param  string|null  $userMenuAlign
     * @param  string|bool|null  $userMenuIconName
     * @param  string|null  $userMenuUserName
     * @param  string|null  $userMenuUserAvatar
     * @param  string|null  $userMenuAvatarSearch
     * @param  string|null  $userMenuAvatarProvider
     * @param  string|null  $userMenuAvatarFallback
     * @param  string|null  $userMenuAvatarIcon
     * @param  string|bool|null  $theme
     * @return void
     */
    public function __construct(
        $title = null,
        $guard = null,
        $user = null,
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
        $sidebarItems = [],
        $sidebarBreakpoint = 'lg',
        $sidebarName = 'sidebar',
        $sidebarShow = false,
        $sidebarOverlay = true,
        $sidebarAlign = null,
        $userMenuItems = [],
        $userMenuInline = false,
        $userMenuName = 'user-menu',
        $userMenuShow = false,
        $userMenuOverlay = true,
        $userMenuAlign = 'right',
        $userMenuIconName = null,
        $userMenuUserName = null,
        $userMenuUserAvatar = null,
        $userMenuAvatarSearch = null,
        $userMenuAvatarProvider = null,
        $userMenuAvatarFallback = null,
        $userMenuAvatarIcon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title ?? config('app.name');
        $this->guard = $guard;
        $this->user = $user ?? (auth($this->guard)->check() ? auth($this->guard)->user() : null);
        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl;
        $this->sidebarItems = $sidebarItems;
        $this->sidebarBreakpoint = $sidebarBreakpoint;
        $this->sidebarName = $sidebarName;
        $this->sidebarShow = $sidebarShow;
        $this->sidebarOverlay = $sidebarOverlay;
        $this->sidebarAlign = $sidebarAlign;
        $this->userMenuItems = $userMenuItems;
        $this->userMenuInline = $userMenuInline;
        $this->userMenuName = $userMenuName;
        $this->userMenuShow = $userMenuShow;
        $this->userMenuOverlay = $userMenuOverlay;
        $this->userMenuAlign = $userMenuAlign;
        $this->userMenuIconName = $userMenuIconName;
        $this->userMenuUserName = $userMenuUserName;
        $this->userMenuUserAvatar = $userMenuUserAvatar;
        $this->userMenuAvatarSearch = $userMenuAvatarSearch;
        $this->userMenuAvatarProvider = $userMenuAvatarProvider;
        $this->userMenuAvatarFallback = $userMenuAvatarFallback;
        $this->userMenuAvatarIcon = $userMenuAvatarIcon;
    }
}
