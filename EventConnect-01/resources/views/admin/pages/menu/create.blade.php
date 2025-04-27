@extends('admin.layout.base')

@section('title', 'Adicionar Menu')

@section('content')
<main class="bg-gray-50">
    <div class="">
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Adicionar Novo Menu</h2>  
            </div>

            <form action="{{ route('admin.menus.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nome do Menu -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Informações do Menu</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Menu <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Preço do Menu -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Preço</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Preço <span class="text-red-500">*</span></label>
                        <input type="number" name="price" value="{{ old('price') }}" required
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Itens do Menu -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Itens do Menu</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Selecione os Itens <span class="text-red-500">*</span></label>
                        <select name="items[]" multiple required
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" {{ in_array($item->id, old('items', [])) ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-gray-500">Segure a tecla Ctrl (ou Cmd) para selecionar múltiplos itens.</small>
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6 border-t mt-8">
                    <a href="{{ route('admin.menus.index') }}"
                        class="inline-flex justify-center py-2 px-6 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200">
                        Cancelar
                    </a>
                    <button type="submit" class="add-btn">
                        Salvar
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection
