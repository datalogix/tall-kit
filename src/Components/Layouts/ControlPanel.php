<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Support\Arr;
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
     * @var string|bool|null
     */
    public $sidebarBreakpoint;

    /**
     * @var string|bool|null
     */
    public $sidebarName;

    /**
     * @var bool|null
     */
    public $sidebarShow;

    /**
     * @var bool|null
     */
    public $sidebarOverlay;

    /**
     * @var bool|null
     */
    public $sidebarCloseable;

    /**
     * @var string|null
     */
    public $sidebarAlign;

    /**
     * @var string|null
     */
    public $sidebarTarget;

    /**
     * @var mixed
     */
    public $userMenuItems;

    /**
     * @var bool|null
     */
    public $userMenuInline;

    /**
     * @var string|bool|null
     */
    public $userMenuName;

    /**
     * @var bool|null
     */
    public $userMenuShow;

    /**
     * @var bool|null
     */
    public $userMenuOverlay;

    /**
     * @var bool|null
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
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|null  $guard
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
     * @param  string|null  $sidebarTarget
     * @param  mixed  $userMenuItems
     * @param  bool|null  $userMenuInline
     * @param  string|bool|null  $userMenuName
     * @param  bool|null  $userMenuShow
     * @param  bool|null  $userMenuOverlay
     * @param  bool|null  $userMenuCloseable
     * @param  string|null  $userMenuAlign
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
        $user = null,
        $guard = null,
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
        $sidebarTarget = null,
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

        $this->setUser($user, $guard ?? ($this->theme === 'default' ? null : $this->theme));

        $this->html = ($html ?? true) ? array_replace_recursive(
            $this->themeProvider->html->getAttributes(),
            $this->themeProvider->panels->get($this->theme, []),
            $this->getUserValue('html', $this->guard.'Html') ?? [],
            Arr::wrap($html)
        ) : false;

        $this->title = $title ?? config('app.name');
        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl;
        $this->sidebarItems = $sidebarItems;
        $this->sidebarBreakpoint = $sidebarBreakpoint ?? 'lg';
        $this->sidebarName = $sidebarName ?? ($this->guard ? $this->guard.'-sidebar' : 'sidebar');
        $this->sidebarShow = $sidebarShow;
        $this->sidebarOverlay = $sidebarOverlay;
        $this->sidebarCloseable = $sidebarCloseable;
        $this->sidebarAlign = $sidebarAlign;
        $this->sidebarTarget = $sidebarTarget;
        $this->userMenuItems = $userMenuItems;
        $this->userMenuInline = $userMenuInline;
        $this->userMenuName = $userMenuName;
        $this->userMenuShow = $userMenuShow;
        $this->userMenuOverlay = $userMenuOverlay;
        $this->userMenuCloseable = $userMenuCloseable;
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
