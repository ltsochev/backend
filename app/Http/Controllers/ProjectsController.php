<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function getPlanner()
    {
        Carbon::setLocale(app()->getLocale());

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
}
