  <!-- Sidebar -->
  <div class="sidebar">
      <div class="logo-area">
          <img src="{{ asset('favicon.ico') }}" alt="" srcset="">
          <div class="logo-text">
              <span class="logo-text-blue">Event</span><span class="logo-text-purple">Connect</span>
          </div>
      </div>

      <nav>
          <div class="menu-header">MENU PRINCIPAL</div>
          <a href="{{ route('admin.dashboard') }}"
              class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="fas fa-tachometer-alt menu-icon"></i>
              <span>Dashboard</span>
          </a>

          <a href="{{ route('admin.users.index') }}"
              class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
              <i class="fas fa-users menu-icon"></i>
              <span>Usuários</span>
          </a>

          <a href="{{ route('admin.hall.index') }}"
              class="menu-item {{ request()->routeIs('admin.hall.*') ? 'active' : '' }}">
              <i class="fas fa-building menu-icon"></i>
              <span>Meus Salões</span>
          </a>

          <a href="{{ route('admin.decorations.index') }}"
              class="menu-item {{ request()->routeIs('admin.decorations.*') ? 'active' : '' }}">
              <i class="fas fa-paint-brush menu-icon"></i>
              <span>Minhas Decorações</span>
          </a>

          <a href="{{ route('admin.items.index') }}"
              class="menu-item {{ request()->routeIs('admin.items.*') ? 'active' : '' }}">
              <i class="fas fa-utensils menu-icon"></i>
              <span>Itens de Menu</span>
          </a>

          <a href="{{ route('admin.menus.index') }}"
              class="menu-item {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
              <i class="fas fa-book-open menu-icon"></i>
              <span>Menu</span>
          </a>

          <a href="{{ route('admin.packages.index') }}"
              class="menu-item {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
              <i class="fas fa-box menu-icon"></i>
              <span>Pacotes</span>
          </a>

          <a href="{{ route('user.reservations.index') }}"
              class="menu-item {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}">
              <i class="fas fa-receipt menu-icon"></i>
              <span>Pedidos</span>
          </a>

          <a href="{{ route('admin.reserves.index') }}"
              class="menu-item {{ request()->routeIs('admin.reserves.*') ? 'active' : '' }}">
              <i class="fas fa-calendar-check menu-icon"></i>
              <span>Reservas</span>
          </a>



          {{-- <a href="#" class="menu-item">
        <i class="fas fa-ticket-alt menu-icon"></i>
        <span>Ingressos</span>
      </a>
    
      <a href="#" class="menu-item">
        <i class="fas fa-chart-bar menu-icon"></i>
        <span>Relatórios</span>
      </a>
    
      <div class="menu-header" style="margin-top: 1.5rem;">CONFIGURAÇÕES</div>
    
      <a href="#" class="menu-item">
        <i class="fas fa-user-circle menu-icon"></i>
        <span>Perfil</span>
      </a> --}}

          <a href="{{ route('admin.settings.index') }}" class="menu-item">
              <i class="fas fa-cogs menu-icon"></i>
              <span>Configurações</span>
          </a>
      </nav>

  </div>
