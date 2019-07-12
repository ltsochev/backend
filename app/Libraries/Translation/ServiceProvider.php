<?php

namespace App\Libraries\Translation;

use App\Libraries\Translation\Middleware\SetLocaleMiddleware;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware(SetLocaleMiddleware::class);
    }

    public function register()
    {
        $this->app->singleton('ltsochev.translation', function($app) {
            //
        });
    }
}
