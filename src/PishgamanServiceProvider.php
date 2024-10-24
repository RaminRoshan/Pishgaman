<?php

namespace Pishgaman\Pishgaman;

use Illuminate\Support\ServiceProvider;
use Pishgaman\Pishgaman\Library\Theme\ThemeManager;
use Pishgaman\Pishgaman\Library\Theme\ThemeStrategies;
use Pishgaman\Pishgaman\Library\Virastyar\Virastyar;
use Pishgaman\Pishgaman\Library\Virastyar\VirastyarInterface;
use Pishgaman\Pishgaman\Library\mpdf\mpdf;
use Pishgaman\Pishgaman\Library\mpdf\MpdfInterface;

class PishgamanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'PishgamanView');

        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/Resources/lang', 'PishgamanLang');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        // Publish configuration (if needed)
        $this->publishes([
            __DIR__.'/publish/Templates' => public_path('Templates'),
            __DIR__.'/publish/media' => public_path('media'),
            __DIR__.'/publish/TemplatesViews' => resource_path('views/Templates'),
        ], 'public');

        // Bind ThemeManager to ThemeStrategies
        $this->app->bind(ThemeManager::class, ThemeStrategies::class);
        $this->app->bind(VirastyarInterface::class , Virastyar::class);
        $this->app->bind(MpdfInterface::class , Mpdf::class);


    }

    public function register()
    {
        // Register services if needed
    }
}
