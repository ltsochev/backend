<!doctype html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        {!! App\Support\seo()->render(); !!}

        <meta name="csrf-token" content="<?= csrf_token(); ?>" />

        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->

        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        @section('main-styles')
        <link rel="stylesheet" href="<?= asset('css/styles.css'); ?>" type="text/css" media="all" />
        @show

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        @if (app()->environment() === 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150377756-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-150377756-1');
        </script>
        @endif

        {!! app(App\Libraries\Schema\Manager::class)->render() !!}

    </head>
    <body data-spy="scroll" data-target="#main-menu-scrollspy" data-offset="60">
        <div id="stage" class="site-window {{ !empty($body_class) ? $body_class : '' }}">
            @yield('content', 'No content provided for meta layout')

            @section('footer')
            <footer class="page-footer">
                <p>@lang('Copyright &copy; :year Lachezar Tsochev IT Solutions. All rights reserved', ['year' => date('Y')]).</p>
            </footer>
            @show
        </div>

        @yield('styles')
        @yield('scripts')
    </body>
</html>
