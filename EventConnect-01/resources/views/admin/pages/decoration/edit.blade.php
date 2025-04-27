@extends('admin.layout.base')

@section('title', 'Editar Decoração')

@section('content')
<main class="bg-gray-50">
    <div class="">
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Editar Decoração</h2>
            </div>

            <form action="{{ route('admin.decorations.update', $decoration->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nome da Decoração -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Decoração <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $decoration->name) }}" required
                        class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                </div>

                <!-- Descrição -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                    <textarea name="description" rows="4"
                        class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">{{ old('description', $decoration->description) }}</textarea>
                </div>

                <!-- Preço -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Preço (MZN) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" step="0.01" value="{{ old('price', $decoration->price) }}" required
                        class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                </div>

                <!-- Imagem Principal Atual -->
                @if ($decoration->base_img)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Imagem Principal Atual</label>
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $decoration->base_img) }}" alt="Imagem Principal" class="h-32 rounded-md">
                        </div>
                    </div>
                @endif

                <!-- Trocar Imagem Principal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Trocar Imagem Principal</label>
                    <input type="file" name="base_img"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                               file:rounded-md file:border-0
                               file:text-sm file:font-semibold
                               file:bg-cyan-50 file:text-cyan-700
                               hover:file:bg-cyan-100">
                </div>

                <!-- Adicionar Imagens Adicionais -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Adicionar Novas Imagens Adicionais</label>
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
                        Actualizar
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection
