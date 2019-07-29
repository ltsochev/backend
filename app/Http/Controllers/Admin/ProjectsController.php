<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectRequest;
use App\Http\Controllers\Controller;
use function App\Support\seo;

class ProjectsController extends Controller
{
    public function getRequests()
    {
        seo()->setTitle('LTSochev - Projects requested list');

        $projects = ProjectRequest::orderBy('id', 'DESC')->paginate();

        return view('admin.projects.requests')->with(compact('projects'));
    }
}
