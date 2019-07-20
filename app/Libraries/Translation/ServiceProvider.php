<?php

namespace App\Libraries\Translation;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Translation\FileLoader;
use App\Libraries\Translation\Middleware\SetLocaleMiddleware;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->registerLoader();

        $this->loadMigrations();

        $this->app->singleton('translator', function($app) {
            $loader = $app['translation.loader'];

            $locale = $app['config']['app.locale'];

            $trans = new Translator($loader, $app['cache']->store(), $locale);

            $trans->setFallback($app['config']['app.fallback_locale']);

            return $trans;
        });

        $this->loadTranslations();
    }

    public function register()
    {
        // Laravel 5.2 compatibility layer
    }

    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new FileLoader($app['files'], $app['path.lang']);
        });
    }

    protected function loadMigrations()
    {
        $path = __DIR__ . '/Migrations';

        $this->loadMigrationsFrom($path);

        $this->publishes([$path => database_path('migrations')], 'ltsochev-translation-migrations');
    }

    protected function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'ltsochev');

        $this->publishes([
            __DIR__.'/Translations' => resource_path('lang/vendor/ltsochev'),
        ]);
    }
}
