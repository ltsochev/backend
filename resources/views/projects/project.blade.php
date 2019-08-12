@extends('layouts.meta', ['body_class' => 'project-overview content-page'])

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
            <section class="section-block project-article">
                <article>
                    <header>
                        <h1>@lang('How it\'s made - :project', ['project' => $projectName])</h1>
                    </header>
                    <div class="row">
                        @if (count($project['slider'] ?? []))
                        <div class="col-lg-7">
                            <div class="slider-gallery">
                                <img src="{{ asset('assets/img/imac@2x.png') }}" alt="iMac preview image" />
                                <ul class="slider">
                                @foreach($project['slider'] as $index => $image)
                                    @if ($index == 0)
                                    <li class="image active" style="opacity: 1">
                                    @else
                                    <li class="image" style="">
                                    @endif
                                        <img src="{{ asset($image['src']) }}" alt="{{ $image['title'] }}" />>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-5">
                            <div class="feature-list border">
                                <h3>@lang('Technologies used')</h3>
                                <ul class="features">
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Git / GitHub</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> PHP 7.x</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> NodeJS</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> VueJS / Vuex</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Laravel 5.x</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> MySQL RDMBS</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Memcached</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Elasticsearch</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Online booking</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Newsletter</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Image editing tools</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Social features</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Analytics</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> Remarketing</li>
                                    <li class="feature-item"><i class="far fa-check-circle icon"></i> SEO optimizations</li>
                                </ul>
                            </div>
                            @if (!is_null($project['live_url']))
                            <div class="feature-list mt-3 border">
                                <div class="view-project text-center">
                                    <a href="{{ $project['live_url'] }}" class="btn btn-primary" target="_blank" rel="external">@lang('View live site')</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </article>
            </section>
            <section class="section-block project-article">
                <div class="row">
                    <div class="col-lg-12">
                        <article class="article-body markdown-article">
                            {{ $html }}
                        </article>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('main-styles')
<link rel="stylesheet" href="{{ asset('css/project.css') }}" type="text/css" media="all" />
@endsection

@section('scripts')
<script src="{{ asset('js/app-minimal.js') }}"></script>
@endsection
