<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Arr;

trait User
{
    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable|mixed|null
     */
    public $user;

    /**
     * @var string|null
     */
    public $guard;

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
     * Set user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|null  $guard
     * @return void
     */
    public function setUser($user = null, $guard = null)
    {
        $this->user = $user ?? (auth($guard)->check() ? auth($guard)->user() : null);
        $this->guard = $guard;
    }

    /**
     * Set user.
     *
     * @param  string|bool|null  $userName
     * @param  string|bool|null  $userAvatar
     * @param  string|bool|null  $avatarSearch
     * @param  string|bool|null  $avatarProvider
     * @param  string|bool|null  $avatarFallback
     * @param  string|bool|null  $avatarIcon
     * @return void
     */
    public function setUserInfo(
        $userName = null,
        $userAvatar = null,
        $avatarSearch = null,
        $avatarProvider = null,
        $avatarFallback = null,
        $avatarIcon = null
    ) {
        $this->userName = $userName ?? $this->getUserValue('name');
        $this->userAvatar = $userAvatar ?? $this->getUserValue('avatar_url', 'avatar');
        $this->avatarSearch = $avatarSearch ?? $this->getUserValue('email');
        $this->avatarProvider = $avatarProvider ?? $this->getUserValue('avatar_provider', 'provider');
        $this->avatarFallback = $avatarFallback ?? $this->getUserValue('avatar_fallback', 'fallback');
        $this->avatarIcon = $avatarIcon ?? $this->getUserValue('avatar_icon', 'icon');
    }

    /**
     * Get user value.
     *
     * @param  string|string[]  $keys
     * @return mixed
     */
    protected function getUserValue(...$keys)
    {
        if (! $this->user) {
            return null;
        }

        foreach (array_filter(Arr::wrap($keys)) as $key) {
            $result = ! is_array($this->user) && method_exists($this->user, $key)
                ? $this->user->{$key}()
                : data_get($this->user, $key);

            if (! is_null($result)) {
                return $result;
            }
        }
    }
}
