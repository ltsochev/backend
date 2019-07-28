<!doctype html>
<html lang="en">
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
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css" media="screen" />
        @show

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    </head>
    <body>
        <div class="wrapper">
            @include('admin.side')

            <div class="content-wrapper d-flex flex-column">
                <main class="content">
                    @include('admin.header')

                    <div class="container-fluid">
                        @yield('content', 'No content provided for meta layout')
                    </div>

                </main>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Lachezar Tsochev {{ date('Y') }}</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{asset('js/bootstrap.js')}}"></script>

        @yield('styles')
        @yield('scripts')
    </body>
</html>
