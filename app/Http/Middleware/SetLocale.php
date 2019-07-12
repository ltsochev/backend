<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;

class SetLocale
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle($request, Closure $next)
    {
        if (session()->has('locale'))
        {
            $this->app->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
