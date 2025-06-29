@extends('admin.layout.base')

@section('title', 'Editar Reserva')

@section('content')
<main class="bg-gray-50">
    <div class="">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Editar Reserva</h2>
            </div>

            <!-- Formulário de Edição da Reserva -->
            <form action="{{ route('admin.reserves.update', $reserve->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- ID do Pedido (somente leitura) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ID do Pedido</label>
                        <input type="text" name="id_order" value="{{ $reserve->id_order }}" readonly
                            class="w-full bg-gray-100 border-gray-300 rounded-md shadow-sm p-3 text-gray-600">
                    </div>

                    <!-- Selecionar Pacote -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pacote <span class="text-red-500">*</span></label>
                        <select name="id_package" required
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                            @foreach ($pacotes as $pacote)
                                <option value="{{ $pacote->id }}"
                                    {{ old('id_package', $reserve->id_package) == $pacote->id ? 'selected' : '' }}>
                                    {{ $pacote->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Preço Total e Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Preço Total (R$) <span class="text-red-500">*</span></label>
                        <input type="number" step="0.01" name="total_price" value="{{ old('total_price', $reserve->total_price) }}" required
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>

                    <!-- Status do Pagamento -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status do Pagamento <span class="text-red-500">*</span></label>
                        <select name="status_pagamento" required
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                            <option value="pendente" {{ old('status_pagamento', $reserve->status_pagamento) === 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="pago" {{ old('status_pagamento', $reserve->status_pagamento) === 'pago' ? 'selected' : '' }}>Pago</option>
                        </select>
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6 border-t mt-8">
                    <a href="{{ route('admin.reserves.index') }}"
                        class="inline-flex justify-center py-2 px-6 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200">
                        Cancelar
                    </a>
                    <button type="submit" class="add-btn">
                        Actualizar Reserva
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
