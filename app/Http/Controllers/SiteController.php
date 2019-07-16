<?php

namespace App\Http\Controllers;

use function App\Support\seo;

class SiteController extends Controller
{
    public function index()
    {
        seo()->setTitle('Lachezar Tsochev - Full-stack developer for hire | Modern web solutions');
        seo()->setDescription('Full-stack web developer and systems engineer.');
        seo()->addGraphTag([
            'site_name' => 'Lachezar Tsochev',
            'locale'    => app()->getLocale()
        ]);

        return view('page.home');
    }
}
