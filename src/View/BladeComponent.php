<?php

namespace TALLKit\View;

use AllowDynamicProperties;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\Support\Str;
use TALLKit\Binders\ThemeBinder;
use TALLKit\ComponentPack;
use TALLKit\Components\GoogleFonts\GoogleFonts;
use TALLKit\Components\States\Loading;
use TALLKit\Components\Supports\Avatar;
use TALLKit\Components\Supports\ImageLoader;
use TALLKit\Concerns\AlpineFormDataBinder;
use TALLKit\Concerns\Componentable;
use TALLKit\Concerns\LivewireFormDataBinder;
use TALLKit\Concerns\PrepareFormDataBinder;
use TALLKit\Macros\MergeThemeProvider;

/**
 * @method void mounted(array $data): void
 * @method void processed(array $data): void
 * @method void finished(array $data): void
 */
#[AllowDynamicProperties]
abstract class BladeComponent extends Component
{
    use AlpineFormDataBinder;
    use Componentable;
    use LivewireFormDataBinder;
    use PrepareFormDataBinder;

    public static $assets = [];

    public static function assets()
    {
        return static::$assets;
    }

    private const METHODS = [
        'setupSize',
        'setupProps',
        'setupButton',
        'setupRounded',
        'setupSpinner',
        'setupVariant',
        'setupColor',
        'setupStateColor',
    ];

    /**
     * The theme name.
     *
     * @var string|null
     */
    public $theme;

    /**
     * The theme provider.
     *
     * @var \TALLKit\Components\ThemeProvider
     */
    private $themeProvider;

    /**
     * The theme key.
     *
     * @var string
     */
    protected $themeKey;

    protected array $props = [];

    /**
     * Create a new component instance.
     *
     * @param  string|null  $theme
     * @return void
     */
    /*
    public function __construct($props = null)
    {
        $this->setProps($props);
    }
    */

    /*
    protected function setProps($props)
    {
        $this->props = $props;
    }
    */

    /*
    public function props($key = 'root', $default = null)
    {
        $props = array_replace_recursive($this->getProps(), $this->props ?? []);
        $x = target_get($props, $key, $default);

        //return data_set($x, 'tt', $this->attributes->get('tt'));

        return $x;
    }
    */

    /**
     * Get theme key.
     *
     * @return string
     */
    protected function getThemeKey()
    {
        return $this->themeKey ?? $this->getComponentKey();
    }

    protected function attrs()
    {
        return [];
    }

    protected function props(): array
    {
        return $this->props;
    }

    /*
    protected function getProps()
    {
        return [

        ];
    }
    */

    protected function newAttr(array $attributes = [], string $component = null, $setup = null, $class = null)
    {
        return Attr::make(
            attributes: $attributes,
            component: $component,
            setup: $setup,
            class: $class,
        );
    }

    public function attrs1($key = 'root', $root = null)
    {
        $root ??= $key === 'root';
        $settings = $this->getAttrs();

        $attrs = data_get($settings, $key, []);
        $pt = new ComponentAttributeBag();

        if (is_array($attrs)) {
            $pt = $pt->merge($attrs, false);
        } else if ($attrs instanceof ComponentAttributeBag) {
            $pt = $pt->merge($attrs->getAttributes(), false);
        }

        if ($root) {
            $p4 = []; //data_get($this->pt, $key, []);
            $oo = new ComponentAttributeBag(is_array($p4) ? $p4 : ['class' => $p4]);


            $themeAttrs = collect(['foo.loading' => 'bar'])->toArray();


            $subkeyAttrs = (new ComponentAttributeBag())->merge(MergeThemeProvider::mergeRecursiveClass(
                [],
                $themeAttrs
            ), false);

            //dd($subkeyAttrs);


            //dd($this->attributes);

            return $pt->merge($this->attributes->except('pt')->whereDoesntStartWith('pt2:')->whereDoesntStartWith('theme:')->whereDoesntStartWith('pt:')->getAttributes())
                ->merge($oo->except('pt')->getAttributes(), false)->merge($subkeyAttrs->getAttributes(), false);

            return $pt->merge($this->attributes->except('pt')->whereDoesntStartWith('pt:')->getAttributes());
            //return $this->attributes->merge($pt->getAttributes(), false);
        }

        /*$themeAttrs = collect($this->attributes->whereStartsWith("theme:$key"))
                ->mapWithKeys(function ($value, $key) {
                    return [Str::replace('theme:', '', $key) => MergeThemeProvider::convertStringToArrayClass($value)];
                })->get($key, []);

               $subkeyAttrs = (new ComponentAttributeBag())->merge(MergeThemeProvider::mergeRecursiveClass(
                    MergeThemeProvider::convertStringToArrayClass($pt->getAttributes()),
                    $themeAttrs
                ), false);

                return $this->attributes->whereStartsWith("theme:$key")->whereDoesntStartWith('theme:')->merge(
                    $subkeyAttrs->getAttributes(),
                    false
                );*/


        //dd($key, $this->attributes->whereStartsWith('pt:loading'));
        $p = new ComponentAttributeBag();
        //$p2 = data_get($this->attributes->get('attrs', []), $key, []);
        $p3 = data_get($this->attributes->get('pt', []), $key, []);
        // $p4 = data_get($this->pt, $key, []);


        //  $p = $p->merge(is_array($p4) ? $p4 : ['class' => $p4], false);
        $p = $p->merge(is_array($p3) ? $p3 : ['class' => $p3], false);
        //$p = $p->merge(is_array($p2) ? $p2 : ['class' => $p2], false);

        return $pt->merge($p->getAttributes(), false);
    }

