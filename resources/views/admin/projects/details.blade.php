@extends('admin.layouts.meta')

@section('content')
<div class="title-bar d-flex flex-row">
    <h1 class="h3 mb-4 text-gray-800">Project details - Project #{{ $project->id }}</h1>
    <ul class="list-inline ml-auto">
        <li class="list-inline-item">
            <button id="status-btn" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                Change status
            </button>
            <div class="dropdown-menu" aria-labelledby="status-btn">
                <a class="dropdown-item" href="{{ route('admin.projects.update.status', ['project' => $project->id, 'status' => 'new']) }}">Set as New</a>
                <a class="dropdown-item" href="{{ route('admin.projects.update.status', ['project' => $project->id, 'status' => 'old']) }}">Set as Seen</a>
                <a class="dropdown-item" href="{{ route('admin.projects.update.status', ['project' => $project->id, 'status' => 'completed']) }}">Set as Completed</a>
            </div>
        </li>
        <li class="list-inline-item">
            <a href="{{ route('admin.projects.delete', ['project' => $project->id]) }}" class="btn btn-danger">
                Delete
            </a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Client information</h5>
                <table class="table table-fixed table-striped">
                    <tr>
                        <td>Name</td>
                        <td>{{ $project->name }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ $project->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $project->phone }}</td>
                    </tr>
                    <tr>
                        <td>Budget</td>
                        <td>{{ $project->budgetHumanReadable() }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Project information</h5>
                <table class="table table-fixed table-striped">
                    <tr>
                        <td>Status</td>
                        <td>{{ $project->status() }}</td>
                    </tr>
                    <tr>
                        <td>Project type</td>
                        <td>{{ $project->type }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $project->description }}</td>
                    </tr>
                    <tr>
                        <td>Needs</td>
                        <td>{{ implode(', ', $project->projectNeeds()) }}</td>
                    </tr>
                    <tr>
                        <td>Start date</td>
                        <td>{{ $project->getStartDate() }}</td>
                    </tr>
                    <tr>
                        <td>Launch date</td>
                        <td>{{ $project->getStartDate() }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
