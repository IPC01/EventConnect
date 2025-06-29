@extends('shop.layout.base')
@section('title', 'Reservas')

@section('content')
<main class="p-4">
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
                        <td class="flex gap-2">
                            @if($reserve->status_pagamento == 'pendente')
                                <button 
                                    onclick="openModal({{ $reserve->id }}, {{ $reserve->total_price }})"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded">
                                    Pagar
                                </button>
                            @else
                                <button 
                                    onclick="markUnpaid({{ $reserve->id }})"
                                    class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded">
                                    Marcar como Não Pago
                                </button>
                            @endif
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
<div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
    <div class="bg-white p-6 rounded-lg w-[90%] md:w-[400px]">
        <h3 class="text-lg font-bold mb-4">Pagamento Mpesa</h3>
        <form method="POST" action="{{ route('user.reservations.pay') }}">
            @csrf
            <input type="hidden" name="reserve_id" id="reserve_id">
            <input type="hidden" name="amount" id="reserve_amount">

            <div class="mb-3">
                <label for="phone">Telefone</label>
                <input type="text" name="phone" required pattern="^(84|85)\d{7}$"
                    class="w-full border rounded px-2 py-1" placeholder="Ex: 841234567">
            </div>

            <div class="mb-3">
                <label for="payment_method">Forma de Pagamento</label>
                <select name="payment_method" required class="w-full border rounded px-2 py-1">
                    <option value="Mpesa">Mpesa</option>
                    <option value="Cash">Dinheiro</option>
                    <option value="Bank">Transferência</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="reference">Referência</label>
                <input type="text" name="reference" class="w-full border rounded px-2 py-1" placeholder="Opcional">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeModal()" class="px-4 py-1 bg-gray-300 rounded">Cancelar</button>
                <button type="submit" class="px-4 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                    Confirmar Pagamento
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(reserveId, amount) {
        document.getElementById('reserve_id').value = reserveId;
        document.getElementById('reserve_amount').value = amount;
        document.getElementById('paymentModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('paymentModal').classList.add('hidden');
    }

    function markUnpaid(reserveId) {
        if (confirm('Deseja realmente marcar como não pago?')) {
            fetch(`/user/reservas/${reserveId}/nao-pago`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            }).then(() => location.reload());
        }
    }
</script>
@endsection
