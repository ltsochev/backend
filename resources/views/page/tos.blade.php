@extends('layouts.meta', ['body_class' => 'content-page tos-page'])

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
                        <h1>Terms of service</h1>
                    </header>
                    <p>This page (together with the documents referred to on it) tells you the terms of use on which you may make use of our website <u>{{ url('/') }}</u> (our site), whether as a guest or a registered user. Please read these terms of use carefully before you start to use the site. By using our site, you indicate that you accept these terms of use and that you agree to abide by them. If you do not agree to these terms of use, please refrain from using our site.</p>
                    <h3>INFORMATION ABOUT YOU AND YOUR VISITS TO OUR SITE</h3>
                    <p>We process information about you in accordance with our <a href="#privacy">privacy policy</a>. By using our site you consent to such processing and you warrant that all data provided by you is accurate. GDPR compliance means that any data we have on you continues to be stored securely and that, at your request, it can be deleted. To find out what personal, or device specific, data we hold, or to request that held data is deleted, you can contact us at <a href="mailto:gdpr@ltsochev.com">gdpr@ltsochev.com</a>. Know that your data is in safe hands with us, but should any breach occur, you’ll be notified as soon as possible.</p>
                    <h3>IFORMATION ABOUT US</h3>

                </article>
            </section>
        </div>
    </div>
</div>
@endsection
