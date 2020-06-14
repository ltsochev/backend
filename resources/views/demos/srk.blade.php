<!doctype html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('css/srk-preloader.css') }}" type="text/css" media="all" />
    <title>SRK Aerial Cinematography</title>
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
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
          <nav class="navbar navbar-expand-lg" id="main-menu">
              <ul class="nav-menu navbar-nav">
                  <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link">Реклама</a></li>
                  <li class="nav-menu-item nav-item"><a href="#weddings-section" class="nav-link">Сватби</a></li>
                  <li class="nav-menu-item nav-item"><a href="#summer-section" class="nav-link">Лято {{ date('Y') }}</a></li>
                  <li class="nav-menu-item nav-item"><a href="#gear-section" class="nav-link">Оборудване</a></li>
                  <li class="nav-menu-item nav-item"><a href="#weird" class="nav-link">Биография</a></li>
                  <li class="nav-menu-item nav-item"><a href="#contacts-section" class="nav-link">Контакти</a></li>
              </ul>
          </nav>
      </div>

      <section class="video-section summer-section" id="home-hero">
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

    <section class="content-section bg-white gear-section" id="gear-section">
        <div class="container-fluid">
            <div class="row">
                @foreach (['Mavik Pro', 'Phantom 4 Pro', 'Mavik Mini'] as $drone)
                <div class="col-lg-4">
                    <div class="gear-container">
                        <div class="icon">
                            <img src="{{ asset('assets/img/demos/srk/mavic-mini-transp.png') }}" alt="DJI Mavik Mini drone" />
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

      <section class="video-section weddings-section" id="summer-section">
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

      <section class="content-section contacts-section" id="contacts-section">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <article class="contacts">
                          <header>
                              <h2>Свържете се с мен</h2>
                              <h3>за да създадем креативни проекти заедно!</h3>
                          </header>
                          <section class="my-4 d-flex justify-content-around contacts-data">
                              <div class="em text-center">
                                  <a href="#">info@mysite.com</a>
                              </div>
                              <div class="divider">&nbsp;</div>
                              <div class="tel text-center">
                                  <a href="#">+359 876 123456</a>
                              </div>
                          </section>
                          <section class="social-links">
                              <ul class="d-flex justify-content-between">
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
                  <div class="col-lg-6">
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
