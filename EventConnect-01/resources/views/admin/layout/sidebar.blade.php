  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo-area">
      <svg width="32" height="32" viewBox="0 0 100 100">
        <circle cx="35" cy="40" r="15" fill="#0BC4E2" />
        <circle cx="55" cy="40" r="15" fill="#FF56B1" />
        <path d="M45 60 L60 45 L75 60" stroke="#FFD700" stroke-width="8" fill="none" stroke-linecap="round" />
      </svg>
      <div class="logo-text">
        <span class="logo-text-blue">Event</span><span class="logo-text-purple">Connect</span>
      </div>
    </div>
    
    <nav>
      <div class="menu-header">MENU PRINCIPAL</div>
    
      <a href="#" class="menu-item active">
        <i class="fas fa-tachometer-alt menu-icon"></i>
        <span>Dashboard</span>
      </a>
    
      <a href="{{ route('admin.users.index') }}" class="menu-item">
        <i class="fas fa-users menu-icon"></i>
        <span>Usuários</span>
      </a>
    
      <a href="{{ route('admin.hall.index') }}" class="menu-item">
        <i class="fas fa-building menu-icon"></i>
        <span>Meus Salões</span>
      </a>
    
      <a href="{{ route('admin.decorations.index') }}" class="menu-item">
        <i class="fas fa-paint-brush menu-icon"></i>
        <span>Minhas Decorações</span>
      </a>
    
      <a href="{{ route('admin.items.index') }}" class="menu-item">
        <i class="fas fa-utensils menu-icon"></i>
        <span>Itens de Menu</span>
      </a>
    
      <a href="{{ route('admin.menus.index') }}" class="menu-item">
        <i class="fas fa-book-open menu-icon"></i>
        <span>Menu</span>
      </a>
    
      <a href="#" class="menu-item">
        <i class="fas fa-user-friends menu-icon"></i>
        <span>Participantes</span>
      </a>
    
      <a href="#" class="menu-item">
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
      </a>
    
      <a href="#" class="menu-item">
        <i class="fas fa-cogs menu-icon"></i>
        <span>Configurações</span>
      </a>
    </nav>
    
  </div>
