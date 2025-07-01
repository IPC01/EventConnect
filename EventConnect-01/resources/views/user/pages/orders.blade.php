@extends('shop.layout.base')
@section('title', 'Pedidos de Evento')

@section('content')
<main class="min-h-screen bg-gray-50 p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Pedidos de Evento</h1>
        <p class="text-gray-600">Gerencie e acompanhe todos os pedidos de eventos</p>
    </div>

    <!-- Cards de Resumo -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total de Pedidos -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total de Pedidos</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $orders->count() }}</h3>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                <span class="text-green-600 font-medium">12 novos</span>
                <span class="text-gray-500 ml-1">esta semana</span>
            </div>
        </div>

        <!-- Confirmados -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Confirmados</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $orders->where('status', 'accepted')->count() }}</h3>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                <span class="text-green-600 font-medium">5% crescimento</span>
                <span class="text-gray-500 ml-1">este mês</span>
            </div>
        </div>

        <!-- Pendentes -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Pendentes</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $orders->where('status', 'pending')->count() }}</h3>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-hourglass-half text-yellow-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <i class="fas fa-clock text-yellow-500 mr-1"></i>
                <span class="text-yellow-600 font-medium">Aguardando</span>
                <span class="text-gray-500 ml-1">análise</span>
            </div>
        </div>
        <!-- Cancelados -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Cancelados</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $orders->where('status', 'cancelled')->count() }}</h3>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-hourglass-half text-yellow-600 text-xl"></i>
                </div>
            </div>
         
        </div>
    </div>

    <!-- Tabela de Pedidos -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Header da Tabela -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Lista de Pedidos</h2>
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Buscar pedidos..." 
                               class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Todos os status</option>
                        <option value="pending">Pendente</option>
                        <option value="accepted">Confirmado</option>
                        <option value="rejected">Rejeitado</option>
                        <option value="cancelled">Cancelado</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Evento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Início</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Fim</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Convidados</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orçamento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Mensagens</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($orders as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <!-- Cliente -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-blue-600"></i>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $order->user->name ?? 'Usuário não encontrado' }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $order->user->email ?? '---' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Tipo de Evento -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    {{ $order->eventType->name ?? 'Não definido' }}
                                </span>
                            </td>

                            <!-- Data Início -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar text-gray-400 mr-2"></i>
                                    {{ \Carbon\Carbon::parse($order->event_start_date)->format('d/m/Y') }}
                                </div>
                            </td>

                            <!-- Data Fim -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-check text-gray-400 mr-2"></i>
                                    {{ \Carbon\Carbon::parse($order->event_end_date)->format('d/m/Y') }}
                                </div>
                            </td>

                            <!-- Convidados -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex items-center">
                                    <i class="fas fa-users text-gray-400 mr-2"></i>
                                    {{ $order->nr_guests }}
                                </div>
                            </td>

                            <!-- Orçamento -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex items-center">
                                    <i class="fas fa-money-bill-wave text-green-400 mr-2"></i>
                                    <span class="font-medium">{{ number_format($order->budget, 2, ',', '.') }} MZN</span>
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" 
                                            onchange="checkStatusAndSubmit(this)" 
                                            data-status="{{ $order->status }}"
                                            class="text-sm rounded-lg border-0 py-2 px-3 font-medium focus:ring-2 focus:ring-blue-500 cursor-pointer
                                                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $order->status === 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $order->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                                                {{ $order->status === 'cancelled' ? 'bg-gray-100 text-gray-800' : '' }}"
                                            {{ $order->status === 'cancelled' ? 'disabled' : '' }}>
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                             Pendente
                                        </option>
                                        <option value="accepted" {{ $order->status == 'accepted' ? 'selected' : '' }}>
                                             Confirmado
                                        </option>
                                        <option value="rejected" {{ $order->status == 'rejected' ? 'selected' : '' }}>
                                             Rejeitado
                                        </option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                             Cancelado
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <!-- Mensagens -->
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="#" 
                                   title="Ver mensagens" 
                                   class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-envelope text-blue-600"></i>
                                </a>
                            </td>

                            <!-- Ações -->
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button onclick="viewOrderDetails({{ $order->id }})" 
                                            title="Ver detalhes"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-eye text-gray-600"></i>
                                    </button>
                                    
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" 
                                          method="POST"
                                          onsubmit="return confirm('Tem certeza que deseja excluir este pedido? Esta ação não pode ser desfeita.')"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Excluir pedido"
                                                class="inline-flex items-center justify-center w-8 h-8 bg-red-100 rounded-full hover:bg-red-200 transition-colors">
                                            <i class="fas fa-trash text-red-600"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum pedido encontrado</h3>
                                    <p class="text-gray-500">Não há pedidos de evento no momento.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        {{-- @if($orders->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Mostrando {{ $orders->firstItem() }} a {{ $orders->lastItem() }} de {{ $orders->total() }} resultados
                    </div>
                    <div class="flex space-x-2">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        @endif --}}
    </div>
</main>

<!-- Modal de Detalhes (Placeholder) -->
{{-- <div id="orderDetailsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Detalhes do Pedido</h3>
                <button onclick="closeOrderDetails()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div class="p-6" id="orderDetailsContent">
            <!-- Conteúdo será carregado aqui -->
        </div>
    </div>
</div> --}}

<script>
    function checkStatusAndSubmit(select) {
        const currentStatus = select.getAttribute('data-status');
        const newStatus = select.value;
        
        if (currentStatus === "cancelled") {
            alert("Não é possível alterar um pedido com status cancelado.");
            select.value = currentStatus;
            return;
        }
        
        // Confirmação para mudanças críticas
        if (newStatus === 'rejected' || newStatus === 'cancelled') {
            const action = newStatus === 'rejected' ? 'rejeitar' : 'cancelar';
            if (!confirm(`Tem certeza que deseja ${action} este pedido?`)) {
                select.value = currentStatus;
                return;
            }
        }
        
        // Submeter o formulário
        select.form.submit();
    }

    function viewOrderDetails(orderId) {
        // Implementar carregamento de detalhes via AJAX
        document.getElementById('orderDetailsModal').classList.remove('hidden');
        document.getElementById('orderDetailsContent').innerHTML = `
            <div class="text-center py-8">
                <i class="fas fa-spinner fa-spin text-blue-600 text-2xl mb-4"></i>
                <p class="text-gray-600">Carregando detalhes do pedido...</p>
            </div>
        `;
        
        // Aqui você pode fazer uma requisição AJAX para carregar os detalhes
        // fetch(`/admin/orders/${orderId}/details`)...
    }

    function closeOrderDetails() {
        document.getElementById('orderDetailsModal').classList.add('hidden');
    }

    // Funcionalidade de busca
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Buscar pedidos..."]');
        const statusFilter = document.querySelector('select');
        const tableRows = document.querySelectorAll('tbody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;

            tableRows.forEach(row => {
                if (row.cells.length === 1) return; // Skip empty state row
                
                const clientName = row.cells[0].textContent.toLowerCase();
                const eventType = row.cells[1].textContent.toLowerCase();
                const statusCell = row.cells[6].querySelector('select');
                const currentStatus = statusCell ? statusCell.value : '';

                const matchesSearch = clientName.includes(searchTerm) || eventType.includes(searchTerm);
                const matchesStatus = !statusValue || currentStatus === statusValue;

                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
    });

    // Fechar modal ao clicar fora
    document.getElementById('orderDetailsModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeOrderDetails();
        }
    });
</script>
@endsection