<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {

        View::composer('admin.header', function($view) {
            $user = Auth::user();

            $view->with(compact('user'));
        });
    }

    public function register()
    {
        //
    }
}
