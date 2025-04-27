@extends('admin.layout.base')
@section('title', 'Dashboard')

@Section('content')
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
@endsection