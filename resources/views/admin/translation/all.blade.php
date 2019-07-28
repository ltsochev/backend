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
                        <li>Activated phrases: <b>{{ $phrases->active()->count() }}</b></li>
                        <li>Translated phrases: <b>{{ $phrases->translated()->count() }}</b></li>
                    </ul>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-translations" cellspacing="0" role="grid">
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
                        <tr id="translation-row-{{ $phrase->id }}">
                            <td valign="middle" align="center" class="align-middle" id="phrase-{{ $phrase->id }}">{!! $phrase->key !!}</td>
                            <td>
                                <textarea placeholder="Translate the English" id="translation-phrase-{{ $phrase->id }}-en">{!! $phrase->getLocaleTranslation('en') !!}</textarea>
                                <a href="#" class="copy-source" title="Copy source" data-phrase="{{ $phrase->id }}" data-locale="en">Copy source</a>
                            </td>
                            <td>
                                <textarea placeholder="Translate in Bulgarian" id="translation-phrase-{{ $phrase->id }}-bg">{!! $phrase->getLocaleTranslation('bg') !!}</textarea>
                                <a href="#" class="copy-source" title="Copy source" data-phrase="{{ $phrase->id }}" data-locale="bg">Copy source</a>
                            </td>
                            <td class="align-middle" align="center">
                                <input type="checkbox" id="translation-status-{{$phrase->id}}" name="chbx" value="1" @if($phrase->status > 0) checked @endif />
                                <label for="translation-status-{{$phrase->id}}">Activate</label>
                            </td>
                            <td nowrap class="align-middle" align="center">
                                <div class="button-container text-center">
                                    <button type="button" class="btn btn-primary btn-block rounded-0 save-btn" data-phrase="{{ $phrase->id }}">Save</button>
                                </div>

                                <div class="button-container text-center my-1"><small> - or - </small></div>

                                <div class="button-container text-center">
                                    <button type="button" class="btn btn-danger btn-block rounded-0 delete-btn" data-phrase="{{ $phrase->id }}">Delete</button>
                                </div>
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

@section('scripts')
<script type="text/javascript">

var localeList = ['bg', 'en'];

$('.copy-source').click(function(e) {
    e.preventDefault();

    if (!confirm('Using this button will overwrite everything that you might have in the above field! Are you sure you widh to proceed?')) {
        return false;
    }

    let $this = $(this),
        locale = $this.data('locale'),
        phraseId = $this.data('phrase'),
        sourceSelector = 'phrase-' + phraseId,
        textAreaSelector = 'translation-phrase-' + phraseId + '-' + locale;

    document.getElementById(textAreaSelector).value = document.getElementById(sourceSelector).innerText;
});

$('.save-btn').click(function(e) {
    e.preventDefault();

    let $this = $(this),
        phraseId = $this.data('phrase'),
        params = {
            phrase: phraseId,
            locale: {},
            status: document.getElementById('translation-status-' + phraseId).checked ? 1 : 0
        };

    for (let i in localeList) {
        let locale = localeList[i],
            textAreaSelector = 'translation-phrase-' + phraseId + '-' + locale;

        params.locale[localeList[i]] = document.getElementById(textAreaSelector).value;
    }

    fetch("{{ route('admin.translations.save') }}", {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        redirect: 'follow',
        referrer: 'no-referrer',
        body: JSON.stringify(params)
    }).then(function(response) {
        return response.json()
    }).then(function(json) {
        alert(json.message);
    }).catch(function(error) {
        console.error(error);
    })
})

$('.delete-btn').click(function(e) {
    e.preventDefault();

    if (!confirm('Are you sure you wish to delete this phrase?')) {
        return false;
    }

    let $this = $(this),
        phraseId = $this.data('phrase'),
        params = {
            'phrase': phraseId
        }

    fetch("{{ route('admin.translations.delete') }}", {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        redirect: 'follow',
        referrer: 'no-referrer',
        body: JSON.stringify(params)
    }).then(function(response) {
        return response.json()
    }).then(function(json) {
        if (json.status > 0) {
            $('#translation-row-' + phraseId).remove();
        }
    }).catch(function(error) {
        console.error(error);
    });
});
</script>
@endsection
