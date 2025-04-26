<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EventConnect - Dashboard</title>
  <style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    
    /* Cores principais */
    :root {
      --cyan: #0BC4E2;
      --purple: #8056FF;
      --pink: #FF56B1;
      --yellow: #FFD700;
      --gray-50: #F9FAFB;
      --gray-100: #F3F4F6;
      --gray-200: #E5E7EB;
      --gray-300: #D1D5DB;
      --gray-400: #9CA3AF;
      --gray-500: #6B7280;
      --gray-600: #4B5563;
      --gray-700: #374151;
      --gray-800: #1F2937;
      --white: #FFFFFF;
      --green-100: #D1FAE5;
      --green-600: #059669;
      --green-800: #065F46;
      --blue-100: #DBEAFE;
      --blue-500: #3B82F6;
      --blue-800: #1E40AF;
      --yellow-100: #FEF3C7;
      --yellow-600: #D97706;
      --yellow-800: #92400E;
      --red-100: #FEE2E2;
      --red-500: #EF4444;
    }
    
    /* Layout Geral */
    body {
      background-color: var(--gray-50);
      height: 100vh;
      overflow: hidden;
    }
    
    .flex {
      display: flex;
    }
    
    .flex-col {
      flex-direction: column;
    }
    
    .items-center {
      align-items: center;
    }
    
    .justify-center {
      justify-content: center;
    }
    
    .justify-between {
      justify-content: space-between;
    }
    
    .h-screen {
      height: 100vh;
    }
    
    .w-full {
      width: 100%;
    }
    
    .overflow-hidden {
      overflow: hidden;
    }
    
    .overflow-y-auto {
      overflow-y: auto;
    }
    
    .relative {
      position: relative;
    }
    
    .absolute {
      position: absolute;
    }
    
    .rounded {
      border-radius: 0.25rem;
    }
    
    .rounded-lg {
      border-radius: 0.5rem;
    }
    
    .rounded-full {
      border-radius: 9999px;
    }
    
    .rounded-t {
      border-top-left-radius: 0.25rem;
      border-top-right-radius: 0.25rem;
    }
    
    .shadow {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }
    
    .shadow-lg {
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    .shadow-sm {
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    
    /* Sidebar */
    .sidebar {
      width: 16rem;
      background-color: var(--white);
      box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
      z-index: 10;
    }
    
    .logo-area {
      padding: 1rem;
      display: flex;
      align-items: center;
    }
    
    .logo-text {
      font-size: 1.5rem;
      font-weight: bold;
      margin-left: 0.5rem;
    }
    
    .logo-text-blue {
      color: var(--cyan);
    }
    
    .logo-text-purple {
      color: var(--purple);
    }
    
    nav {
      margin-top: 1.5rem;
    }
    
    .menu-header {
      padding: 0.5rem 1rem;
      color: var(--gray-400);
      font-size: 0.75rem;
      font-weight: 600;
    }
    
    .menu-item {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      color: var(--gray-600);
      text-decoration: none;
      transition: background-color 0.2s;
    }
    
    .menu-item:hover {
      background-color: var(--gray-50);
    }
    
    .menu-item.active {
      color: var(--cyan);
      background-color: rgba(11, 196, 226, 0.1);
    }
    
    .menu-icon {
      margin-right: 0.75rem;
      width: 1rem;
      text-align: center;
    }
    
    /* Main Content */
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }
    
    header {
      background-color: var(--white);
      border-bottom: 1px solid var(--gray-200);
      padding: 1rem;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }
    
    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .page-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--gray-800);
    }
    
    .welcome-text {
      font-size: 0.875rem;
      color: var(--gray-600);
    }
    
    .user-area {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    
    .notification-btn {
      background-color: var(--gray-100);
      color: var(--gray-600);
      border: none;
      border-radius: 9999px;
      padding: 0.5rem;
      cursor: pointer;
      transition: background-color 0.2s;
    }
    
    .notification-btn:hover {
      background-color: var(--gray-200);
    }
    
    .user-profile {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
    }
    
    .user-avatar {
      width: 2rem;
      height: 2rem;
      background-color: var(--purple);
      color: var(--white);
      border-radius: 9999px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 500;
    }
    
    /* Dashboard Content */
    main {
      flex: 1;
      overflow-y: auto;
      padding: 1.5rem;
      background-color: var(--gray-50);
    }
    
    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.5rem;
      margin-bottom: 1.5rem;
    }
    
    @media (max-width: 1200px) {
      .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    
    @media (max-width: 768px) {
      .dashboard-grid {
        grid-template-columns: 1fr;
      }
    }
    
    .stat-card {
      background-color: var(--white);
      border-radius: 0.5rem;
      padding: 1rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .stat-card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .stat-label {
      font-size: 0.875rem;
      color: var(--gray-500);
    }
    
    .stat-value {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--gray-800);
      margin-top: 0.25rem;
    }
    
    .stat-icon {
      padding: 0.75rem;
      border-radius: 9999px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .stat-trend {
      margin-top: 0.5rem;
      font-size: 0.75rem;
      color: var(--green-600);
      display: flex;
      align-items: center;
      gap: 0.25rem;
    }
    
    /* Icon backgrounds */
    .icon-cyan {
      background-color: rgba(11, 196, 226, 0.1);
      color: var(--cyan);
    }
    
    .icon-purple {
      background-color: rgba(128, 86, 255, 0.1);
      color: var(--purple);
    }
    
    .icon-yellow {
      background-color: rgba(255, 215, 0, 0.1);
      color: var(--yellow);
    }
    
    .icon-green {
      background-color: rgba(5, 150, 105, 0.1);
      color: var(--green-600);
    }
    
    /* Lower grid */
    .lower-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 1.5rem;
    }
    
    @media (max-width: 1024px) {
      .lower-grid {
        grid-template-columns: 1fr;
      }
    }
    
    .card {
      background-color: var(--white);
      border-radius: 0.5rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
      padding: 1rem;
      border-bottom: 1px solid var(--gray-100);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .card-title {
      font-weight: 600;
      color: var(--gray-800);
    }
    
    .card-action {
      font-size: 0.875rem;
      color: var(--cyan);
      cursor: pointer;
      transition: color 0.2s;
      border: none;
      background: none;
    }
    
    .card-action:hover {
      color: var(--blue-500);
    }
    
    .card-body {
      padding: 1rem;
    }
    
    /* Event table */
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th {
      text-align: left;
      font-size: 0.75rem;
      color: var(--gray-500);
      padding-bottom: 0.75rem;
      font-weight: normal;
      border-bottom: 1px solid var(--gray-200);
    }
    
    td {
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--gray-50);
    }
    
    tr:last-child td {
      border-bottom: none;
    }
    
    .event-item {
      display: flex;
      align-items: center;
    }
    
    .event-icon {
      width: 2rem;
      height: 2rem;
      border-radius: 0.25rem;
      margin-right: 0.75rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
    }
    
    .status-badge {
      display: inline-block;
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
    }
    
    .status-active {
      background-color: var(--green-100);
      color: var(--green-800);
    }
    
    .status-pending {
      background-color: var(--yellow-100);
      color: var(--yellow-800);
    }
    
    .status-draft {
      background-color: var(--blue-100);
      color: var(--blue-800);
    }
    
    /* Chart */
    .chart-container {
      width: 100%;
      padding-top: 1rem;
      position: relative;
    }
    
    .chart-gradient {
      height: 10rem;
      width: 100%;
      background: linear-gradient(to bottom, rgba(11, 196, 226, 0.1), transparent);
      border-radius: 0.5rem;
    }
    
    .chart-bars {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 8rem;
      display: flex;
      align-items: flex-end;
      padding: 0 0.5rem;
    }
    
    .bar {
      width: calc(100% / 7 - 0.5rem);
      margin: 0 0.25rem;
      border-top-left-radius: 0.25rem;
      border-top-right-radius: 0.25rem;
    }
    
    .bar-cyan {
      background-color: var(--cyan);
    }
    
    .bar-purple {
      background-color: var(--purple);
    }
    
    .chart-labels {
      width: 100%;
      display: flex;
      justify-content: space-between;
      font-size: 0.75rem;
      color: var(--gray-500);
      margin-top: 0.5rem;
      padding: 0 0.5rem;
    }
    
    .chart-legend {
      margin-top: 1.5rem;
      width: 100%;
    }
    
    .legend-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1rem;
    }
    
    .legend-item {
      display: flex;
      align-items: center;
      font-size: 0.875rem;
    }
    
    .legend-dot {
      width: 0.75rem;
      height: 0.75rem;
      border-radius: 9999px;
      margin-right: 0.5rem;
    }
    
    .chart-summary {
      text-align: center;
      font-size: 0.875rem;
      color: var(--gray-600);
      margin-top: 1rem;
    }
    
    .summary-value {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--gray-800);
      margin-top: 0.25rem;
    }
    
    .summary-trend {
      font-size: 0.75rem;
      color: var(--green-600);
      margin-top: 0.25rem;
    }
  </style>
  <!-- Font Awesome para ícones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="flex h-screen">
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
        <a href="#" class="menu-item">
          <i class="fas fa-calendar-alt menu-icon"></i>
          <span>Meus Eventos</span>
        </a>
        <a href="#" class="menu-item">
          <i class="fas fa-users menu-icon"></i>
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
          <i class="fas fa-cog menu-icon"></i>
          <span>Configurações</span>
        </a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Top Navigation -->
      <header>
        <div class="header-content">
          <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="welcome-text">Bem-vindo de volta, Carlos!</p>
          </div>
          <div class="user-area">
            <button class="notification-btn">
              <i class="fas fa-bell"></i>
            </button>
            <div class="user-profile">
              <div class="user-avatar">C</div>
              <span style="color: var(--gray-700);">Carlos Silva</span>
              <i class="fas fa-chevron-down" style="font-size: 0.75rem; color: var(--gray-500); margin-left: 0.5rem;"></i>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content Body -->
      <main>
        <!-- Summary Cards -->
        <div class="dashboard-grid">
          <div class="stat-card">
            <div class="stat-card-header">
              <div>
                <p class="stat-label">Eventos Totais</p>
                <h3 class="stat-value">24</h3>
              </div>
              <div class="stat-icon icon-cyan">
                <i class="fas fa-calendar-check"></i>
              </div>
            </div>
            <div class="stat-trend">
              <i class="fas fa-arrow-up"></i>
              <span>12% desde o último mês</span>
            </div>
          </div>
          
          <div class="stat-card">
            <div class="stat-card-header">
              <div>
                <p class="stat-label">Participantes</p>
                <h3 class="stat-value">1,435</h3>
              </div>
              <div class="stat-icon icon-purple">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <div class="stat-trend">
              <i class="fas fa-arrow-up"></i>
              <span>8% desde o último mês</span>
            </div>
          </div>
          
          <div class="stat-card">
            <div class="stat-card-header">
              <div>
                <p class="stat-label">Ingressos Vendidos</p>
                <h3 class="stat-value">984</h3>
              </div>
              <div class="stat-icon icon-yellow">
                <i class="fas fa-ticket-alt"></i>
              </div>
            </div>
            <div class="stat-trend">
              <i class="fas fa-arrow-up"></i>
              <span>23% desde o último mês</span>
            </div>
          </div>
          
          <div class="stat-card">
            <div class="stat-card-header">
              <div>
                <p class="stat-label">Receita Total</p>
                <h3 class="stat-value">R$ 28.450</h3>
              </div>
              <div class="stat-icon icon-green">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <div class="stat-trend">
              <i class="fas fa-arrow-up"></i>
              <span>18% desde o último mês</span>
            </div>
          </div>
        </div>
        
        <!-- Upcoming Events & Analytics -->
        <div class="lower-grid">
          <!-- Upcoming Events -->
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Próximos Eventos</h2>
              <button class="card-action">Ver Todos</button>
            </div>
            <div class="card-body">
              <table>
                <thead>
                  <tr>
                    <th>Nome do Evento</th>
                    <th>Data</th>
                    <th>Participantes</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="event-item">
                        <div class="event-icon" style="background-color: rgba(128, 86, 255, 0.1);">
                          <i class="fas fa-music" style="color: var(--purple);"></i>
                        </div>
                        <span>Festival de Música 2025</span>
                      </div>
                    </td>
                    <td style="font-size: 0.875rem;">30 Abr, 2025</td>
                    <td style="font-size: 0.875rem;">243</td>
                    <td><span class="status-badge status-active">Ativo</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="event-item">
                        <div class="event-icon" style="background-color: rgba(59, 130, 246, 0.1);">
                          <i class="fas fa-laptop-code" style="color: var(--blue-500);"></i>
                        </div>
                        <span>Workshop de Tecnologia</span>
                      </div>
                    </td>
                    <td style="font-size: 0.875rem;">15 Mai, 2025</td>
                    <td style="font-size: 0.875rem;">87</td>
                    <td><span class="status-badge status-active">Ativo</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="event-item">
                        <div class="event-icon" style="background-color: rgba(255, 215, 0, 0.1);">
                          <i class="fas fa-utensils" style="color: var(--yellow);"></i>
                        </div>
                        <span>Festival Gastronômico</span>
                      </div>
                    </td>
                    <td style="font-size: 0.875rem;">22 Mai, 2025</td>
                    <td style="font-size: 0.875rem;">120</td>
                    <td><span class="status-badge status-pending">Pendente</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="event-item">
                        <div class="event-icon" style="background-color: rgba(239, 68, 68, 0.1);">
                          <i class="fas fa-heart" style="color: var(--red-500);"></i>
                        </div>
                        <span>Feira de Saúde</span>
                      </div>
                    </td>
                    <td style="font-size: 0.875rem;">05 Jun, 2025</td>
                    <td style="font-size: 0.875rem;">52</td>
                    <td><span class="status-badge status-draft">Rascunho</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Analytics Chart -->
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Análise de Vendas</h2>
            </div>
            <div class="card-body">
              <!-- Chart Placeholder -->
              <div class="chart-container">
                <div class="chart-gradient"></div>
                <div class="chart-bars">
                  <div class="bar bar-cyan" style="height: 30%;"></div>
                  <div class="bar bar-cyan" style="height: 40%;"></div>
                  <div class="bar bar-cyan" style="height: 50%;"></div>
                  <div class="bar bar-cyan" style="height: 70%;"></div>
                  <div class="bar bar-purple" style="height: 60%;"></div>
                  <div class="bar bar-purple" style="height: 40%;"></div>
                  <div class="bar bar-purple" style="height: 50%;"></div>
                </div>
              </div>
              <div class="chart-labels">
                <span>Seg</span>
                <span>Ter</span>
                <span>Qua</span>
                <span>Qui</span>
                <span>Sex</span>
                <span>Sáb</span>
                <span>Dom</span>
              </div>
              
              <div class="chart-legend">
                <div class="legend-row">
                  <div class="legend-item">
                    <div class="legend-dot" style="background-color: var(--cyan);"></div>
                    <span style="color: var(--gray-600);">Esta semana</span>
                  </div>
                  <div class="legend-item">
                    <div class="legend-dot" style="background-color: var(--purple);"></div>
                    <span style="color: var(--gray-600);">Semana passada</span>
                  </div>
                </div>
                
                <div class="chart-summary">
                  <p>Total de vendas esta semana</p>
                  <p class="summary-value">R$ 8.459</p>
                  <p class="summary-trend">
                    <i class="fas fa-arrow-up"></i> 12% comparado à semana passada
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>