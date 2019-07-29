<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectRequest;
use App\Http\Controllers\Controller;
use function App\Support\seo;

class ProjectsController extends Controller
{
    public function getRequests()
    {
        seo()->setTitle('LTSochev - New projects');

        $projects = ProjectRequest::where('status', 0)->orderBy('id', 'DESC')->paginate();

        return view('admin.projects.requests')->with(compact('projects'));
    }

    public function getRequestsFiltered($status)
    {
        seo()->setTitle('LTSochev - Filtered projects');

        $realStatus = null;

        switch($status) {
            case 'new':
                return redirect()->to( route('admin.projects.requests') );
                break;
            case 'old':
                $realStatus = 1;
                break;
            case 'completed':
                $realStatus = 2;
                break;
        }

        $projects = ProjectRequest::where('status', $realStatus)->orderBy('id', 'DESC')->paginate();

        return view('admin.projects.requests')->with(compact('projects'));
    }

    public function getProjectDetails($projectId)
    {
        $project = ProjectRequest::find($projectId);
        if (is_null($project)) {
            abort(404);
        }

        seo()->setTitle('LTSochev - Project details for project #' . $project->id);

        return view('admin.projects.details')->with(compact('project'));
    }

    public function updateProjectStatus($projectId, $newStatus)
    {
        $project = ProjectRequest::find($projectId);
        if (is_null($project)) {
            abort(404);
        }

        $project->setStatus($newStatus);

        $project->save();

        return redirect()->to(route('admin.projects.details', ['project' => $projectId]));
    }

    public function deleteProject($projectId)
    {
        $project = ProjectRequest::find($projectId);
        if (is_null($project)) {
            abort(404);
        }

        $project->delete();

        return redirect()->to(route('admin.projects.requests'));
    }
}
