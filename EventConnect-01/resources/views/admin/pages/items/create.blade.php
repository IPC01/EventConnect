@extends('admin.layout.base')

@section('title', 'Adicionar Item de Menu')

@section('content')
<main class="bg-gray-50">
    <div class="">
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Adicionar Novo Item de Menu</h2>  
            </div>

            <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Informações do Item -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Informações do Item</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Item <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Descrição <span class="text-red-500">*</span></label>
                            <input type="text" name="description" value="{{ old('description') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>
                    </div>
                </div>

                <!-- Categoria e Imagem -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Categoria e Imagem</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Categoria <span class="text-red-500">*</span></label>
                            <select name="category_id" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                                <option value="">Selecione uma Categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Imagem (Opcional)</label>
                            <input type="file" name="id_img" accept="image/*" class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6 border-t mt-8">
                    <a href="{{ route('admin.items.index') }}"
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
