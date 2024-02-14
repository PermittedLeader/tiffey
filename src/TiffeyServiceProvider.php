<?php
namespace Permittedleader\Tiffey;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__."/../config/tiffey.php" => config_path('tiffey.php')
        ]);
        
        $this->loadViewsFrom(__DIR__.'/../resources/views/','tiffey');
        Blade::componentNamespace('Tiffey\\Views\\Components','tiffey');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__."/../config/tiffey.php",'tiffey');
    }
}