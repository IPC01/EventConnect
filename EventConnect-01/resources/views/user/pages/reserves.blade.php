@extends('shop.layout.base')
@section('title', 'Reservas')

@section('content')
    <main class="p-4 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total de Pedidos -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Total de Reservas</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $reserves->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    </div>
                </div>
                {{-- <div class="mt-4 flex items-center text-sm">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                    <span class="text-green-600 font-medium">12 novos</span>
                    <span class="text-gray-500 ml-1">esta semana</span>
                </div> --}}
            </div>

            <!-- Confirmados -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Pagas</p>
                        <h3 class="text-3xl font-bold text-gray-900">
                            {{ $reserves->where('status_pagamento', 'pago')->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    </div>
                </div>
                {{-- <div class="mt-4 flex items-center text-sm">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                    <span class="text-green-600 font-medium">5% crescimento</span>
                    <span class="text-gray-500 ml-1">este mês</span>
                </div> --}}
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Nao Pagas</p>
                        <h3 class="text-3xl font-bold text-gray-900">
                            {{ $reserves->where('status_pagamento', 'pendente')->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                    </div>
                </div>
                {{-- <div class="mt-4 flex items-center text-sm">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                    <span class="text-green-600 font-medium">5% crescimento</span>
                    <span class="text-gray-500 ml-1">este mês</span>
                </div> --}}
            </div>
        </div>

        <!-- Cabeçalho da tabela -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Lista de Reservas</h2>
                <p class="text-gray-600 mt-1">Gerencie todas as suas reservas de eventos</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" placeholder="Buscar reservas..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Todos os status</option>
                    <option value="pago">Pago</option>
                    <option value="pendente">Pendente</option>
                </select>
            </div>
        </div>

        <!-- Tabela melhorada -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-8">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-user text-gray-400"></i>
                                    Cliente
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                    Evento
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-box text-gray-400"></i>
                                    Pacote
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-money-bill text-gray-400"></i>
                                    Preço Total
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-info-circle text-gray-400"></i>
                                    Status
                                </div>
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center justify-center gap-2">
                                    <i class="fas fa-cog text-gray-400"></i>
                                    Ações
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($reserves as $reserve)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                                                <span class="text-white font-medium text-sm">
                                                    {{ strtoupper(substr($reserve->order->user->name ?? 'U', 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $reserve->order->user->name ?? '---' }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $reserve->order->user->email ?? '---' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $reserve->order->eventType->name ?? '---' }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ $reserve->created_at->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $reserve->eventpackage->name ?? '---' }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <i class="fas fa-tag mr-1"></i>
                                        Pacote Premium
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">
                                        {{ number_format($reserve->total_price, 2, ',', '.') }} MZN
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Total com taxas
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($reserve->status_pagamento == 'pago')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Pago
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i>
                                            Pendente
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex justify-center gap-2">
                                        @if ($reserve->status_pagamento == 'pendente')
                                            <button type="button"
                                                onclick="openModal(
                                                {{ $reserve->id }},
                                                {{ $reserve->total_price }},
                                                {{ auth()->id() }},
                                                {{ $reserve->eventpackage->eventhall->user->id ?? 'null' }}
                                                ); event.stopPropagation();"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                <i class="fas fa-credit-card mr-1"></i>
                                                Pagar
                                            </button>
                                        @else
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                                <i class="fas fa-times-circle mr-1"></i>
                                                Finalizada
                                            </button>
                                        @endif
                                      
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhuma reserva encontrada</h3>
                                        <p class="text-gray-500">Você ainda não possui reservas cadastradas no sistema.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Paginação (se necessário) -->
            {{-- @if($reserves->hasPages())
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    {{ $reserves->links() }}
                </div>
            @endif --}}
        </div>
    </main>

    <!-- Modal de Pagamento -->
    <div id="paymentModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Pagamento Mpesa</h3>
                <button type="button" class="modal-close" onclick="closeModal()" aria-label="Fechar modal">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('user.reservations.pay') }}" class="modal-form">
                @csrf
                <input type="hidden" name="reserve_id" id="reserve_id" value="">
                <input type="hidden" name="amount" id="reserve_amount">
                <input type="hidden" name="user_id">
                <input type="hidden" name="owner_id">

                <div class="form-group">
                    <label for="phone" class="form-label">Telefone *</label>
                    <input type="text" name="phone" id="phone" required pattern="^(84|85)\d{7}$" class="form-input"
                        placeholder="Ex: 841234567" title="Digite um número válido (84XXXXXXX ou 85XXXXXXX)">
                </div>

                <div class="form-group">
                    <label for="payment_method" class="form-label">Forma de Pagamento *</label>
                    <select name="method" id="payment_method" required class="form-input">
                        <option value="">Selecione uma opção</option>
                        <option value="Mpesa">Mpesa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount_display" class="form-label">Valor a Pagar (MT)</label>
                    <input type="text" id="amount_display" class="form-input" readonly>
                </div>

                <div class="modal-footer">
                    <button type="button" onclick="closeModal()" class="btn-secondary">
                        Cancelar
                    </button>
                    <button type="submit" class="btn-primary">
                        Confirmar Pagamento
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Variáveis globais para controle do modal
        let modalElement = null;
        let isModalOpen = false;

        // Inicialização quando a página carrega
        document.addEventListener('DOMContentLoaded', function() {
            modalElement = document.getElementById('paymentModal');

            // Prevenir que cliques dentro do modal fechem o modal
            if (modalElement) {
                const modalContainer = modalElement.querySelector('.modal-container');
                if (modalContainer) {
                    modalContainer.addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                }
            }
        });

        // Função para abrir o modal
        function openModal(reserveId, amount, userId, ownerId) {
            console.log('Abrindo modal para reserva:', reserveId, 'Valor:', amount);

            if (!modalElement) {
                console.error('Elemento modal não encontrado');
                return;
            }

            // Preencher campos ocultos
            document.getElementById('reserve_id').value = reserveId;
            document.getElementById('reserve_amount').value = amount;
            document.querySelector('input[name="user_id"]').value = userId;
            document.querySelector('input[name="owner_id"]').value = ownerId;

            // Preencher campo visível com o valor
            document.getElementById('amount_display').value = amount + ' MT';

            // Limpar inputs visíveis (exceto o valor que já foi setado)
            const form = modalElement.querySelector('form');
            if (form) {
                const inputs = form.querySelectorAll('input:not([type="hidden"]):not(#amount_display), select, textarea');
                inputs.forEach(input => {
                    input.value = '';
                });
            }

            // Mostrar modal
            modalElement.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            modalElement.offsetHeight;
            modalElement.classList.add('show');
            isModalOpen = true;

            // Focar no campo de telefone
            setTimeout(() => {
                const phoneInput = document.getElementById('phone');
                if (phoneInput) {
                    phoneInput.focus();
                }
            }, 100);
        }

        // Função para fechar o modal
        function closeModal() {
            console.log('Fechando modal');

            if (!modalElement || !isModalOpen) {
                return;
            }

            // Remover classe show para animação de saída
            modalElement.classList.remove('show');

            // Aguardar animação antes de ocultar
            setTimeout(() => {
                modalElement.style.display = 'none';
                document.body.style.overflow = 'auto'; // Restaurar scroll da página
                isModalOpen = false;
            }, 300);
        }

        // Função para marcar como não pago
        function markUnpaid(reserveId) {
            if (confirm('Deseja realmente marcar esta reserva como não paga?')) {
                console.log('Marcando reserva como não paga:', reserveId);

                fetch(`/user/reservas/${reserveId}/nao-pago`, {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            console.error('Erro ao marcar como não pago');
                            alert('Erro ao processar a solicitação. Tente novamente.');
                        }
                    })
                    .catch(error => {
                        console.error('Erro na requisição:', error);
                        alert('Erro ao processar a solicitação. Tente novamente.');
                    });
            }
        }

        // Event listeners globais
        document.addEventListener('DOMContentLoaded', function() {
            // Fechar modal ao clicar no overlay (fora do modal)
            if (modalElement) {
                modalElement.addEventListener('click', function(e) {
                    if (e.target === modalElement) {
                        closeModal();
                    }
                });
            }

            // Fechar modal com ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isModalOpen) {
                    closeModal();
                }
            });

            // Validação do formulário
            const form = document.querySelector('#paymentModal form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const phoneInput = document.getElementById('phone');
                    const paymentMethodSelect = document.getElementById('payment_method');

                    // Validar telefone
                    if (phoneInput && !phoneInput.value.match(/^(84|85)\d{7}$/)) {
                        e.preventDefault();
                        alert('Por favor, digite um número de telefone válido (84XXXXXXX ou 85XXXXXXX)');
                        phoneInput.focus();
                        return;
                    }

                    // Validar método de pagamento
                    if (paymentMethodSelect && !paymentMethodSelect.value) {
                        e.preventDefault();
                        alert('Por favor, selecione uma forma de pagamento');
                        paymentMethodSelect.focus();
                        return;
                    }
                });
            }
        });

        // Prevenir ações acidentais em elementos da tabela
        document.addEventListener('click', function(e) {
            // Se clicou em uma linha da tabela mas não em um botão, não fazer nada
            const tableRow = e.target.closest('tr');
            const button = e.target.closest('button');

            if (tableRow && !button) {
                e.stopPropagation();
            }
        });
    </script>

    <style>
        /* Estilos do Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
            opacity: 1;
        }

        .modal-container {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 450px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            transform: scale(0.9) translateY(-20px);
            transition: transform 0.3s ease;
        }

        .modal-overlay.show .modal-container {
            transform: scale(1) translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 24px 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            padding: 4px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .modal-close:hover {
            background-color: #f3f4f6;
            color: #374151;
        }

        .modal-form {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-input:invalid {
            border-color: #ef4444;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 32px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .btn-secondary {
            padding: 12px 24px;
            background-color: #f3f4f6;
            color: #374151;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
        }

        .btn-primary {
            padding: 12px 24px;
            background-color: #16a34a;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #15803d;
        }

        .btn-primary:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        /* Responsividade */
        @media (max-width: 640px) {
            .modal-container {
                width: 95%;
                margin: 20px;
            }

            .modal-header,
            .modal-form {
                padding: 20px;
            }

            .modal-footer {
                flex-direction: column;
            }

            .btn-secondary,
            .btn-primary {
                width: 100%;
            }
        }

        /* Estilos personalizados para a tabela */
        .table-container {
            margin-bottom: 4rem;
        }

        /* Ajustes de spacing para mobile */
        @media (max-width: 768px) {
            main {
                padding-bottom: 6rem !important;
            }
            
            .flex.justify-center.gap-2 {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .inline-flex.items-center {
                justify-content: center;
                width: 100%;
            }
        }
    </style>
@endsection