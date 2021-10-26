<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\User;

class AdminPanel extends BladeComponent
{
    use User;

    /**
     * @var bool|array
     */
    public $html;

    /**
     * @var string|bool|null
     */
    public $title;

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
     * @var mixed
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
     * @var mixed
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
     * @var string|bool|null
     */
    public $userMenuAlign;

    /**
     * @var string|bool|null
     */
    public $userMenuIconName;

    /**
     * @var string|bool|null
     */
    public $userMenuUserName;

    /**
     * @var string|bool|null
     */
    public $userMenuUserAvatar;

    /**
     * @var string|bool|null
     */
    public $userMenuAvatarSearch;

    /**
     * @var string|bool|null
     */
    public $userMenuAvatarProvider;

    /**
     * @var string|bool|null
     */
    public $userMenuAvatarFallback;

    /**
     * @var string|bool|null
     */
    public $userMenuAvatarIcon;

    /**
     * @var string|bool|null
     */
    public $messageSession;

    /**
     * Create a new component instance.
     *
     * @param  bool|array  $html
     * @param  string|bool|null  $title
     * @param  string|null  $guard
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
     * @param  mixed  $sidebarItems
     * @param  string|bool  $sidebarBreakpoint
     * @param  string|bool|null  $sidebarName
     * @param  bool  $sidebarShow
     * @param  bool  $sidebarOverlay
     * @param  string|null  $sidebarAlign
     * @param  mixed  $userMenuItems
     * @param  bool  $userMenuInline
     * @param  string|bool|null  $userMenuName
     * @param  bool  $userMenuShow
     * @param  bool  $userMenuOverlay
     * @param  string|bool|null  $userMenuAlign
     * @param  string|bool|null  $userMenuIconName
     * @param  string|bool|null  $userMenuUserName
     * @param  string|bool|null  $userMenuUserAvatar
     * @param  string|bool|null  $userMenuAvatarSearch
     * @param  string|bool|null  $userMenuAvatarProvider
     * @param  string|bool|null  $userMenuAvatarFallback
     * @param  string|bool|null  $userMenuAvatarIcon
     * @param  string|bool|null  $userMenuAvatarIcon
     * @param  string|bool|null  $messageSession
     * @param  string|bool|null  $theme
     * @return void
     */
    public function __construct(
        $html = true,
        $title = null,
        $guard = null,
        $user = null,
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
        $sidebarItems = null,
        $sidebarBreakpoint = 'lg',
        $sidebarName = 'sidebar',
        $sidebarShow = false,
        $sidebarOverlay = true,
        $sidebarAlign = null,
        $userMenuItems = null,
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
        $messageSession = 'status',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setUser($user, $guard);

        $this->html = $html ? array_replace_recursive(
            $this->themeProvider->html->getAttributes(),
            $this->getUserValue('html', 'adminHtml') ?? [],
            is_array($html) ? $html : []
        ) : false;

        $this->title = $title ?? config('app.name');
        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl ?? route_detect(['admin.index', 'admin.dashboard']);
        $this->sidebarItems = $sidebarItems ?? $this->getUserValue('sidebar', 'adminSidebar');
        $this->sidebarBreakpoint = $this->getUserValue('sidebarBreakpoint', 'adminSidebarBreakpoint') ?? $sidebarBreakpoint;
        $this->sidebarName = $sidebarName;
        $this->sidebarShow = $sidebarShow;
        $this->sidebarOverlay = $sidebarOverlay;
        $this->sidebarAlign = $sidebarAlign;
        $this->userMenuItems = $userMenuItems ?? $this->getUserValue('adminUserMenu');
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
        $this->messageSession = $messageSession;
    }
}
