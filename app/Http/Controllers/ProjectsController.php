<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use function App\Support\{seo, schemaOrg};
use App\Models\ProjectRequest;
use App\Mail\ProjectRequested;
use Spatie\SchemaOrg\Schema;

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

        $allowedTypes = ['website', 'app', 'other'];
        if (!in_array($request->get('project-type'), $allowedTypes)) {
            return redirect()->back()->withErrors(['invalid-field' => __('Invalid project type')])->withInput();
        }

        $projectRequest = new ProjectRequest([
            'name'  => $request->get('name'),
            'email' => $request->get('email', 'johndoe@domain.com'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'type' => $request->get('project-type'),
            'project_needs' => json_encode($request->get('needs')),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'start_date' => $startDate,
            'launch_date' => $launchDate,
            'budget' => $budgetType,
        ]);

        $projectRequest->save();

        session()->flash('project-request', $projectRequest->id);

        Mail::to('lachezar@ltsochev.com')->send(new ProjectRequested($projectRequest));

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
        $project = config('projects.' . $projectSlug);
        if (is_null($project)) {
            abort(404);
        }

        $projectName = app('translator')->getFromJson($project['name']);

        try {
            $md = app(\Parsedown::class);
            $locale = app()->getLocale();
            $filepath = $project['articles'][$locale];
            $mdText = Storage::disk('local')->get($filepath);
            $html = new HtmlString($md->setSafeMode(true)->text($mdText));
        } catch(FileNotFoundException $e) {
            Log::error($e);
            return redirect()->to('/');
        }

        seo()->setTitle(__("How it's made - :project", ['project' => $projectName]));
        seo()->setShareImage(asset($project['image']));

        $schemaProject = Schema::organization();
        if (!is_null($project['live_url'])) {
            $schemaProject->url($project['live_url']);
        }

        $schemaProject->name($projectName)
                    ->brand($project['brand'])
                    ->image(asset($project['image']));

        schemaOrg()->add($schemaProject);

        return view('projects.project')->with(compact('project', 'projectName', 'html'));
    }
}
