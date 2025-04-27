@extends('admin.layout.base')

@section('title', 'Adicionar Decoração')

@section('content')
<main class="bg-gray-50">
    <div class="">
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Adicionar Nova Decoração</h2>
            </div>

            <form action="{{ route('admin.decorations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Nome da Decoração -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Decoração <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                </div>

                <!-- Descrição -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                    <textarea name="description" rows="4"
                        class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">{{ old('description') }}</textarea>
                </div>

                <!-- Preço -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Preço (MZN) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" step="0.01" value="{{ old('price') }}" required
                        class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                </div>

                <!-- Imagem Principal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Imagem Principal</label>
                    <input type="file" name="base_img"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                               file:rounded-md file:border-0
                               file:text-sm file:font-semibold
                               file:bg-cyan-50 file:text-cyan-700
                               hover:file:bg-cyan-100">
                </div>

                <!-- Imagens Adicionais -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Imagens Adicionais</label>
                    <input type="file" name="additional_images[]" multiple
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                               file:rounded-md file:border-0
                               file:text-sm file:font-semibold
                               file:bg-cyan-50 file:text-cyan-700
                               hover:file:bg-cyan-100">
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6 border-t mt-8">
                    <a href="{{ route('admin.decorations.index') }}"
                        class="inline-flex justify-center py-2 px-6 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="add-btn">
                        Salvar
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection
