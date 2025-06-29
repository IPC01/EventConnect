@extends('admin.layout.base')

@section('title', 'Cadastrar Salão de Evento')

@section('content')
<main class="bg-gray-50">
    <div class="">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Cadastrar Novo Salão de Evento</h2>
            </div>

            <form action="{{ route('admin.hall.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Informações Básicas do Salão -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Informações Básicas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Salão <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Endereço <span class="text-red-500">*</span></label>
                            <input type="text" name="address" value="{{ old('address') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>
                    </div>
                </div>

                <!-- Capacidade e Preço -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Capacidade e Preço</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Capacidade <span class="text-red-500">*</span></label>
                            <input type="number" name="capacity" value="{{ old('capacity') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Preço <span class="text-red-500">*</span></label>
                            <input type="number" name="price" value="{{ old('price') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>
                    </div>
                </div>

                <!-- Imagens do Salão -->
                <div class="" >
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Imagens do Salão e Website</h3>
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Imagens <span class="text-gray-500">(máximo de 5 imagens)</span></label>
                        <input type="file" name="images[]" multiple accept="image/*"
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                        <input type="url" name="website" value="{{ old('website') }}"
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Contato -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Informações de Contato</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefone <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>
                    </div>
                </div>

                <!-- Descrição e Site -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Descrição </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Descrição <span class="text-red-500">*</span></label>
                            <textarea name="description" required rows="4" class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">{{ old('description') }}</textarea>
                        </div>

                      
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6 border-t mt-8">
                    <a href="{{ route('admin.hall.index') }}"
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
