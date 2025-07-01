  <!-- Sidebar -->
  <div class="sidebar">
      <div class="logo-area">
          <img src="{{ asset('favicon.ico') }}" alt="" srcset="">
          <div class="logo-text">
              <span class="logo-text-blue">Event</span><span class="logo-text-purple">Connect</span>
          </div>
      </div>

   @php
    $role = Auth::user()->id_role;
@endphp

<nav>
    @if($role == 1)
        <div class="menu-header">MENU PRINCIPAL</div>

        <a href="{{ route('admin.dashboard') }}"
           class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-line menu-icon"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fas fa-user-shield menu-icon"></i>
            <span>Usuários</span>
        </a>

        <a href="{{ route('contacts.index') }}"
           class="menu-item {{ request()->routeIs('contact.*') ? 'active' : '' }}">
            <i class="fas fa-envelope menu-icon"></i>
            <span>Mensagens</span>
        </a>
    @endif

    <div class="menu-header">Menu Colaborador</div>

    <a href="{{ route('admin.dashboard.user') }}"
       class="menu-item {{ request()->routeIs('admin.dashboard.user.*') ? 'active' : '' }}">
        <i class="fas fa-chart-pie menu-icon"></i>
        <span>Relatório</span>
    </a>

    <a href="{{ route('admin.hall.index') }}"
       class="menu-item {{ request()->routeIs('admin.hall.*') ? 'active' : '' }}">
        <i class="fas fa-warehouse menu-icon"></i>
        <span>Meus Salões</span>
    </a>

    <a href="{{ route('admin.decorations.index') }}"
       class="menu-item {{ request()->routeIs('admin.decorations.*') ? 'active' : '' }}">
        <i class="fas fa-palette menu-icon"></i>
        <span>Minhas Decorações</span>
    </a>

    <a href="{{ route('admin.items.index') }}"
       class="menu-item {{ request()->routeIs('admin.items.*') ? 'active' : '' }}">
        <i class="fas fa-concierge-bell menu-icon"></i>
        <span>Itens de Menu</span>
    </a>

    <a href="{{ route('admin.menus.index') }}"
       class="menu-item {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
        <i class="fas fa-book-open menu-icon"></i>
        <span>Menu</span>
    </a>

    <a href="{{ route('admin.packages.index') }}"
       class="menu-item {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
        <i class="fas fa-box-open menu-icon"></i>
        <span>Pacotes</span>
    </a>

    <a href="{{ route('reservations.index') }}"
       class="menu-item {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}">
        <i class="fas fa-clipboard-list menu-icon"></i>
        <span>Pedidos</span>
    </a>

    <a href="{{ route('admin.reserves.index') }}"
       class="menu-item {{ request()->routeIs('admin.reserves.*') ? 'active' : '' }}">
        <i class="fas fa-calendar-alt menu-icon"></i>
        <span>Reservas</span>
    </a>

    <a href="{{ route('admin.payment.index') }}"
       class="menu-item {{ request()->routeIs('admin.payment.*') ? 'active' : '' }}">
        <i class="fas fa-credit-card menu-icon"></i>
        <span>Pagamentos</span>
    </a>

    @if($role == 1)
        <a href="{{ route('admin.settings.index') }}"
           class="menu-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="fas fa-cogs menu-icon"></i>
            <span>Configurações</span>
        </a>
    @endif
</nav>


  </div>
