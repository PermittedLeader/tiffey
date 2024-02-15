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
        $this->loadViewsFrom(__DIR__.'/../resources/views','tiffey');
        Blade::componentNamespace('Permittedleader\\Tiffey\\View','tiffey');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__."/../config/tiffey.php",'tiffey');
    }
}