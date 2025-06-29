@extends('shop.layout.base')

@section('title', 'Meu Perfil')

@section('content')
<main class="container mx-auto px-4 py-8 max-w-5xl">
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden mt-5">
        <!-- Header com gradiente mantido -->
        <div class="bg-gradient-to-r from-purple-600 to-cyan-500 p-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Meu Perfil</h1>
                    <p class="text-purple-100 mt-1">Gerencie suas informações pessoais e configurações</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informações Pessoais -->
        <div class="p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Informações Pessoais</h2>
                <p class="text-gray-600">Atualize seus dados pessoais e foto de perfil</p>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Foto de Perfil - Seção destacada -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Foto de Perfil</h3>
                    <div class="flex items-center space-x-6">
                        <div class="flex-shrink-0">
                            @if($user->image)
                                <img src="{{ asset('storage/' . $user->image->url_img) }}" 
                                     class="w-24 h-24 object-cover rounded-full shadow-lg border-4 border-white">
                            @else
                                <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-cyan-400 rounded-full shadow-lg border-4 border-white flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Escolher nova foto</label>
                            <input type="file" name="avatar" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition-colors">
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG até 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Campos do formulário -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Nome -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nome Completo</label>
                        <div class="relative">
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required 
                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition-all duration-300 bg-white shadow-sm hover:border-purple-300 placeholder-gray-400"
                                   placeholder="Digite seu nome completo">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Email (readonly) -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <input type="email" name="email" value="{{ $user->email }}" readonly 
                                   class="w-full pl-12 pr-12 py-4 bg-gray-100 border-2 border-gray-200 rounded-2xl text-gray-600 shadow-sm cursor-not-allowed">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <span>O email não pode ser alterado</span>
                        </p>
                    </div>

                    <!-- Telefone -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Telefone</label>
                        <div class="relative">
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" 
                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition-all duration-300 bg-white shadow-sm hover:border-purple-300 placeholder-gray-400"
                                   placeholder="(11) 99999-9999">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Endereço</label>
                        <div class="relative">
                            <input type="text" name="address" value="{{ old('address', $user->address) }}" 
                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition-all duration-300 bg-white shadow-sm hover:border-purple-300 placeholder-gray-400"
                                   placeholder="Rua, número, bairro, cidade">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botão de atualizar -->
                <div class="flex justify-end pt-6 border-t border-gray-200">
                    <button type="submit" 
                            class="bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-700 hover:to-cyan-600 text-white font-semibold px-8 py-4 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:ring-4 focus:ring-purple-200">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <span>Atualizar Dados</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Seção Segurança e Configurações em Flex -->
        <div class="border-t border-gray-200 p-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Alterar Senha -->
                <div class="flex-1">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2 flex items-center space-x-2">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Segurança</span>
                        </h2>
                        <p class="text-gray-600">Altere sua senha para manter sua conta segura</p>
                    </div>

                    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-6 border border-cyan-100">
                        <form action="{{ route('profile.password') }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nova Senha</label>
                                <div class="relative">
                                    <input type="password" name="password" required 
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-cyan-100 focus:border-cyan-400 transition-all duration-300 bg-white shadow-sm hover:border-cyan-300 placeholder-gray-400"
                                           placeholder="Digite sua nova senha">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Nova Senha</label>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" required 
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-cyan-100 focus:border-cyan-400 transition-all duration-300 bg-white shadow-sm hover:border-cyan-300 placeholder-gray-400"
                                           placeholder="Confirme sua nova senha">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-semibold py-4 px-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:ring-4 focus:ring-cyan-200">
                                <span class="flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Atualizar Senha</span>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Zona de Perigo -->
                <div class="flex-1">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-red-600 mb-2 flex items-center space-x-2">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <span>Zona de Perigo</span>
                        </h2>
                        <p class="text-red-700">Ações irreversíveis que afetam permanentemente sua conta</p>
                    </div>

                    <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-6 border-2 border-red-200">
                        <div class="bg-white border border-red-200 rounded-xl p-6 shadow-sm">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Apagar Conta</h3>
                                    <p class="text-gray-700 mb-6 leading-relaxed">Uma vez que você apagar sua conta, todos os seus dados serão permanentemente removidos. Esta ação não pode ser desfeita.</p>
                                    
                                    <form action="{{ route('profile.destroy') }}" method="POST" 
                                          onsubmit="return confirm('Tem certeza que deseja apagar sua conta? Esta ação é irreversível e todos os seus dados serão perdidos permanentemente.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:ring-4 focus:ring-red-200">
                                            <span class="flex items-center justify-center space-x-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                <span>Apagar Minha Conta</span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection