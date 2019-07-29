@extends('admin.layouts.meta')

@section('content')
<div class="title-bar">
    <h1 class="h3 mb-4 text-gray-800">Project requests</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link {{ App\Support\set_active('admin/projects/requests') }}" href="{{ route('admin.projects.requests') }}">New</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ App\Support\set_active('admin/projects/requests/old') }}" href="{{ route('admin.projects.requests.filtered', ['status' => 'old']) }}">Old</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ App\Support\set_active('admin/projects/requests/completed') }}" href="{{ route('admin.projects.requests.filtered', ['status' => 'completed']) }}">Completed</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-projects" cellspacing="0" role="grid">
                    <thead>
                        <tr>
                            <th class="text-center">Req.id #</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Project type</th>
                            <th class="text-center">Budget</th>
                            <th class="text-center">Added at</th>
                            <th class="text-center">Start date</th>
                            <th class="text-center">Launch date</th>
                            <th class="text-center">Details</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="9" align="center">
                                {!! $projects->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>#{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->email }}</td>
                            <td>{{ $project->type }}</td>
                            <td>{{ $project->budgetHumanReadable() }}</td>
                            <td>{{ $project->created_at->format('d F, Y') }}</td>
                            <td>{{ $project->getStartDate() }}</td>
                            <td>{{ $project->getLaunchDate() }}</td>
                            <td>
                                <a href="{{ route('admin.projects.details', ['project' => $project->id]) }}">
                                    <i class="fas fa-fw fa-info-circle"></i>
                                    View details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
