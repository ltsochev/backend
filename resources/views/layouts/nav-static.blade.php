<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main-menu" aria-controls="nav-main-menu" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
</button>
<div class="justify-content-end collapse navbar-collapse" id="nav-main-menu">
    <ul class="nav-menu navbar-nav">
        <li class="nav-menu-item nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
        <li class="nav-menu-item nav-item"><a href="{{ url('/') }}#about" class="nav-link">About</a></li>
        <li class="nav-menu-item nav-item"><a href="{{ route('project-planner') }}" class="nav-link {{ App\Support\set_active('projects/planner') }}">Planner</a></li>
        <li class="nav-menu-item nav-item active"><a href="{{ url('/') }}#projects" class="nav-link {{ App\Support\set_active('projects/details/*') }}">Projects</a></li>
        <li class="nav-menu-item nav-item"><a href="{{ url('/') }}#contacts" class="nav-link">Contacts</a></li>
    </ul>
</div>
