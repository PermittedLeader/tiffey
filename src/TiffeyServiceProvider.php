<?php
namespace Permittedleader\Tiffey;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class TiffeyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__."/../config/tiffey.php" => config_path('tiffey.php')
        ],'tiffey-config');
        $this->publishes([
            __DIR__."/../resources/views" => resource_path('views/vendor/tiffey')
        ],'tiffey-views');
        $this->publishes([
            __DIR__."/../resources/views/components/layouts/footer.blade.php" => resource_path('views/vendor/tiffey/components/layouts/footer.blade.php')
        ],'tiffey-footer');
        $this->publishes([
            __DIR__."/../resources/views/components/nav/index.blade.php" => resource_path('views/vendor/tiffey/components/nav/index.blade.php')
        ],'tiffey-nav');
        $this->loadViewsFrom(__DIR__.'/../resources/views','tiffey');
        Blade::componentNamespace('Permittedleader\\Tiffey\\View','tiffey');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__."/../config/tiffey.php",'tiffey');
        
    }
}