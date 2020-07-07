<?php

namespace App\Http\Controllers;

class DemoController extends Controller
{
    public function getSrkSpa()
    {
        return view('demos.srk');
    }

    public function getSrkAbout()
    {
        return view('demos.srk-about');
    }
}
