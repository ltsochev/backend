<!doctype html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('/css/srk-preloader.css') }}" type="text/css" media="all" />
    <title>За Мен - SRK Aerial Cinematography</title>
    <meta name="description" content="Професионално въздушно фото и видео 4К заснемане с ДРОН!">
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <meta name="theme-color" content="#000">
    <meta name="author" content="{{ htmlentities('Lachezar Tsochev <https://ltsochev.com>') }}">
    <meta property="og:title" content="SRK Aerial Cinematography - Stoyan Kapitanov" />
    <meta property="og:description" content="Видео заснемане във въздуха за вашето специално събитие или реклама с професионален дрон." />
    <meta property="og:url" content="{{ request()->fullUrl() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="SRK Aerial Cinematography" />
    <meta property="og:image" content="{{ asset('assets/img/demos/srk/srk-og.jpg') }}" />
    <meta property="og:image:width" content="915" />
    <meta property="og:image:height" content="915" />
</head>
<body data-spy="scroll" data-target="#main-menu">
    <div id="stage">
        <div class="main-menu">
            <div class="logo-container">
                <div class="logo">
                    <a href="{{ route('demo.srk') }}" class="logo-icon">
                        @include('demos.srk-logo', ['viewBox' => '580 310 900 493'])
                    </a>
                </div>
                <a href="{{ route('demo.srk') }}" class="logo-label">
                    <h1>Stoyan.Kapitanoff <em>SRK Aerial Cinematography</em></h1>
                </a>
            </div>
            <nav class="navbar navbar-dark navbar-expand-lg" id="main-menu">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-menu-toggle" aria-controls="main-menu-toggle" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="bars"></div>
                </button>
                <ul class="nav-menu navbar-nav collapse navbar-collapse" id="main-menu-toggle">
                    <li class="nav-menu-item nav-item"><a href="{{ route('demo.srk') }}#home-hero" class="nav-link">Реклама</a></li>
                    <li class="nav-menu-item nav-item"><a href="{{ route('demo.srk') }}#weddings-section" class="nav-link">Сватби</a></li>
                    <li class="nav-menu-item nav-item"><a href="{{ route('demo.srk') }}#summer-section" class="nav-link">Лято {{ date('Y') }}</a></li>
                    <li class="nav-menu-item nav-item"><a href="{{ route('demo.srk') }}#gear-section" class="nav-link">Оборудване</a></li>
                    <li class="nav-menu-item nav-item active"><a href="#about-section" class="nav-link active">Биография</a></li>
                    <li class="nav-menu-item nav-item"><a href="{{ route('demo.srk') }}#contacts-section" class="nav-link">Контакти</a></li>
                </ul>
            </nav>
        </div>

        <section class="slider-container">
            <div class="container-fluid">
                <div class="slider-image-container">
                    <div class="row">
                        <div class="slider">
                            <h1>SRK Aerial Cinematography</h1>
                            <h2>(Въздушна Кинематография)</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-section pt-5">
            <div class="container">
                <article class="content-area">
                    <header>
                        <h3 class="text-center">Професионално въздушно фото и видео 4К заснемане с ДРОН!</h3>
                    </header>
                    <section class="content-body mt-3">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt eget nisi sit amet aliquet. Suspendisse pellentesque malesuada mauris, non iaculis metus sagittis ut. Maecenas scelerisque, mi ac viverra malesuada, dui turpis venenatis risus, vel tristique lectus justo sed mauris. Etiam et porttitor est. Sed ullamcorper orci ac tempus blandit. Etiam commodo sem eget auctor tristique. Vivamus ullamcorper dui sed scelerisque tincidunt. Donec lobortis nulla vel lorem bibendum fermentum. Proin a cursus erat. Donec bibendum, nunc sed facilisis fermentum, eros ipsum vulputate justo, at gravida felis urna et metus. </p>
                        <p>Vestibulum maximus, ante vel fringilla consequat, nibh massa euismod leo, vel faucibus lacus dui et nibh. Aliquam eget aliquam nisl. Aenean nec ipsum nec ex venenatis imperdiet a ut felis. Nullam egestas eros at orci dapibus, eu consectetur risus tincidunt. Sed a rutrum neque. Morbi vel lorem massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed dictum lacinia lectus vel elementum. Integer in mattis urna. Sed at posuere odio, sit amet semper nunc. Vestibulum congue nec metus in scelerisque. Aenean eleifend massa arcu. In hac habitasse platea dictumst. Nullam sit amet elit ut nisl porttitor finibus. </p>
                        <p>Nunc eu euismod mauris, ut elementum turpis. Phasellus sed orci mi. Ut a quam elementum, rhoncus ex eu, dapibus leo. Integer quis scelerisque felis, nec bibendum quam. Aliquam erat volutpat. Duis accumsan laoreet mauris, non maximus orci posuere in. Proin mattis orci congue quam posuere, vitae imperdiet tellus porta. Nunc eleifend justo sed dolor suscipit, sed convallis justo malesuada. Nunc quis pellentesque massa. Vestibulum leo turpis, pharetra at luctus eu, molestie sit amet lectus. </p>
                    </section>
                </article>
            </div>
        </section>

        <footer class="srk-footer">
            <section class="d-flex flex-column h-100 justify-content-center">
                <p class="text-center">&copy; {{ date('Y') }} SRK Aerial Cinematography. All Rights Reserved.</p>
                <p class="text-center">Website by <a href="https://ltsochev.com" class="expand" target="_blank" rel="external">Ltsochev.com</a></p>
            </section>
        </footer>

        <div id="scroll-top" class="srk-scroller">
            <a href="#" class="circle rounded-circle p-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-chevron-up icon"></i>
            </a>
        </div>
    </div>

    <link rel="stylesheet" href="{{ App\Support\asset_versioned('/css/srk.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>
</html>
