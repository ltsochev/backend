<!doctype html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('/css/srk-preloader.css') }}" type="text/css" media="all" />
    <title>SRK Aerial Cinematography</title>
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <meta name="theme-color" content="#000">
    <meta property="og:title" content="SRK Aerial Cinematography - Stoyan Kapitanov" />
	<meta property="og:description" content="Видео заснемане във въздуха за вашето специално събитие или реклама с професионален дрон." />
	<meta property="og:url" content="{{ request()->fullUrl() }}" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="SRK Aerial Cinematography" />
	<meta property="og:image" content="{{ asset('assets/img/demos/srk/srk-og.jpg') }}" />
	<meta property="og:image:width" content="915" />
	<meta property="og:image:height" content="915" />
</head>
<body class="preloading" data-spy="scroll" data-target="#main-menu">
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
          <nav class="navbar navbar-dark navbar-expand-lg" id="main-menu">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu-toggle" aria-controls="main-menu-toggle" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
              </button>
              <ul class="nav-menu navbar-nav collapse navbar-collapse" id="main-menu-toggle">
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Реклама</a></li>
                  <li class="nav-menu-item nav-item"><a href="#weddings-section" class="nav-link">Сватби</a></li>
                  <li class="nav-menu-item nav-item"><a href="#summer-section" class="nav-link">Лято {{ date('Y') }}</a></li>
                  <li class="nav-menu-item nav-item"><a href="#gear-section" class="nav-link">Оборудване</a></li>
                  <li class="nav-menu-item nav-item"><a href="#about-section" class="nav-link">Биография</a></li>
                  <li class="nav-menu-item nav-item"><a href="#contacts-section" class="nav-link">Контакти</a></li>
              </ul>
          </nav>
      </div>

      <section class="video-section summer-section" id="home-hero">
          <picture class="_3bnai">
            <img alt="summer-beach" class="_3fXt7" src="{{ App\Support\asset_versioned('assets/img/demos/srk/beach.gif') }}">
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

    <section class="content-section bg-white gear-section" id="gear-section">
        <div class="container-fluid">
            <div class="row">
                @foreach (['Mavik Pro', 'Phantom 4 Pro', 'Mavik Mini'] as $drone)
                <div class="col-lg-4">
                    <div class="gear-container">
                        <div class="icon">
                            <img src="{{ App\Support\asset_versioned('assets/img/demos/srk/mavic-mini-transp.png') }}" alt="DJI Mavik Mini drone" />
                        </div>
                        <h3 class="title">{{ $drone }}</h3>
                        <p class="subtitle">Aliquam erat volutpat. Fusce eget ornare sapien. Integer lorem turpis, hendrerit quis vulputate in, fermentum faucibus lectus. Suspendisse dictum odio ac eleifend euismod. </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

      <section class="video-section portfolio-section" id="weddings-section">
          <picture class="_3bnai">
              <img alt="Weddings" class="_3fXt7" src="{{ App\Support\asset_versioned('assets/img/demos/srk/cars.gif') }}">
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

      <section class="content-section about-section" id="about-section">
          <div class="container">
              <div class="row">
                 <div class="col-12 col-lg-8">
                    <article class="about">
                        <header>
                            <h3>Стоян Капитанов</h3>
                            <h4>SRK Aerial Cinematography, запис с дрон и обработка</h4>
                        </header>
                        <p class="my-4 info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna justo, egestas non volutpat id, dictum et lacus. Aliquam dui velit, imperdiet sed tincidunt quis, luctus eu nunc. Pellentesque nibh nulla, rhoncus vitae imperdiet ut, egestas sed nisl. Integer tristique odio ut nisi efficitur tincidunt. Morbi tincidunt leo nec est cursus, quis efficitur nisi blandit. Pellentesque vehicula porta nunc, quis viverra tellus cursus malesuada. Donec laoreet nisl id aliquet pretium. Nunc vulputate, dui in pulvinar tristique, elit leo pulvinar arcu, aliquam pulvinar nunc nulla quis enim. Morbi eu mattis mauris, interdum tristique erat. Integer tempor neque felis, sed consequat ex facilisis id. Curabitur semper lacus ut felis ultricies aliquam. </p>
                        <div class="my-2">
                            <a href="#" class="about-me">Прочети повече <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </article>
                 </div>
              </div>
          </div>
      </section>

      <section class="video-section weddings-section" id="summer-section">
          <picture class="_3bnai">
              <img alt="Summer" class="_3fXt7" src="{{ App\Support\asset_versioned('assets/img/demos/srk/booty.gif') }}">
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

      <section class="content-section contacts-section" id="contacts-section">
          <div class="container">
              <div class="d-flex flex-column flex-md-row justify-content-around">
                  <div class="contacts-zone">
                      <article class="contacts">
                          <header>
                              <h2>Свържете се с мен</h2>
                              <h3>за да създадем креативни проекти заедно!</h3>
                          </header>
                          <section class="my-4 d-flex justify-content-center contacts-data">
                              <div class="em text-center">
                                  <a href="#">info@mysite.com</a>
                              </div>
                              <div class="divider">&nbsp;</div>
                              <div class="tel text-center">
                                  <a href="#">+359 876 123456</a>
                              </div>
                          </section>
                          <section class="social-links">
                              <ul class="d-flex justify-content-around">
                                  @foreach (['twitter', 'facebook', 'vimeo', 'instagram', 'youtube'] as $network)
                                  <li class="{{ $network }}">
                                      <a href="#" target="_blank" rel="external" title="Последвайте ме в {{ ucfirst($network) }}!">
                                          <i class="fab fa-{{ $network }}"></i>
                                      </a>
                                  </li>
                                  @endforeach
                              </ul>
                          </section>
                      </article>
                  </div>
                  <div class="write-zone">
                      <article class="contacts-form">
                          <header>
                              <h2 class="mb-3">Пишете ми</h2>
                          </header>
                          <section>
                              <form method="post" action="">
                              <div class="form-group row">
                                  <label class="col-12" for="contacts-name">Име</label>
                                  <div class="col-12">
                                      <input type="text" id="contacts-name" name="name" placeholder="Име и фамилия" class="form-control form-control-lg" />
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-12" for="contacts-email">Имейл</label>
                                  <div class="col-12">
                                      <input type="text" id="contacts-email" inputmode="email" name="email" placeholder="email@domain.com" class="form-control form-control-lg" />
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-12" for="contacts-phone">Телефон за връзка</label>
                                  <div class="col-12">
                                      <input type="text" id="contacts-phone" inputmode="tel" name="phone" placeholder="+359 032 123456" class="form-control form-control-lg" />
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-12" for="contacts-message">Съобщение</label>
                                  <div class="col-12">
                                      <textarea name="message" id="contacts-message" class="form-control form-control-lg" placeholder="Въведете вашето съобщение..." rows="4"></textarea>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-12">
                                      <button type="button" class="btn btn-primary btn-block">Изпрати съобщение</button>
                                  </div>
                              </div>
                              </form>
                          </section>
                      </article>
                  </div>
              </div>
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

    <div class="preloader">
        @include('demos.srk-logo', ['id' => 'preloader-svg'])
        <div class="label">
            <div class="reveal-text">SRK Aerial Cinematography</div>
        </div>
    </div>

    <script src="{{ App\Support\asset_versioned('/js/srk-preloader.js') }}"></script>
    <link rel="stylesheet" href="{{ App\Support\asset_versioned('/css/srk.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="{{ App\Support\asset_versioned('/js/srk.js') }}"></script>
</body>
</html>
