<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use function App\Support\seo;

class ProjectsController extends Controller
{
    public function getPlanner()
    {
        // We need this for simple month translation
        // as Carbon already includes translations
        // for various locales
        Carbon::setLocale(app()->getLocale());

        seo()->setTitle('Project Planner - Lachezar Tsochev');
        seo()->setDescription('Plan your project ahead of time.');
        seo()->addGraphTag([
            'site_name' => 'Lachezar Tsochev',
            'locale'    => app()->getLocale()
        ]);

        return view('projects.planner');
    }

    public function submitProject(Request $request)
    {
        // name, email, project-type, description,
        // needs[design, development],

        // budget-type, phone, start-month, start-year, start-date
        // launch-month, launch-year, launch-date

        $validatedData = $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'project-type' => 'required',
            'description' => 'required',
            'needs' => 'required',
        ]);

        dd($validatedData);
    }

    public function getProject($projectSlug)
    {
        return view('projects.project')->with('project', $projectSlug);
    }
}
