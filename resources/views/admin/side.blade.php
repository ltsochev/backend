<nav class="navbar-nav bg-dark text-white sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset('assets/img/logo.png') }}" alt="LTsochev Control Panel" />
        </div>
    </a>

    <hr class="sidebar-divider my-0" />

    <ul class="nav-list">
        <li class="nav-item {{ App\Support\set_active('admin') }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
    </ul>

    <hr class="sidebar-divider" />

    <div class="sidebar-heading">
        General
    </div>

    <ul class="nav-list">
        <li class="nav-item {{ App\Support\set_active('admin/projects/requests') }}">
            <a class="nav-link" href="{{ route('admin.projects.requests') }}">
                <i class="fas fa-fw fa-project-diagram"></i>
                <span>Project requests</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.settings.dashboard') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Site settings</span>
            </a>
        </li>
    </ul>

    <hr class="sidebar-divider" />

    <div class="sidebar-heading">
        Translations
    </div>

    <ul class="nav-list">
        <li class="nav-item {{ App\Support\set_active('admin/translations/*') }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-translations" aria-expanded="true" aria-controls="collapse-translations">
                <i class="fas fa-fw fa-globe-europe"></i>
                <span>Locales</span>
            </a>
            <div id="collapse-translations" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pick a locale</h6>
                    <a class="collapse-item" href="{{ route('admin.translations.index') }}">View all</a>
                    <a class="collapse-item" href="{{ route('admin.translations.export') }}">Export all</a>
                    <a class="collapse-item" href="#">English</a>
                    <a class="collapse-item" href="#">Bulgarian</a>
                </div>
            </div>
        </li>
    </ul>

    <hr class="sidebar-divider" />

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 sidebar-toggle" id="sidebarToggle"></button>
      </div>
</nav>
