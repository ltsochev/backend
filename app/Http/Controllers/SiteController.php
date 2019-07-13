<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        app('translator');
        return view('welcome');
    }
}
