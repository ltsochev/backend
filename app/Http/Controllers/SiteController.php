<?php

namespace App\Http\Controllers;

use function App\Support\seo;

class SiteController extends Controller
{
    public function index()
    {
        return view('page.home');
    }
}
