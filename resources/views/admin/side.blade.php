<nav class="navbar-nav bg-dark text-white sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset('assets/img/logo.png') }}" alt="LTsochev Control Panel" />
        </div>
    </a>

    <hr class="sidebar-divider my-0" />

    <ul class="nav-list">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
    </ul>

    <hr class="sidebar-divider" />

    <div class="sidebar-heading">
        Interface
    </div>

    <ul class="nav-list">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components</h6>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="cards.html">Cards</a>
                </div>
            </div>
        </li>
    </ul>

    <hr class="sidebar-divider" />

    <div class="sidebar-heading">
        Translations
    </div>

    <ul class="nav-list">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-translations" aria-expanded="true" aria-controls="collapse-translations">
                <i class="fas fa-fw fa-globe-europe"></i>
                <span>Locales</span>
            </a>
            <div id="collapse-translations" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pick a locale</h6>
                    <a class="collapse-item" href="#">View all</a>
                    <a class="collapse-item" href="#">English</a>
                    <a class="collapse-item" href="#">Bulgarian</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" aria-expanded="true">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add new</span>
            </a>
        </li>
    </ul>

    <hr class="sidebar-divider" />

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 sidebar-toggle" id="sidebarToggle"></button>
      </div>
</nav>