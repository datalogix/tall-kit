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
     * @param  string|string[]  $keys
     * @return mixed
     */
    protected function getUserValue(...$keys)
    {
        if (! $this->user) {
            return null;
        }

        foreach (array_filter(Arr::wrap($keys)) as $key) {
            $result = method_exists($this->user, $key)
                ? $this->user->{$key}()
                : data_get($this->user, $key);

            if (! is_null($result)) {
                return $result;
            }
        }
    }
}
