<?php

namespace App\Libraries\Seo;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class ServiceProvider extends LaravelServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/seo.php' => config_path('seo.php')
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/seo.php', 'seo'
        );

        $this->app->singleton(Manager::class, function($app) {
            return new Manager($app['config']['seo'], $app['request']);
        });

        $this->app->alias(Manager::class, 'ltsochev.seo');
    }

    public function provides()
    {
        return ['ltsochev.seo', Manager::class];
    }
}
