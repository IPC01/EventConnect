@extends('admin.layout.base')
@section('title', 'Pedidos de Evento')

@section('content')
    <main>
        <!-- Resumo -->
        <div class="dashboard-grid">

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Total de Pedidos</p>
                        <h3 class="stat-value">{{ $orders->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-cyan">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i> <span>12 novos esta semana</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Confirmados</p>
                        <h3 class="stat-value">{{ $orders->where('status', 'confirmed')->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-purple">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i> <span>5% de crescimento</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Pendentes</p>
                        <h3 class="stat-value">{{ $orders->where('status', 'pending')->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-yellow">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-down"></i> <span>Aguardando análise</span>
                </div>
            </div>
        </div>

        <!-- Tabela -->
        <div class="card mt-8">
            <div class="card-header">
                <h2 class="card-title">Pedidos de Evento</h2>
            </div>

            <div class="card-body overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Tipo de Evento</th>
                            <th>Data Início</th>
                            <th>Data Fim</th>
                            <th>Convidados</th>
                            <th>Orçamento</th>
                            <th>Status</th>
                            <th>Mensagens</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->user->name ?? '---' }}</td>
                                <td>{{ $order->eventType->name ?? '---' }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->event_start_date)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->event_end_date)->format('d/m/Y') }}</td>
                                <td>{{ $order->nr_guests }}</td>
                                <td>{{ number_format($order->budget, 2, ',', '.') }} MZN</td>

                                <!-- Status com Form -->
                                <td>
                                    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                                        @csrf
                                        @method('PATCH')

                                        @if( $order->status == 'cancelled')
                                           <select name="status" onchange="checkStatusAndSubmit(this)"
                                            class=" text-sm px-2 py-1 ">
                                            
                                            <option value="cancelled"
                                                {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                                        </select>
                                        @else 
                                        <select name="status" onchange="checkStatusAndSubmit(this)"
                                            class="bg-white border text-sm px-2 py-1 rounded">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                Pendente</option>
                                            <option value="accepted"
                                                {{ $order->status == 'accepted' ? 'selected' : '' }}>Confirmado</option>
                                            <option value="rejected"
                                                {{ $order->status == 'rejected' ? 'selected' : '' }}>Rejeitado</option>
                                        </select>
                                        @endif


                                    </form>
                                </td>

                                <!-- Link para mensagens route('admin.messages.index', ['order_id' => $order->id]) }} -->
                                <td class="text-center">
                                    <a href="#" title="Ver mensagens" class="text-blue-600 hover:text-blue-800 ">
                                        <i class="fas fa-envelope "></i>
                                    </a>
                                </td>

                                <!-- Ações -->
                                <td class="flex gap-2">
                                    {{-- <a href="{{ route('admin.orders.show', $order->id) }}" class="action-btn view-btn">
                                    <i class="fas fa-eye"></i>
                                </a> --}}
                                    {{-- <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                        onsubmit="return confirm('Deseja excluir este pedido?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-btn delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        function checkStatusAndSubmit(select) {
            const currentStatus = "{{ $order->status }}";
            if (currentStatus === "cancelled") {
                alert("Não é possível alterar um pedido com status cancelado.");
                select.value = currentStatus;
            } else {
                select.form.submit();
            }
        }
    </script>
@endsection
