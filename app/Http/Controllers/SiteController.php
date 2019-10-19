<?php

namespace App\Http\Controllers;

use Spatie\SchemaOrg\Schema;
use function App\Support\{seo, schemaOrg};

class SiteController extends Controller
{
    public function index()
    {
        seo()->setPageType('website');
        seo()->setTitle('Lachezar Tsochev - Full-stack developer for hire | Modern web solutions');
        seo()->setDescription('Full-stack web developer and systems engineer.');
        seo()->addGraphTag([
            'site_name' => 'Lachezar Tsochev',
            'locale'    => app()->getLocale()
        ]);

        seo()->setShareImage(asset('assets/img/fb-share.jpg'), 1200, 630);

        schemaOrg()->add(Schema::website()
                        ->url(url('/'))
                        ->name('Lachezar Tsochev - full-stack developer for hire.'));

        return view('page.home');
    }

    public function getTerms()
    {
        return view('page.tos');
    }
}
