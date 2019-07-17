@extends('layouts.meta')

@section('content')
    <div class="hero-panel" style="background-image: url('assets/img/startup-1.jpg');" id="home-hero">
        <a href="<?= url('/'); ?>" class="logo">Lachezar Tsochev IT Solutions</a>
        <div class="app-navbar">
            <nav class="navbar navbar-expand-lg navbar-light main-menu" id="main-menu-scrollspy">
                @include('layouts.language-switcher')
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main-menu" aria-controls="nav-main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="justify-content-end collapse navbar-collapse" id="nav-main-menu">
                    <ul class="nav-menu navbar-nav">
                        <li class="nav-menu-item nav-item"><a href="#home-hero" class="nav-link active">Home</a></li>
                        <li class="nav-menu-item nav-item"><a href="#about" class="nav-link">About</a></li>
                        <li class="nav-menu-item nav-item"><a href="#services" class="nav-link">Services</a></li>
                        <li class="nav-menu-item nav-item"><a href="#projects" class="nav-link">Projects</a></li>
                        <li class="nav-menu-item nav-item"><a href="#contacts" class="nav-link">Contacts</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="learn-more">
            <a href="#about" class="learn-more-btn scroll-to-btn">
                <i class="fa fa-chevron-down icon"></i>
                <span>Learn more about me</span>
            </a>
        </div>
    </div>

    <div class="container">
        <section class="section-block" id="about">
            <article>
                <header>
                    <h1>Websites done right</h1>
                </header>
                <div class="row">
                    <div class="col-lg-3">
                        <p>Hi! I am Lachezar Tsochev and I am a full stack web developer from Plovdiv, Bulgaria. I have a long career in the private sector working as a full-stack developer.</p>
                    </div>
                    <div class="col-lg-3">
                        <p>I enjoy building everything from small personal and business websites/portfolios to rich and interactive web apps with Search Engine Optimization.</p>
                    </div>
                    <div class="col-lg-3">
                        <p>I provide solutions for the cloud or VPS/shared/dedicated solution with several SaaS and massive multiplayer projects under my belt.</p>
                    </div>
                    <div class="col-lg-3">
                        <p>If you are a business seeking a web presence or an employer seeking to hire an additional programmer, look no further and get in touch with me from the contacts form.</p>
                    </div>
                </div>
            </article>
        </section>

        <section class="section-block" id="projects">
            <article>
                <header>
                    <h1>Projects</h1>
                </header>
            </article>
            <div class="project-list">
                <ul class="hex-grid">
                    <li class="hex">
                        <div class="inner">
                            <a href="<?= route('project', ['project' => 'rio']); ?>" class="hexLink">
                                <div class="img" style="background-image: url(assets/img/projects/riobg-logo.jpg);"></div>
                                <h1>Rio.bg</h1>
                                <p>Online shopping platform</p>
                            </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="inner">
                            <a href="<?= route('project', ['project' => 'teambulgariaow']); ?>" class="hexLink">
                                <div class="img" style="background-image: url(assets/img/projects/team-bg-fb.jpg);"></div>
                                <h1>Team Bulgaria</h1>
                                <p>OWWC 2019 Team</p>
                            </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="inner">
                            <a href="<?= route('project', ['project' => 'kk-portfolio']); ?>" class="hexLink">
                                <div class="img" style="background-image: url(assets/img/projects/kk-logo.PNG);"></div>
                                <h1>KK.com</h1>
                                <p>Personal portfolio website</p>
                            </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="inner">
                            <a href="<?= route('project', ['project' => 'undercover']); ?>" class="hexLink">
                                <div class="img" style="background-image: url(assets/img/projects/undercover-logo.jpg);"></div>
                                <h1>Undercover</h1>
                                <p>Browser based MMO</p>
                            </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="inner">
                            <a href="<?= route('project', ['project' => 'streetmobster']); ?>" class="hexLink">
                                <div class="img" style="background-image: url(assets/img/projects/bgmafia-logo.jpg);"></div>
                                <h1>BGMafia</h1>
                                <p>Browser based MMO</p>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <div class="container-fluid">
        <section class="section-block services-block" id="services">
            <article>
                <header>
                    <h1>Services &amp; Solutions</h1>
                </header>
                <div class="filled-section filled-section-blue">
                    <div class="container">
                        <div class="row">
                            <ul class="services-list">
                                <li class="services-list-item">
                                    Competitive rates & Project quotes
                                </li>
                                <li class="services-list-item">
                                    Transparent, Collaborative, Communicative
                                </li>
                                <li class="services-list-item">
                                    Security first approach
                                </li>
                                <li class="services-list-item">
                                    SEO optimizations
                                </li>
                                <li class="services-list-item">
                                    Responsive web design
                                </li>
                                <li class="services-list-item">
                                    Cloud services with years of experience
                                </li>
                                <li class="services-list-item">
                                    Microservices from top to bottom
                                </li>
                                <li class="services-list-item">
                                    RESTful API development and integration
                                </li>
                                <li class="services-list-item">
                                    Consulting
                                </li>
                                <li class="services-list-item">
                                    Server setup and deployment
                                </li>
                                <li class="services-list-item">
                                    Maintenance after product delivery
                                </li>
                                <li class="services-list-item">
                                    Modern technologies (HTML5, CSS, etc...)
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </div>

    <div class="container">
        <section class="section-block" id="contacts">
            <article>
                <header>
                    <h1>Contact me</h1>
                    <h2>Tell me about your project</h2>
                </header>
                <div class="row">
                    <ul class="contacts-list">
                        <li class="contacts-list-item">
                            <a href="mailto: info@ltsochev.com?subject=Business inquiry">
                                <div class="icon"><i class="fa fa-envelope"></i></div>
                                <div class="title">Email</div>
                                <div class="value">
                                    <span>lachezar@ltsochev.com</span>
                                </div>
                            </a>
                        </li>
                        <li class="contacts-list-item">
                            <a href="tel: +359897498226">
                                <div class="icon"><i class="fa fa-phone-square"></i></div>
                                <div class="title">Phone</div>
                                <div class="value">
                                    <span>+359 897 498 226</span>
                                </div>
                            </a>
                        </li>
                        <li class="contacts-list-item">
                            <a href="<?= route('project-planner'); ?>">
                            <div class="icon"><i class="fa fa-edit"></i></div>
                            <div class="title">Project planner</div>
                            <div class="value">
                                <span>Launch it</span>
                            </div>
                            </a>
                        </li>
                        <li class="contacts-list-item">
                            <a href="https://twitter.com/sk1pper" target="_blank" rel="external">
                            <div class="icon"><i class="fab fa-twitter"></i></div>
                            <div class="title">Twitter</div>
                            <div class="value">
                                <span>@Sk1ppeR</span>
                            </div>
                            </a>
                        </li>
                        <li class="contacts-list-item">
                            <a href="skype:naminator_x_?chat">
                            <div class="icon"><i class="fab fa-skype"></i></div>
                            <div class="title">Skype</div>
                            <div class="value">
                                <span>naminator_x_</span>
                            </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </article>
        </section>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/app-minimal.js') }}"></script>
@endsection