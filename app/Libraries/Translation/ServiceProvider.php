<?php

namespace App\Libraries\Translation;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Translation\FileLoader;
use App\Libraries\Translation\Middleware\SetLocaleMiddleware;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware(SetLocaleMiddleware::class);
    }

    public function register()
    {
        $this->registerLoader();

        $this->app->singleton('translator', function($app) {
            $loader = $app['translation.loader'];

            $locale = $app['config']['app.locale'];

            $trans = new Translator($loader, $locale);

            $trans->setFallback($app['config']['app.fallback_locale']);

            return $trans;
        });
    }

    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new FileLoader($app['files'], $app['path.lang']);
        });
    }
}
