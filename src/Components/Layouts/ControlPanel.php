<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\User;

class ControlPanel extends BladeComponent
{
    use User;

    /**
     * @var array|bool
     */
    public $html;

    /**
     * @var string|bool
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
     * @var string|bool
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
     * @var bool
     */
    public $sidebarCloseable;

    /**
     * @var string|null
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
     * @var string|bool
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
     * @var bool
     */
    public $userMenuCloseable;

    /**
     * @var string|bool
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
     * @var string|bool
     */
    public $messageSession;

    /**
     * Create a new component instance.
     *
     * @param  array|bool|null  $html
     * @param  string|bool|null  $title
     * @param  string|null  $key
     * @param  string|null  $guard
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
     * @param  mixed  $sidebarItems
     * @param  string|bool|null  $sidebarBreakpoint
     * @param  string|bool|null  $sidebarName
     * @param  bool|null  $sidebarShow
     * @param  bool|null  $sidebarOverlay
     * @param  bool|null  $sidebarCloseable
     * @param  string|null  $sidebarAlign
     * @param  mixed  $userMenuItems
     * @param  bool|null  $userMenuInline
     * @param  string|bool|null  $userMenuName
     * @param  bool|null  $userMenuShow
     * @param  bool|null  $userMenuOverlay
     * @param  bool|null  $userMenuCloseable
     * @param  string|bool|null  $userMenuAlign
     * @param  string|bool|null  $userMenuIconName
     * @param  string|bool|null  $userMenuUserName
     * @param  string|bool|null  $userMenuUserAvatar
     * @param  string|bool|null  $userMenuAvatarSearch
     * @param  string|bool|null  $userMenuAvatarProvider
     * @param  string|bool|null  $userMenuAvatarFallback
     * @param  string|bool|null  $userMenuAvatarIcon
     * @param  string|bool|null  $messageSession
     * @param  string|bool|null  $theme
     * @return void
     */
    public function __construct(
        $html = null,
        $title = null,
        $key = null,
        $guard = null,
        $user = null,
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
        $sidebarItems = null,
        $sidebarBreakpoint = null,
        $sidebarName = null,
        $sidebarShow = null,
        $sidebarOverlay = null,
        $sidebarCloseable = null,
        $sidebarAlign = null,
        $userMenuItems = null,
        $userMenuInline = null,
        $userMenuName = null,
        $userMenuShow = null,
        $userMenuOverlay = null,
        $userMenuCloseable = null,
        $userMenuAlign = null,
        $userMenuIconName = null,
        $userMenuUserName = null,
        $userMenuUserAvatar = null,
        $userMenuAvatarSearch = null,
        $userMenuAvatarProvider = null,
        $userMenuAvatarFallback = null,
        $userMenuAvatarIcon = null,
        $messageSession = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $key = $key ?? Str::endsWith(get_class($this), 'AdminPanel') ? 'admin' : Str::before(Route::currentRouteName(), '.');

        $this->setUser($user, $guard ?? $key);

        $this->html = ($html ?? true) ? array_replace_recursive(
            $this->themeProvider->html->getAttributes(),
            $this->themeProvider->panels->get($key ?? 'default', []),
            $this->getUserValue('html', $key ? $key.'Html' : null) ?? [],
            Arr::wrap($html)
        ) : false;

        $this->title = $title ?? config('app.name');
        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl ?? route_detect([$key.'.index', $key.'.dashboard', $key.'.home', 'index', 'dashboard', 'home']);
        $this->sidebarItems = $sidebarItems ?? $this->getUserValue('sidebar', $key ? $key.'Sidebar' : null);
        $this->sidebarBreakpoint = $this->getUserValue('sidebarBreakpoint', $key ? $key.'SidebarBreakpoint' : null) ?? $sidebarBreakpoint ?? 'lg';
        $this->sidebarName = $sidebarName ?? 'sidebar';
        $this->sidebarShow = $sidebarShow ?? false;
        $this->sidebarOverlay = $sidebarOverlay ?? true;
        $this->sidebarCloseable = $sidebarCloseable ?? true;
        $this->sidebarAlign = $sidebarAlign;
        $this->userMenuItems = $userMenuItems ?? $this->getUserValue('userMenu', $key ? $key.'UserMenu' : null);
        $this->userMenuInline = $userMenuInline ?? false;
        $this->userMenuName = $userMenuName ?? 'user-menu';
        $this->userMenuShow = $userMenuShow ?? false;
        $this->userMenuOverlay = $userMenuOverlay ?? true;
        $this->userMenuCloseable = $userMenuCloseable ?? true;
        $this->userMenuAlign = $userMenuAlign ?? 'right';
        $this->userMenuIconName = $userMenuIconName;
        $this->userMenuUserName = $userMenuUserName;
        $this->userMenuUserAvatar = $userMenuUserAvatar;
        $this->userMenuAvatarSearch = $userMenuAvatarSearch;
        $this->userMenuAvatarProvider = $userMenuAvatarProvider;
        $this->userMenuAvatarFallback = $userMenuAvatarFallback;
        $this->userMenuAvatarIcon = $userMenuAvatarIcon;
        $this->messageSession = $messageSession ?? 'status';
    }
}
