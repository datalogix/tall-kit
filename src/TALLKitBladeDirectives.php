<?php

namespace TALLKit;

use Illuminate\Support\Str;

class TALLKitBladeDirectives
{
    /**
     * Head.
     *
     * @param  mixed  $expression
     * @return string
     */
    public static function head($expression)
    {
        return '<?php echo \TALLKit\Facades\TALLKit::head('.$expression.'); ?>';
    }

    /**
     * Scripts.
     *
     * @param  mixed  $expression
     * @return string
     */
    public static function scripts($expression)
    {
        return '<?php echo \TALLKit\Facades\TALLKit::scripts('.$expression.'); ?>';
    }

    /**
     * Theme.
     *
     * @param  mixed  $expression
     * @return string
     */
    public static function theme($expression)
    {
        return '<?php app(\TALLKit\Binders\ThemeBinder::class)->bind('.$expression.'); ?>';
    }

    /**
     * End theme.
     *
     * @return string
     */
    public static function endTheme()
    {
        return '<?php app(\TALLKit\Binders\ThemeBinder::class)->pop(); ?>';
    }

    /**
     * Bind.
     *
     * @param  mixed  $expression
     * @return string
     */
    public static function bind($expression)
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->bind('.$expression.'); ?>';
    }

    /**
     * End bind.
     *
     * @return string
     */
    public static function endBind()
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->endBind(); ?>';
    }

    /**
     * Model.
     *
     * @param  mixed  $expression
     * @return string
     */
    public static function model($expression)
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->model('.$expression.'); ?>';
    }

    /**
     * End model.
     *
     * @return string
     */
    public static function endModel()
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->endModel(); ?>';
    }

    /**
     * Wire.
     *
     * @param  mixed  $expression
     * @return string
     */
    public static function wire($expression)
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->wire('.$expression.'); ?>';
    }

    /**
     * End wire.
     *
     * @return string
     */
    public static function endWire()
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->endWire(); ?>';
    }

    /**
     * Scoped slot.
     *
     * @param  mixed  $expression
     * @return string
     */
    public static function scopedslot($expression)
    {
        // Split the expression by `top-level` commas (not in parentheses)
        $directiveArguments = preg_split("/,(?![^\(\(]*[\)\)])/", $expression);
        $directiveArguments = array_pad(array_map('trim', $directiveArguments), 2, '()');

        // Prepare arguments to uses
        if (! Str::startsWith($directiveArguments[1], '(')) {
            $ar = $directiveArguments;
            $directiveArguments = [];
            $directiveArguments[] = $ar[0];
            unset($ar[0]);
            $directiveArguments[] = '('.implode(', ', $ar).')';
        }

        // Ensure that the directive's arguments array has 3 elements - otherwise fill with `null`
        $directiveArguments = array_pad($directiveArguments, 3, null);

        // Extract values from the directive's arguments array
        [$name, $functionArguments, $functionUses] = $directiveArguments;

        // Connect the arguments to form a correct function declaration
        if ($functionArguments) {
            $functionArguments = "function {$functionArguments}";
        }

        $functionUses = array_filter(explode(',', trim($functionUses, '()')), 'strlen');

        // Add `$__env` to allow usage of other Blade directives inside the scoped slot
        array_push($functionUses, '$__env');

        $functionUses = implode(',', $functionUses);

        return "<?php \$__env->slot({$name}, {$functionArguments} use ({$functionUses}) { ?>";
    }

    /**
     * End scoped slot.
     *
     * @return string
     */
    public static function endscopedslot()
    {
        return '<?php }); ?>';
    }
}
