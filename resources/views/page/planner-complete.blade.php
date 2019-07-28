@extends('layouts.meta', ['body_class' => 'content-page planner-success-page'])

@section('content')
<div class="hero-panel">
    <a href="{{ url('/') }}" class="logo">Lachezar Tsochev IT Solutions</a>
    <div class="app-navbar">
        <nav class="navbar navbar-expand-lg navbar-light main-menu">
            @include('layouts.language-switcher')
            @include('layouts.nav-static')
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <section class="section-block">
                <article>
                    <header>
                        <div class="icon">
                            <i class="far fa-check-circle"></i>
                        </div>
                        <h1>@lang('Thank you!')</h1>
                        <h2>@lang('Your request has been accepted and I\'ll contact you for further information!')</h2>
                    </header>
                </article>
            </section>
        </div>
    </div>
</div>
@endsection

@section('footer')
@endsection

@section('scripts')
<script src="{{ asset('js/app-minimal.js') }}"></script>
@endsection
