<?php

namespace App\Libraries\Schema;

use Spatie\SchemaOrg\Schema;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->app->singleton(Manager::class);

        $this->injectSiteOwner();
    }

    public function register()
    {
        //
    }

    private function injectSiteOwner()
    {
        $this->app->get(Manager::class)->add(Schema::person()
            ->name('Lachezar Tsochev')
            ->url(url('/'))
            ->image(asset('assets/img/ltsochev.jpg'))
            ->sameAs([
                'https://www.facebook.com/luchezar.tzochew',
                'https://www.linkedin.com/in/lachezar-tzochev-8744b430?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BbJWDjTM%2BQ6G14LvkfcyBwA%3D%3D',
                'https://twitter.com/Sk1ppeR'
            ])
        );
    }
}
