@extends('admin.layouts.meta')

@section('content')
<div class="title-bar">
    <h1 class="h3 mb-0 text-gray-800">Translation System</h1>
    <p class="mb-4">Each new translation phrase will popup in here. This page also contains translated phrases ready for editting!</p>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Phrase list</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="phrases-status-list">
                        <li>Total phrases: <b>{{ $phrases->count() }}</b></li>
                        <li>Activated phrases: <b>6</b></li>
                        <li>Translated phrases: <b>2</b></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered" cellspacing="0" role="grid">
                    <thead>
                        <tr role="row">
                            <th>Source phrase</th>
                            <th>English</th>
                            <th>Bulgarian</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="center">
                                something for the footer
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($phrases as $phrase)
                        <tr>
                            <td valign="middle" align="center" class="align-middle">{!! $phrase->key !!}</td>
                            <td>
                                <textarea placeholder="Translate the English"></textarea>
                                <a href="#" class="copy-source" title="Copy source">Copy source</a>
                            </td>
                            <td>
                                <textarea placeholder="Translate in Bulgarian"></textarea>
                                <a href="#" class="copy-source" title="Copy source">Copy source</a>
                            </td>
                            <td class="align-middle">
                                @if ($phrase->status == 0) Inactive @else Active @endif
                            </td>
                            <td nowrap class="align-middle">
                                Save / Activate / Delete
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
