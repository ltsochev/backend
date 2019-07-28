<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main-menu" aria-controls="nav-main-menu" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
</button>
<div class="justify-content-end collapse navbar-collapse" id="nav-main-menu">
    <ul class="nav-menu navbar-nav">
        <li class="nav-menu-item nav-item"><a href="{{ url('/') }}" class="nav-link">@lang('Home')</a></li>
        <li class="nav-menu-item nav-item"><a href="{{ url('/') }}#about" class="nav-link">@lang('About')</a></li>
        <li class="nav-menu-item nav-item"><a href="{{ route('project-planner') }}" class="nav-link {{ App\Support\set_active(['projects/planner', 'projects/planner/complete']) }}">@lang('Project planner')</a></li>
        <li class="nav-menu-item nav-item active"><a href="{{ url('/') }}#projects" class="nav-link {{ App\Support\set_active('projects/details/*') }}">@lang('Projects')</a></li>
        <li class="nav-menu-item nav-item"><a href="{{ url('/') }}#contacts" class="nav-link">@lang('Contacts')</a></li>
    </ul>
</div>
