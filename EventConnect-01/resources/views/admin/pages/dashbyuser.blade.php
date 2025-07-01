@extends('admin.layout.base')
@section('title', 'Dashboard')

@section('content')
<style>
  /* seu CSS permanece o mesmo */
</style>

<main>
  <!-- Summary Cards -->
  <div class="dashboard-grid">
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Pedidos Totais</p>
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

  <!-- Status dos Pedidos -->
  <div class="dashboard-grid">
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
    
    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Pedidos Rejeitados</p>
          <h3 class="stat-value">{{ number_format($rejectedOrders) }}</h3>
        </div>
        <div class="stat-icon icon-red">
          <i class="fas fa-times-circle"></i>
        </div>
      </div>
    </div>

    <div class="stat-card">
      <div class="stat-card-header">
        <div>
          <p class="stat-label">Pedidos Cancelados</p>
          <h3 class="stat-value">{{ number_format($cancelledOrders) }}</h3>
        </div>
        <div class="stat-icon icon-gray">
          <i class="fas fa-ban"></i>
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
        <a href="{{ route('reservations.index') }}" class="card-action">Ver Todos</a>
      </div>
      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th>Data</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($recentOrders as $order)
            <tr>
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
              <td colspan="3" style="text-align: center; color: #64748b;">Nenhum pedido encontrado</td>
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
