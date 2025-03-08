<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i> <!-- Ícone de engrenagem -->
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i> <!-- Ícone de dashboard -->
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Empresas
    </div>

    <!-- Nav Item - Tipos de Eventos -->
    <li class="nav-item {{ Request::is('event*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTypes"
            aria-expanded="{{ Request::is('event*') ? 'true' : 'false' }}" aria-controls="collapseTypes">
            <i class="fas fa-fw fa-calendar-alt"></i> <!-- Ícone de calendário para eventos -->
            <span>Tipos de eventos</span>
        </a>
        <div id="collapseTypes" class="collapse {{ Request::is('event*') ? 'show' : '' }}" aria-labelledby="headingTypes" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tipos de eventos</h6>
                <a class="collapse-item {{ Request::is('event/list') ? 'active' : '' }}" href="{{ route('event.list') }}">Listar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Salões de Eventos -->
    <li class="nav-item {{ Request::is('eventHall*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEventHall"
            aria-expanded="{{ Request::is('eventHall*') ? 'true' : 'false' }}" aria-controls="collapseEventHall">
            <i class="fas fa-fw fa-building"></i> <!-- Ícone de prédio (salão) -->
            <span>Saloes de eventos</span>
        </a>
        <div id="collapseEventHall" class="collapse {{ Request::is('eventHall*') ? 'show' : '' }}" aria-labelledby="headingEventHall" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Saloes de eventos</h6>
                <a class="collapse-item {{ Request::is('eventHall/create') ? 'active' : '' }}" href="{{ route('eventHall.create') }}">Adicionar</a>
                <a class="collapse-item {{ Request::is('eventHall/list') ? 'active' : '' }}" href="{{ route('eventHall.list') }}">Listar</a>

                <h6 class="collapse-header">Decorações</h6>
                <a class="collapse-item {{ Request::is('decoration/create') ? 'active' : '' }}" href="{{ route('decoration.create') }}">Adicionar</a>
                <a class="collapse-item {{ Request::is('decoration/index') ? 'active' : '' }}" href="{{ route('decoration.index') }}">Listar</a>

                <h6 class="collapse-header">Pratos</h6>
                <a class="collapse-item {{ Request::is('item/index') ? 'active' : '' }}" href="{{ route('item.index') }}">Listar</a>

                <h6 class="collapse-header">Menu</h6>
                <a class="collapse-item {{ Request::is('menu/create') ? 'active' : '' }}" href="{{ route('menu.create') }}">Adicionar</a>
                <a class="collapse-item {{ Request::is('eventHall/list') ? 'active' : '' }}" href="{{ route('eventHall.list') }}">Listar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Verificar se o usuário tem role=1 (Admin) -->
    @if(auth()->user()->role->id == 1)

    <!-- Heading -->
    <div class="sidebar-heading">
        Administracao
    </div>

    <!-- Nav Item - Gestão de Usuários -->
    <li class="nav-item {{ Request::is('register') || Request::is('users/list') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="{{ Request::is('register') || Request::is('users/list') ? 'true' : 'false' }}" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users-cog"></i> <!-- Ícone de gerenciamento de usuários -->
            <span>Gestão de usuários</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Request::is('register') || Request::is('users/list') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Usuários</h6>
                <a class="collapse-item {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Adicionar</a>
                <a class="collapse-item {{ Request::is('users/list') ? 'active' : '' }}" href="{{ route('users.list') }}">Listar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Configurações -->
    <li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
            aria-expanded="{{ Request::is('settings*') ? 'true' : 'false' }}" aria-controls="collapseSettings">
            <i class="fas fa-fw fa-cogs"></i> <!-- Ícone de configuração -->
            <span>Configurações</span>
        </a>
        <div id="collapseSettings" class="collapse {{ Request::is('settings*') ? 'show' : '' }}" aria-labelledby="headingSettings" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Configurações</h6>
                <a class="collapse-item {{ Request::is('settings/index') ? 'active' : '' }}" href="{{ route('settings.index') }}">Registar</a>
            </div>
        </div>
    </li>

    @endif  <!-- Fim da verificação de admin -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>
