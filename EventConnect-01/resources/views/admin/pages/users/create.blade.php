@extends('admin.layout.base')

@section('title', 'Adicionar Usuário')

@section('content')
<main class=" bg-gray-50">
    <div class="">
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Adicionar Novo Usuário</h2>  
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Informações Pessoais -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Informações Pessoais</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome Completo <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="">
                        </div>
                    </div>
                </div>

                <!-- Senha -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Senha de Acesso</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Senha <span class="text-red-500">*</span></label>
                            <input type="password" name="password" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha <span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>
                    </div>
                </div>

                <!-- Contato e Função -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Contato e Função</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefone <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Função <span class="text-red-500">*</span></label>
                            <select name="id_role" required
                                class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                                <option value="">Selecione uma função</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('id_role') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6 border-t mt-8">
                    <a href="{{ route('admin.users.index') }}"
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
