@extends('layouts.meta', ['body_class' => 'project-planner'])

@section('main-styles')
<link rel="stylesheet" href="<?= asset('css/planner.css'); ?>" type="text/css" media="all" />
@endsection

@section('content')
<div class="hero-panel">
    <a href="<?= url('/'); ?>" class="logo">Lachezar Tsochev IT Solutions</a>
    <div class="app-navbar">
        <nav class="navbar navbar-expand-lg navbar-light main-menu">
            @include('layouts.language-switcher')
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main-menu" aria-controls="nav-main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="justify-content-end collapse navbar-collapse" id="nav-main-menu">
                    <ul class="nav-menu navbar-nav">
                        <li class="nav-menu-item nav-item"><a href="<?= url('/'); ?>" class="nav-link">Home</a></li>
                        <li class="nav-menu-item nav-item"><a href="<?= url('/'); ?>#about" class="nav-link">About</a></li>
                        <li class="nav-menu-item nav-item active"><a href="<?= route('project-planner'); ?>" class="nav-link active">Planner</a></li>
                        <li class="nav-menu-item nav-item"><a href="<?= url('/'); ?>#projects" class="nav-link">Projects</a></li>
                        <li class="nav-menu-item nav-item"><a href="<?= url('/'); ?>#contacts" class="nav-link">Contacts</a></li>
                    </ul>
                </div>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <section class="section-block" id="project-planner-header">
                <article>
                    <header>
                        <h1>Project planner</h1>
                        <h2>Interested in working with me on a project? Give me all the details below, and I'll get back to you as soon as possible!</h2>
                    </header>
                    <div class="row">
                        <div class="col-lg-6">

                        </div>
                    </div>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="<?= route('project-submit'); ?>">
                <section class="section-block">
                    <fieldset class="personal-details input-row">
                        <legend>Your details</legend>
                        <div class="input-group justify">
                            <input type="text" class="form-control" name="name" placeholder="Name" />
                            <input type="text" class="form-control" name="email" inputmode="email" placeholder="E-Mail" />
                            <input type="text" class="form-control" name="phone" inputmode="tel" placeholder="Phone number (Optional)" />
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="project-type input-row">
                        <legend>Type of project</legend>
                        <div class="input-group justify">
                            <div class="lt-custom-control lt-custom-radio btn-check has-info">
                                <input type="radio" id="custom-btn-project-type-website" name="project-type" value="website" />
                                <label for="custom-btn-project-type-website">Website</label>
                                <div class="info">
                                    From a simple site to a complex e-commerce platform
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check has-info">
                                <input type="radio" id="custom-btn-project-type-app" name="project-type" value="application" />
                                <label for="custom-btn-project-type-app">Application</label>
                                <div class="info">
                                    Looking to build a larger scale web application?
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check has-info">
                                <input type="radio" id="custom-btn-project-type-else" name="project-type" value="other" />
                                <label for="custom-btn-project-type-else">Something else</label>
                                <div class="info">
                                    Who doesn't like a challenge? - what have you got for me?
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="brief-description">
                        <legend>Brief description</legend>
                        <div class="input-group center">
                            <textarea name="description" class="form-control" placeholder="Tell us about your project"></textarea>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="project-needs">
                        <legend>What do you need?</legend>
                        <div class="input-group justify">
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="strategy" id="need-strategy" />
                                <label for="need-strategy">Strategy</label>
                                <div class="info">
                                    Taking a simple idea through to a finished project by building a solid business foundation.
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="ui-ux" id="need-ui-ux" />
                                <label for="need-ui-ux">User interface / UX</label>
                                <div class="info">
                                    User experience is a crucial part of all my projects - ensuring a natural flow that everyone can use and enjoy.
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="design" id="need-design" />
                                <label for="need-design">Design</label>
                                <div class="info">
                                    Much more than just pixel pushing - this is where I ensure your site looks gorgeous and functions perfectly.
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="development" id="need-dev" />
                                <label for="need-dev">Development</label>
                                <div class="info">
                                    Turning designs into code that we can then power with some coding magic.
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="cms" id="need-cms" />
                                <label for="need-cms">CMS Implementation</label>
                                <div class="info">
                                    Use homegrown or popular open-source CMS depending on what is needed.
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="other" id="need-other" />
                                <label for="need-other">Not sure</label>
                                <div class="info">
                                    That's okay - I can help you discover exactly what you need from the business idea straight to the finished project.
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="start-date">
                        <legend>Ideal start date</legend>
                        <div class="input-group justify">
                            <select name="start-month" class="custom-select">
                                <option value="0">Select month</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}">{{Carbon\Carbon::now()->month($i)->isoFormat('MMMM')}}</option>
                                @endfor
                            </select>
                            <select name="start-year" class="custom-select">
                                <option value="0">Select year</option>
                                @for ($i = date('Y'); $i < (date('Y')+3); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <div class="lt-custom-control lt-custom-checkbox btn-check">
                                <input type="checkbox" name="start-date" value="no-rush" id="custom-start-date-no-rush" />
                                <label for="custom-start-date-no-rush">No huge rush</label>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="launch-date">
                        <legend>Ideal launch date</legend>
                        <div class="input-group justify">
                            <select name="launch-month" class="custom-select">
                                <option value="0">Select month</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}">{{Carbon\Carbon::now()->month($i)->isoFormat('MMMM')}}</option>
                                @endfor
                            </select>
                            <select name="launch-year" class="custom-select">
                                <option value="0">Select year</option>
                                @for ($i = date('Y'); $i < (date('Y')+3); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <div class="lt-custom-control lt-custom-checkbox btn-check">
                                <input type="checkbox" name="launch-date" value="no-rush" id="custom-launch-date-no-rush" />
                                <label for="custom-launch-date-no-rush">When it's done!</label>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="project-type input-row">
                        <legend>Likely budget</legend>
                        <div class="input-group justify">
                            <div class="lt-custom-control lt-custom-radio btn-check">
                                <input type="radio" id="custom-btn-budget-basic" name="budget-type" value="basic" />
                                <label for="custom-btn-budget-basic">$1,000 - $2,000</label>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check">
                                <input type="radio" id="custom-btn-budget-pro" name="budget-type" value="pro" />
                                <label for="custom-btn-budget-pro">$5,000 - $10,000</label>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check">
                                <input type="radio" id="custom-btn-budget-e" name="budget-type" value="enterprise" />
                                <label for="custom-btn-budget-e">Over $10,000</label>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="finished-block">
                        <legend>Finished?</legend>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-project-planner">Yep, submit this</button>
                            <?= csrf_field(); ?>
                        </div>
                    </fieldset>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/app-minimal.js') }}"></script>
@endsection
