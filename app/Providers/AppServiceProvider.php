<?php

namespace App\Providers;

use App\Libraries\Utils\AssetVersions;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Parsedown::class);

        $this->app->singleton('assets.versioned', function() {
            return new AssetVersions(public_path('mix-manifest.json'));
        });

        Blade::if('env', function($env) {
            return app()->environment($env);
        });
    }
}
