<?php

namespace TALLKit;

class TALLKitBladeDirectives
{
    public static function init($expression)
    {
        return '<?php echo \TALLKit\Facades\TALLKit::init('.$expression.'); ?>';
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
