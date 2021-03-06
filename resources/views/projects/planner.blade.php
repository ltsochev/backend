@extends('layouts.meta', ['body_class' => 'project-planner'])

@section('main-styles')
<link rel="stylesheet" href="<?= asset('css/planner.css'); ?>" type="text/css" media="all" />
@endsection

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
        <div class="col-lg-6 offset-lg-3">
            <section class="section-block" id="project-planner-header">
                <article>
                    <header>
                        <h1>@lang('Project planner')</h1>
                        <h2>@lang('Interested in working with me on a project? Give me all the details below, and I\'ll get back to you as soon as possible!')</h2>
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
            @include('layouts.flash-messages')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="<?= route('project-submit'); ?>">
                <section class="section-block">
                    <fieldset class="personal-details input-row">
                        <legend>@lang('Your details')</legend>
                        <div class="input-group justify">
                            <input type="text" class="form-control" name="name" placeholder="@lang('Name')" value="{{ old('name') }}" />
                            <input type="text" class="form-control" name="email" inputmode="email" placeholder="@lang('E-Mail')" value="{{ old('email') }}" />
                            <input type="text" class="form-control" name="phone" inputmode="tel" placeholder="@lang('Phone number (Optional)')" value="{{ old('phone') }}" />
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="project-type input-row">
                        <legend>@lang('Type of project')</legend>
                        <div class="input-group justify">
                            <div class="lt-custom-control lt-custom-radio btn-check has-info">
                                <input type="radio" id="custom-btn-project-type-website" name="project-type" value="website" @if (old('project-type') == 'website') checked @endif />
                                <label for="custom-btn-project-type-website">@lang('Website')</label>
                                <div class="info">
                                    @lang('From a simple site to a complex e-commerce platform')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check has-info">
                                <input type="radio" id="custom-btn-project-type-app" name="project-type" value="app"  @if (old('project-type') == 'app') checked @endif />
                                <label for="custom-btn-project-type-app">@lang('Application')</label>
                                <div class="info">
                                    @lang('Looking to build a larger scale web application?')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check has-info">
                                <input type="radio" id="custom-btn-project-type-else" name="project-type" value="other"  @if (old('project-type') == 'other') checked @endif />
                                <label for="custom-btn-project-type-else">@lang('Something else')</label>
                                <div class="info">
                                    @lang('Who doesn\'t like a challenge? - what have you got for me?')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="brief-description">
                        <legend>@lang('Brief description')</legend>
                        <div class="input-group center">
                            <textarea name="description" class="form-control" placeholder="@lang('Tell me about your project')">{{old('description')}}</textarea>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="project-needs">
                        <legend>@lang('What do you need?')</legend>
                        <div class="input-group justify">
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="strategy" id="need-strategy" @if(is_array(old('needs')) && in_array('strategy', old('needs'))) checked @endif />
                                <label for="need-strategy">@lang('Strategy')</label>
                                <div class="info">
                                    @lang('Taking a simple idea through to a finished project by building a solid business foundation.')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="ui-ux" id="need-ui-ux" @if(is_array(old('needs')) && in_array('ui-ux', old('needs'))) checked @endif />
                                <label for="need-ui-ux">@lang('User interface / UX')</label>
                                <div class="info">
                                    @lang('User experience is a crucial part of all my projects - ensuring a natural flow that everyone can use and enjoy.')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="design" id="need-design" @if(is_array(old('needs')) && in_array('design', old('needs'))) checked @endif />
                                <label for="need-design">@lang('Design')</label>
                                <div class="info">
                                    @lang('Much more than just pixel pushing - this is where I ensure your site looks gorgeous and functions perfectly.')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="development" id="need-dev" @if(is_array(old('needs')) && in_array('development', old('needs'))) checked @endif />
                                <label for="need-dev">@lang('Development')</label>
                                <div class="info">
                                    @lang('Turning designs into code that we can then power with some coding magic.')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="cms" id="need-cms" @if(is_array(old('needs')) && in_array('cms', old('needs'))) checked @endif />
                                <label for="need-cms">@lang('CMS Implementation')</label>
                                <div class="info">
                                    @lang('Use homegrown or popular open-source CMS depending on what is needed.')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>
                            <div class="lt-custom-control lt-custom-checkbox btn-check has-info">
                                <input type="checkbox" name="needs[]" value="other" id="need-other" @if(is_array(old('needs')) && in_array('other', old('needs'))) checked @endif />
                                <label for="need-other">@lang('Not sure')</label>
                                <div class="info">
                                    @lang('That\'s okay - I can help you discover exactly what you need from the business idea straight to the finished project.')
                                    <i class="icon fa fa-check"></i>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="start-date">
                        <legend>@lang('Ideal start date')</legend>
                        <div class="input-group justify">
                            <select name="start-month" class="custom-select">
                                <option value="0">@lang('Select month')</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}" @if(old('start-month') == $i) selected @endif>{{Carbon\Carbon::now()->month($i)->isoFormat('MMMM')}}</option>
                                @endfor
                            </select>
                            <select name="start-year" class="custom-select">
                                <option value="0">@lang('Select year')</option>
                                @for ($i = date('Y'); $i < (date('Y')+3); $i++)
                                <option value="{{$i}}" @if(old('start-year') == $i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                            <div class="lt-custom-control lt-custom-checkbox btn-check">
                                <input type="checkbox" name="start-date" value="no-rush" id="custom-start-date-no-rush" @if(old('start-date') == 'no-rush') checked @endif />
                                <label for="custom-start-date-no-rush">@lang('No huge rush')</label>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="launch-date">
                        <legend>@lang('Ideal launch date')</legend>
                        <div class="input-group justify">
                            <select name="launch-month" class="custom-select">
                                <option value="0">@lang('Select month')</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}" @if(old('launch-month') == $i) selected @endif>{{Carbon\Carbon::now()->month($i)->isoFormat('MMMM')}}</option>
                                @endfor
                            </select>
                            <select name="launch-year" class="custom-select">
                                <option value="0">@lang('Select year')</option>
                                @for ($i = date('Y'); $i < (date('Y')+3); $i++)
                                <option value="{{$i}}" @if(old('launch-year') == $i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                            <div class="lt-custom-control lt-custom-checkbox btn-check">
                                <input type="checkbox" name="launch-date" value="no-rush" id="custom-launch-date-no-rush" @if(old('launch-date') == 'no-rush') checked @endif />
                                <label for="custom-launch-date-no-rush">@lang('When it\'s done!')</label>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="project-type input-row">
                        <legend>@lang('Likely budget')</legend>
                        <div class="input-group justify">
                            <div class="lt-custom-control lt-custom-radio btn-check">
                                <input type="radio" id="custom-btn-budget-basic" name="budget-type" value="basic" @if(old('budget-type') == 'basic') checked @endif/>
                                <label for="custom-btn-budget-basic">$1,000 - $2,000</label>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check">
                                <input type="radio" id="custom-btn-budget-pro" name="budget-type" value="pro" @if(old('budget-type') == 'pro') checked @endif />
                                <label for="custom-btn-budget-pro">$5,000 - $10,000</label>
                            </div>
                            <div class="lt-custom-control lt-custom-radio btn-check">
                                <input type="radio" id="custom-btn-budget-e" name="budget-type" value="enterprise" @if(old('budget-type') == 'enterprise') checked @endif />
                                <label for="custom-btn-budget-e">Over $10,000</label>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <section class="section-block">
                    <fieldset class="finished-block">
                        <legend>@lang('Finished?')</legend>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-project-planner">@lang('Yep, submit this')</button>
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