    public function attr($key = 'root', $root = null)
    {
        if ($key === 'loading') {
            //dd($this->attributes);
        }
        $root ??= $key === 'root';
        /*$pt = $this->attributes->get('pt', []);

        $x = $this->attributes;

        if (get_class($this) === Avatar::class) {
            //dd($pt);
            $x = (new ComponentAttributeBag([
               'pt:root' => [
                   'class' => 'xxxxxxxxxx2',
                   'pt:loading' => [
                        'pt:icon' => 'xxxxxxxxxx3',
                        'pt:text' => [
                            'class' => 'xxxxxxxxxx4',
                            'baz' => 'bar'
                        ],
                    ],
               ]
            ]))->merge($this->attributes->whereDoesntStartWith(['pt', 'xtheme'])->getAttributes());
        }*/

        if (get_class($this) === Loading::class) {
            //dd($this->attributes);
            //dd($this->attributes->get('pt'), data_get($this->attributes->get('pt'), 'loading'));
        }

        $x = $this->attributes->whereDoesntStartWith('xtheme')->except($this->smartAttributes);
        $result = $root
            ? $x->mergeThemeProvider($this->getThemeProvider(), $key)
            : $x->mergeOnlyThemeProvider($this->getThemeProvider(), $key);

        return new Attr($result->getAttributes());
    }

    public function prop($key)
    {
        return $this->{$key};
        return $this->getData($key, data_get($this->props(), $key));
    }

    protected function getThemeProvider()
    {
        if (!$this->themeProvider) {
            $this->theme = $this->attributes->get('th1eme') ?? app(ThemeBinder::class)->get() ?? ThemeProvider::getThemeByRoute();
            $this->themeProvider = app(ThemeProvider::class)->make($this->theme, $this->getThemeKey());
            $this->themeProvider->merge($this->attrs());
        }

        return $this->themeProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return fn (array $data) => $this->blade()->with($this->run($data));
    }

    private array $setVariables = [];

    private array $smartAttributes = [];

    protected function setupProps()
    {
        foreach ($this->packs as $pack) {
            $this->managePacks($pack);
        }

        foreach ($this->props() as $key => $prop) {
            $this->manageProps($key, $prop);
        }
    }

    private function manageProps(string $key, mixed $value)
    {
        $field = Str::camel($key);

        $this->{$field} = $this->getData(attribute: $field, default: $value);
        $this->setVariables($field);
    }

    protected function getData(string $attribute, mixed $default = null): mixed
    {
        if ($this->attributes->has($kebab = Str::kebab($attribute))) {
            $this->smartAttributes($kebab);

            return $this->attributes->get($kebab);
        }

        if ($this->attributes->has($camel = Str::camel($attribute))) {
            $this->smartAttributes($camel);

            return $this->attributes->get($camel);
        }

        return $default;

        /*
        if ($kebab === 'icon-size' && property_exists($this, 'size')) {
            return $this->size;
        }

        return config("wireui.{$this->config}.default.{$kebab}") ?? $default;
        */
    }

    /*
    protected function getDataModifier(string $attribute, ComponentPack $dataPack): mixed
    {
        $value = $this->attributes->get($attribute) ?? $this->getMatchModifier($dataPack->keys());

        $remove = in_array($value, $dataPack->keys()) ? [$value] : [];

        $this->smartAttributes([$attribute, ...$remove]);

        return $value ?? config("wireui.{$this->config}.default.{$attribute}");
    }
    */

    protected function getDataModifier(string $attribute)
    {
        $keys = ['md', 'lg'];

        //$this->attributes->attribute();

        $value = $this->attributes->get($attribute) ?? $this->getMatchModifier($keys);

        $remove = in_array($value, $keys) ? [$value] : [];

        $this->smartAttributes([$attribute, ...$remove]);

        //return $value ?? config("wireui.{$this->config}.default.{$attribute}");
        return $value ?? config("wireui.default.{$attribute}");
    }

    protected function getMatchModifier($keys)
    {
        return array_key_first($this->attributes->only($keys)->getAttributes());
    }

    protected function smartAttributes($attributes): void
    {
        collect(Arr::wrap($attributes))->filter()->each(
            fn ($value) => $this->smartAttributes[] = $value,
        );
    }

    protected function setVariables($variables)
    {
        collect(Arr::wrap($variables))->filter()->each(
            fn ($value) => $this->setVariables[] = $value,
        );
    }

    protected function mounted(array $data)
    {
        //
    }

    protected function processed(array $data)
    {
        //
    }

    protected function finished(array $data)
    {
        //
    }

    private function setConfig()
    {
        $this->config = 'progressbar';
    }

    protected function run(array $data)
    {
        $this->setConfig();

        $this->call('mounted', $data);

        foreach (self::METHODS as $method) {
            $this->call($method, $data);
        }

        $this->call('processed', $data);

        foreach ($this->setVariables as $attribute) {
            $data[$attribute] = $this->{$attribute};
        }

        $data['attributes'] = $this->attributes->except($this->smartAttributes);

        return tap($data, fn (array &$data) => $this->call('finished', $data));
    }

    private function call(string $function, array &$data)
    {
        if (method_exists($this, $function)) {
            $this->{$function}($data);
        }
    }


    public function __get($name)
    {
        dd(1, $name);
        return $this->getData($name, data_get($this->props(), $name));
    }


    protected array $packs = [];

    private function managePacks(string $value)
    {
        $field = Str::camel($value);

        $config = Str::plural($value);

        /** @var ComponentPack $pack */
        $pack = resolve(config("wireui.{$this->config}.packs.{$config}"));
        $pack = new ComponentPack();

        //$this->{$field} = $this->getData($field);
        $this->{$field} = $this->getDataModifier($field);

        $this->{"{$field}Classes"} = $pack->get($this->{$field});

        $this->setVariables([$field, "{$field}Classes"]);
    }
}
