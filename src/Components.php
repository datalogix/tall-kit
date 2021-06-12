<?php

namespace TALLKit;

use Illuminate\Support\Str;

trait Components
{
    /**
     * All of the registered components.
     *
     * @var array
     */
    protected $components = [];

    /**
     * Register component.
     *
     * @param  string  $name
     * @param  string  $content
     * @param  bool  $overwrite
     * @return void
     */
    public function registerComponent($name, $content = null, $overwrite = true)
    {
        if ($overwrite || !$this->hasComponent($name)) {
            $this->components[$name] = $content;
        }
    }

    /**
     * Has component.
     *
     * @param  string  $name
     * @return bool
     */
    public function hasComponent($name)
    {
        return array_key_exists($name, $this->components);
    }

    /**
     * Unregister component.
     *
     * @param  string  $name
     * @return void
     */
    public function unregisterComponent($name)
    {
        if ($this->hasComponent($name)) {
            unset($this->components[$name]);
        }
    }

    /**
     * Get all components.
     *
     * @return array
     */
    public function getAllComponents()
    {
        return $this->components;
    }

    /**
     * Get component.
     *
     * @param  string  $name
     * @return string
     */
    public function getComponent($name)
    {
        return $this->components[$name];
    }

    /**
     * Render components.
     *
     * @return string
     */
    public function renderComponents()
    {
        $result = [];

        foreach ($this->components as $name => $actions) {
            if (Str::endsWith($actions, '.js') || Str::contains($actions, '.js?')) {
                $componentSrc = route('tallkit.component', $name);
                $result[] = <<<HTML
<script src="{$componentSrc}" data-turbo-eval="false" data-turbolinks-eval="false"></script>
HTML;
            } else {
                $actionsEncoded = $actions ?? '{}';
                $result[] = <<<HTML
<script data-turbo-eval="false" data-turbolinks-eval="false">
    window.tallkit.components.register('$name', $actionsEncoded);
</script>
HTML;
            }
        }

        return implode("\n", $result);
    }
}
