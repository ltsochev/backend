<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function App\Support\seo;
use App\Models\ProjectRequest;

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
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email',
            'project-type' => 'required',
            'description' => 'required',
            'needs' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If we reach this, we can safely submit the data
        $startDate = $launchDate = null;

        if ($request->get('start-year') > 0 &&
            $request->get('start-month') > 0 && $request->get('start-date', 0) == 0) {
                $startDate = Carbon::parse(
                    sprintf('%s-%s-01 00:00:00', $request->get('start-year'), $request->get('start-month'))
                );
        }

        if ($request->get('launch-year') > 0 &&
            $request->get('launch-month') > 0 &&
            $request->get('launch-date', 0) == 0) {
                $launchDate = Carbon::parse(
                    sprintf('%s-%s-01 00:00:00', $request->get('launch-year'), $request->get('launch-month'))
                );
        }

        $budgetTypes = [
            'basic' => 0,
            'pro' => 1,
            'enterprise' => 2
        ];

        $budgetType = array_key_exists($request->get('budget-type'), $budgetTypes)
                        ? $budgetTypes[$request->get('budget-type')]
                        : 0;

        $projectRequest = new ProjectRequest([
            'name'  => $request->get('name'),
            'email' => $request->get('email', 'johndoe@domain.com'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'type' => $request->get('project-type'),
            'project_needs' => json_encode($request->get('needs')),
            'ip_address' => $request->ip(),
            'user_agent' => $request->server('User-Agent'),
            'start_date' => $startDate,
            'launch_date' => $launchDate,
            'budget' => $budgetType,
        ]);

        $projectRequest->save();

        session()->flash('project-request', $projectRequest->id);

        return redirect()->route('project-planner-success');
    }

    public function getPlannerSuccess()
    {
        $requestId = session()->get('project-request');

        if ($requestId < 1) {
            return redirect()->route('project-planner');
        }

        return view('page.planner-complete');
    }

    public function getProject($projectSlug)
    {
        return view('projects.project')->with('project', $projectSlug);
    }
}
