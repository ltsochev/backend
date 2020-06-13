<!doctype html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('css/srk-preloader.css') }}" type="text/css" media="all" />
    <title>SRK Aerial Cinematography</title>
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
</head>
<body class="preloading">
    <div id="stage">
      <div class="main-menu">
          <div class="logo-container">
              <div class="logo">
                  <a href="{{ request()->fullUrl() }}" class="logo-icon">
                      @include('demos.srk-logo', ['viewBox' => '580 310 900 493'])
                  </a>
              </div>
              <a href="{{ request()->fullUrl() }}" class="logo-label">
                  <h1>Stoyan.Kapitanoff <em>SRK Aerial Cinematography</em></h1>
              </a>
          </div>
          <nav class="navbar navbar-expand-lg" id="main-menu">
              <ul class="nav-menu navbar-nav">
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Реклама</a></li>
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Сватби</a></li>
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Лято {{ date('Y') }}</a></li>
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Оборудване</a></li>
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Биография</a></li>
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Контакти</a></li>
              </ul>
          </nav>
      </div>

      <section class="video-section summer-section">
          <picture class="_3bnai">
            <img alt="summer-beach" class="_3fXt7" src="{{ asset('assets/img/demos/srk/beach.gif') }}">
          </picture>
          <div class="content-box">
            <h3>Latest work</h3>
            <div class="play-button">
                <a href="#" class="video-play">
                    <i class="far fa-play-circle"></i>
                    <em>Play video</em>
                </a>
            </div>
          </div>
      </section>

    <section class="content-section bg-white gear-section">
        <div class="container-fluid">
            <div class="row">
                @foreach (['Mavik Pro', 'Phantom 4 Pro', 'Mavik Mini'] as $drone)
                <div class="col-lg-4">
                    <div class="gear-container">
                        <div class="icon">
                            Ikonka
                        </div>
                        <h3 class="title">{{ $drone }}</h3>
                        <p class="subtitle">Aliquam erat volutpat. Fusce eget ornare sapien. Integer lorem turpis, hendrerit quis vulputate in, fermentum faucibus lectus. Suspendisse dictum odio ac eleifend euismod. </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

      <section class="video-section portfolio-section">
          <picture class="_3bnai">
              <img alt="Weddings" class="_3fXt7" src="{{ asset('assets/img/demos/srk/cars.gif') }}">
          </picture>
          <div class="content-box">
            <h3>Weddings</h3>
            <div class="play-button">
                <a href="#" class="video-play">
                    <i class="far fa-play-circle"></i>
                    <em>Play video</em>
                </a>
            </div>
          </div>
      </section>

      <section class="video-section weddings-section">
          <picture class="_3bnai">
              <img alt="Summer" class="_3fXt7" src="{{ asset('assets/img/demos/srk/booty.gif') }}">
          </picture>
          <div class="content-box">
            <h3>Summer {{ date('Y') }}</h3>
            <div class="play-button">
                <a href="#" class="video-play">
                    <i class="far fa-play-circle"></i>
                    <em>Play video</em>
                </a>
            </div>
          </div>
      </section>

      <footer class="srk-footer">
          <section class="d-flex flex-column h-100 justify-content-center">
              <p class="text-center">&copy; {{ date('Y') }} SRK Aerial Cinematography. All Rights Reserved.</p>
              <p class="text-center">Website by <a href="https://ltsochev.com" class="expand" target="_blank" rel="external">Ltsochev.com</a></p>
          </section>
      </footer>
    </div>

    <div class="preloader">
        @include('demos.srk-logo', ['id' => 'preloader-svg'])
        <div class="label">
            <div class="reveal-text">SRK Aerial Cinematography</div>
        </div>
    </div>

    <script src="{{ asset('js/srk-preloader.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/srk.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="{{ asset('js/srk.js') }}"></script>
</body>
</html>
