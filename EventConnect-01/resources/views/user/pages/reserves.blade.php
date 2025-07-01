@extends('shop.layout.base')
@section('title', 'Reservas')

@section('content')
<main class="p-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total de Pedidos -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total de Reservas</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $reserves->count() }}</h3>
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
                    <p class="text-sm font-medium text-gray-600 mb-1">Pagas</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $reserves->where('status_pagamento', 'Pago')->count() }}</h3>
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
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Nao Pagas</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $reserves->where('status_pagamento', 'Pendente')->count() }}</h3>
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

 

    </div>
    <h2 class="text-xl font-semibold mb-4">Lista de Reservas</h2>

    <div class="card overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Evento</th>
                    <th>Pacote</th>
                    <th>Preço Total</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reserves as $reserve)
                    <tr>
                        <td>{{ $reserve->order->user->name ?? '---' }}</td>
                        <td>{{ $reserve->order->eventType->name ?? '---' }}</td>
                        <td>{{ $reserve->eventpackage->name ?? '---' }}</td>
                        <td>{{ number_format($reserve->total_price, 2, ',', '.') }} MZN</td>
                        <td>
                            <span class="px-2 py-1 text-sm rounded 
                                {{ $reserve->status_pagamento == 'pago' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($reserve->status_pagamento) }}
                            </span>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                @if($reserve->status_pagamento == 'pendente')
                                    <button 
                                        type="button"
                                        onclick="openModal({{ $reserve->id }}, {{ $reserve->total_price }}); event.stopPropagation();"
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded transition-colors duration-200">
                                        Pagar
                                    </button>
                                @else
                                    <button 
                                        type="button"
                                        onclick="markUnpaid({{ $reserve->id }}); event.stopPropagation();"
                                        class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded transition-colors duration-200">
                                        Marcar como Não Pago
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">Nenhuma reserva encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

<!-- Modal de Pagamento -->
<div id="paymentModal" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title">Pagamento Mpesa</h3>
            <button type="button" class="modal-close" onclick="closeModal()" aria-label="Fechar modal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        
        <form method="POST" action="{{ route('user.reservations.pay') }}" class="modal-form">
            @csrf
            <input type="hidden" name="reserve_id" id="reserve_id">
            <input type="hidden" name="amount" id="reserve_amount">

            <div class="form-group">
                <label for="phone" class="form-label">Telefone *</label>
                <input type="text" 
                       name="phone" 
                       id="phone"
                       required 
                       pattern="^(84|85)\d{7}$"
                       class="form-input" 
                       placeholder="Ex: 841234567"
                       title="Digite um número válido (84XXXXXXX ou 85XXXXXXX)">
            </div>

            <div class="form-group">
                <label for="payment_method" class="form-label">Forma de Pagamento *</label>
                <select name="payment_method" id="payment_method" required class="form-input">
                    <option value="">Selecione uma opção</option>
                    <option value="Mpesa">Mpesa</option>
                    <option value="Cash">Dinheiro</option>
                    <option value="Bank">Transferência</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reference" class="form-label">Referência</label>
                <input type="text" 
                       name="reference" 
                       id="reference"
                       class="form-input" 
                       placeholder="Referência do pagamento (opcional)">
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
</style>

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
    function openModal(reserveId, amount) {
        console.log('Abrindo modal para reserva:', reserveId, 'Valor:', amount);
        
        if (!modalElement) {
            console.error('Elemento modal não encontrado');
            return;
        }

        // Definir os valores nos campos hidden
        const reserveIdField = document.getElementById('reserve_id');
        const amountField = document.getElementById('reserve_amount');
        
        if (reserveIdField && amountField) {
            reserveIdField.value = reserveId;
            amountField.value = amount;
        }

        // Limpar o formulário
        const form = modalElement.querySelector('form');
        if (form) {
            const inputs = form.querySelectorAll('input:not([type="hidden"]), select, textarea');
            inputs.forEach(input => {
                if (input.type !== 'hidden') {
                    input.value = '';
                }
            });
        }

        // Mostrar o modal com animação
        modalElement.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Prevenir scroll da página
        
        // Forçar reflow e adicionar classe show para animação
        modalElement.offsetHeight;
        modalElement.classList.add('show');
        
        isModalOpen = true;
        
        // Focar no primeiro campo input
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
@endsection