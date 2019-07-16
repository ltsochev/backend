<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Lachezar Tsochev - Full-stack developer for hire | Modern web solutions</title>
        <meta name="description" content="Full-stack web developer and system engineer." />
        <meta name="csrf-token" content="<?= csrf_token(); ?>" />

        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />

        <!-- <meta property="og:type" content="website" />
        <meta property="og:title" content="Lachezar Tsochev - IT Solutions" />
        <meta property="og:description" content="Full-stack web developer and system engineer." />
        <meta property="og:url" content="https://lachezartsochev.com/" />
        <meta property="og:site_name" content="Lachezar Tsochev" />
        <meta property="og:image" content="https://via.placeholder.com/200" />
        <meta property="og:image:width" content="200" />
        <meta property="og:image:height" content="200" />
        <meta property="og:locale" content="en_US" /> -->
    </head>
    <body data-spy="scroll" data-target="#main-menu-scrollspy" data-offset="60">
        <div id="stage" class="site-window">
            @yield('content', 'No content provided for meta layout')
        </div>

        @yield('styles')
        @yield('scripts')
    </body>
</html>
