@if ($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ $error }}
</div>
@endforeach
@endif

@if (session()->has('success'))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('success') }}
</div>
@endif

@if (session()->has('info'))
<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('info') }}
</div>
@endif
