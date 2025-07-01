@extends('admin.layout.base')
@section('title', 'Dashboard')

@section('content')
<style>
  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
    margin-bottom: 32px;
  }

  .stat-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  .stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px -5px rgba(0, 0, 0, 0.15);
  }

  .stat-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 16px;
  }

  .stat-label {
    color: #64748b;
    font-size: 14px;
    font-weight: 500;
    margin: 0 0 8px 0;
  }

  .stat-value {
    color: #1e293b;
    font-size: 32px;
    font-weight: 700;
    margin: 0;
    line-height: 1.2;
  }

  .stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  .icon-cyan { background: linear-gradient(135deg, #22d3ee, #0891b2); color: white; }
  .icon-purple { background: linear-gradient(135deg, #a855f7, #7c3aed); color: white; }
  .icon-yellow { background: linear-gradient(135deg, #facc15, #eab308); color: white; }
  .icon-green { background: linear-gradient(135deg, #22c55e, #16a34a); color: white; }
  .icon-blue { background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; }

  .stat-trend {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #059669;
    font-size: 14px;
    font-weight: 500;
  }

  .stat-trend.negative {
    color: #dc2626;
  }

  .stat-trend i {
    font-size: 12px;
  }

  .lower-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
    margin-bottom: 32px;
  }

  @media (max-width: 1024px) {
    .lower-grid {
      grid-template-columns: 1fr;
    }
  }

  .card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    padding: 24px 24px 0 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .card-title {
    color: #1e293b;
    font-size: 20px;
    font-weight: 600;
    margin: 0;
  }

  .card-action {
    background: none;
    border: 1px solid #e2e8f0;
    color: #64748b;
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s;
  }

  .card-action:hover {
    background: #f8fafc;
    color: #334155;
  }

  .card-body {
    padding: 24px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th {
    text-align: left;
    color: #64748b;
    font-weight: 500;
    font-size: 14px;
    padding: 12px 0;
    border-bottom: 1px solid #e2e8f0;
  }

  td {
    padding: 16px 0;
    border-bottom: 1px solid #f1f5f9;
    font-size: 14px;
    color: #334155;
  }

  .order-item {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .order-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
  }

  .status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
  }

  .status-pending { background: #fef3c7; color: #92400e; }
  .status-accepted { background: #d1fae5; color: #065f46; }
  .status-rejected { background: #fee2e2; color: #991b1b; }
  .status-cancelled { background: #f3f4f6; color: #374151; }

  .chart-container {
    position: relative;
    height: 200px;
    margin: 20px 0;
    background: linear-gradient(180deg, rgba(34, 211, 238, 0.1) 0%, rgba(168, 85, 247, 0.05) 100%);
    border-radius: 12px;
    overflow: hidden;
  }

  .chart-bars {
    display: flex;
    align-items: end;
    justify-content: space-around;
    height: 100%;
    padding: 20px;
  }

  .bar {
    width: 24px;
    border-radius: 4px 4px 0 0;
    transition: all 0.3s ease;
  }

  .bar-cyan { background: linear-gradient(180deg, #22d3ee, #0891b2); }
  .bar-purple { background: linear-gradient(180deg, #a855f7, #7c3aed); }

  .chart-labels {
    display: flex;
    justify-content: space-around;
    padding: 0 20px;
    color: #64748b;
    font-size: 12px;
    font-weight: 500;
  }

  .chart-legend {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e2e8f0;
  }

  .legend-row {
    display: flex;
    gap: 24px;
    margin-bottom: 16px;
  }

  .legend-item {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .legend-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
  }

  .chart-summary {
    color: #64748b;
    font-size: 14px;
  }

  .summary-value {
    font-size: 24px;
    font-weight: 700;
    color: #1e293b;
    margin: 8px 0;
  }

  .summary-trend {
    color: #059669;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .summary-trend i {
    font-size: 12px;
  }
</style>

<main>
  <!-- Summary Cards -->
  <div class="dashboard-grid">
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Total de Usuários</p>
          <h3 class="stat-value">{{ number_format($totalUsers) }}</h3>
        </div>
        <div class="stat-icon icon-cyan">
          <i class="fas fa-users"></i>
        </div>
      </div>
      <div class="stat-trend {{ $usersGrowth < 0 ? 'negative' : '' }}">
        <i class="fas fa-arrow-{{ $usersGrowth >= 0 ? 'up' : 'down' }}"></i>
        <span>{{ abs($usersGrowth) }}% desde o último mês</span>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Total de Pedidos</p>
          <h3 class="stat-value">{{ number_format($totalOrders) }}</h3>
        </div>
        <div class="stat-icon icon-purple">
          <i class="fas fa-shopping-cart"></i>
        </div>
      </div>
      <div class="stat-trend {{ $ordersGrowth < 0 ? 'negative' : '' }}">
        <i class="fas fa-arrow-{{ $ordersGrowth >= 0 ? 'up' : 'down' }}"></i>
        <span>{{ abs($ordersGrowth) }}% desde o último mês</span>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Reservas Pagas</p>
          <h3 class="stat-value">{{ number_format($paidReservations) }}</h3>
        </div>
        <div class="stat-icon icon-yellow">
          <i class="fas fa-calendar-check"></i>
        </div>
      </div>
      <div class="stat-trend">
        <i class="fas fa-info-circle"></i>
        <span>{{ number_format($unpaidReservations) }} não pagas</span>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Receita Total</p>
          <h3 class="stat-value">{{ number_format($totalRevenue, 2, ',', '.') }} MT</h3>
        </div>
        <div class="stat-icon icon-green">
          <i class="fas fa-dollar-sign"></i>
        </div>
      </div>
      <div class="stat-trend {{ $revenueGrowth < 0 ? 'negative' : '' }}">
        <i class="fas fa-arrow-{{ $revenueGrowth >= 0 ? 'up' : 'down' }}"></i>
        <span>{{ abs($revenueGrowth) }}% desde o último mês</span>
      </div>
    </div>
  </div>

  <!-- User Statistics Cards -->
  <div class="dashboard-grid">
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Clientes</p>
          <h3 class="stat-value">{{ number_format($totalClients) }}</h3>
        </div>
        <div class="stat-icon icon-blue">
          <i class="fas fa-user"></i>
        </div>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Colaboradores</p>
          <h3 class="stat-value">{{ number_format($totalCollaborators) }}</h3>
        </div>
        <div class="stat-icon icon-purple">
          <i class="fas fa-user-tie"></i>
        </div>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Pedidos Pendentes</p>
          <h3 class="stat-value">{{ number_format($pendingOrders) }}</h3>
        </div>
        <div class="stat-icon icon-yellow">
          <i class="fas fa-clock"></i>
        </div>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Pedidos Aceitos</p>
          <h3 class="stat-value">{{ number_format($acceptedOrders) }}</h3>
        </div>
        <div class="stat-icon icon-green">
          <i class="fas fa-check-circle"></i>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Recent Orders & Analytics -->
  <div class="lower-grid">
    <!-- Recent Orders -->
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Pedidos Recentes</h2>
        <button class="card-action">Ver Todos</button>
      </div>
      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Data</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($recentOrders as $order)
            <tr>
              <td>
                <div class="order-item">
                  <div class="order-icon" style="background-color: rgba(59, 130, 246, 0.1);">
                    <i class="fas fa-user" style="color: #3b82f6;"></i>
                  </div>
                  <span>{{ $order->user->name ?? 'Cliente' }}</span>
                </div>
              </td>
              <td style="font-size: 0.875rem;">{{ $order->created_at->format('d M, Y') }}</td>
              <td style="font-size: 0.875rem;">{{ number_format($order->total ?? 0, 2, ',', '.') }} MT</td>
              <td>
                <span class="status-badge status-{{ $order->status }}">
                  @switch($order->status)
                    @case('pending') Pendente @break
                    @case('accepted') Aceito @break
                    @case('rejected') Rejeitado @break
                    @case('cancelled') Cancelado @break
                    @default {{ $order->status }}
                  @endswitch
                </span>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" style="text-align: center; color: #64748b;">Nenhum pedido encontrado</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Revenue Chart -->
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Crescimento de Receita</h2>
      </div>
      <div class="card-body">
        <!-- Chart -->
        <div class="chart-container">
          <div class="chart-bars">
            @php
              $maxValue = $weeklyRevenue->max('total') ?: 1;
            @endphp
            @foreach($weeklyRevenue->take(7) as $day)
            <div class="bar bar-cyan" style="height: {{ $day['total'] > 0 ? ($day['total'] / $maxValue) * 80 : 5 }}%;"></div>
            @endforeach
            @foreach($weeklyRevenue->skip(7) as $day)
            <div class="bar bar-purple" style="height: {{ $day['total'] > 0 ? ($day['total'] / $maxValue) * 80 : 5 }}%;"></div>
            @endforeach
          </div>
        </div>
        <div class="chart-labels">
          @foreach($weeklyRevenue->take(7) as $day)
          <span>{{ $day['day'] }}</span>
          @endforeach
        </div>
        
        <div class="chart-legend">
          <div class="legend-row">
            <div class="legend-item">
              <div class="legend-dot" style="background-color: #22d3ee;"></div>
              <span style="color: #64748b;">Semana passada</span>
            </div>
            <div class="legend-item">
              <div class="legend-dot" style="background-color: #a855f7;"></div>
              <span style="color: #64748b;">Esta semana</span>
            </div>
          </div>
          
          <div class="chart-summary">
            <p>Total de receita esta semana</p>
            <p class="summary-value">{{ number_format($weeklyRevenue->skip(7)->sum('total'), 2, ',', '.') }} MT</p>
            <p class="summary-trend">
              <i class="fas fa-arrow-up"></i> {{ abs($revenueGrowth) }}% comparado à semana passada
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection