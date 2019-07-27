<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function App\Support\seo;

class DashboardController extends Controller
{
    public function getIndex()
    {
        seo()->setTitle('LTsochev - Administration');

        return view('admin.dashboard');
    }
}
