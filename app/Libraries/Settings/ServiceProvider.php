<?php

namespace App\Libraries\Settings;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton('ltsochev.settings', function($app) {
            return new Manager([
                'database' => ['table' => 'mf_logs'],
                'cache.prefix' => 'muhaha',
                'cache.key' => 'blaa',
            ], $app->get('cache')->store(), $app->get('db')->connection()->getPdo());
        });
    }

    public function provides()
    {
        return ['ltsochev.settings'];
    }
}
