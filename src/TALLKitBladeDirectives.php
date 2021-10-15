<?php

namespace TALLKit;

use Illuminate\Support\Str;

class TALLKitBladeDirectives
{
    public static function styles($expression)
    {
        return '<?php echo \TALLKit\Facades\TALLKit::styles('.$expression.'); ?>';
    }

    public static function scripts($expression)
    {
        return '<?php echo \TALLKit\Facades\TALLKit::scripts('.$expression.'); ?>';
    }

    public static function theme($expression)
    {
        return '<?php app(\TALLKit\Binders\ThemeBinder::class)->bind('.$expression.'); ?>';
    }

    public static function endtheme()
    {
        return '<?php app(\TALLKit\Binders\ThemeBinder::class)->pop(); ?>';
    }

    public static function bind($expression)
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->bind('.$expression.'); ?>';
    }

    public static function endbind()
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->pop(); ?>';
    }

    public static function wire($expression)
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->wire('.$expression.'); ?>';
    }

    public static function endwire()
    {
        return '<?php app(\TALLKit\Binders\FormDataBinder::class)->endWire(); ?>';
    }

    public static function scopedslot($expression)
    {
        // Split the expression by `top-level` commas (not in parentheses)
        $directiveArguments = preg_split("/,(?![^\(\(]*[\)\)])/", $expression);
        $directiveArguments = array_map('trim', $directiveArguments);

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

    public static function endscopedslot()
    {
        return '<?php }); ?>';
    }
}
