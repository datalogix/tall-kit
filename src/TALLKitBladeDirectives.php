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
}
