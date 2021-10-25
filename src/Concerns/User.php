<?php

namespace TALLKit\Concerns;

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
     * Get user value.
     *
     * @param  string  $key
     * @return mixed
     */
    protected function getUserValue($key)
    {
        if (! $this->user) {
            return null;
        }

        return method_exists($this->user, $key)
            ? $this->user->{$key}()
            : data_get($this->user, $key);
    }
}
