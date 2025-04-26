
@extends('auth.layout.base')
@section('title', 'Registo')

@Section('content')
<body class="bg-gray-50 min-h-screen flex items-center justify-center overflow-hidden relative">
    <!-- Shapes decorativos -->
    <div class="shape1"></div>
    <div class="shape2"></div>
    
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-center max-w-6xl mx-auto">
            <!-- Left Column - Branding -->
            <div class="w-full lg:w-1/2 mb-10 lg:mb-0 lg:pr-10">
                <div class="text-center lg:text-left">
                   <div class="hidden lg:block">
                        <img src="{{asset('logotipo/logo1.png')}}" alt="Ilustração" class="max-w-full h-auto animate-float">
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Register Form -->
            <div class="w-full max-w-md">
                <div class="login-card rounded-2xl shadow-xl p-8 md:p-10">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Criar Conta</h2>
                        <p class="text-gray-600 mt-2">Preencha os campos abaixo para se registrar</p>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    
                        <!-- Nome -->
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nome</label>
                            <input id="name" name="name" type="text" placeholder="Seu Nome Completo" class="form-input w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none transition duration-200"
                                   value="{{ old('name') }}" required autofocus />
                            @error('name')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- E-mail -->
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">E-mail</label>
                            <input id="email" name="email" type="email" placeholder="seu@email.com" class="form-input w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none transition duration-200"
                                   value="{{ old('email') }}" required />
                            @error('email')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Senha -->
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Senha</label>
                            <input id="password" name="password" type="password" placeholder="••••••••" class="form-input w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none transition duration-200"
                                   required autocomplete="new-password" />
                            @error('password')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Confirmar Senha -->
                        <div class="mb-6">
                            <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirmar Senha</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" class="form-input w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none transition duration-200"
                                   required />
                        </div>
                        
                        <!-- Botão Registrar -->
                        <button type="submit" class="w-full bg-gradient py-3 px-4 rounded-lg text-white font-medium hover:opacity-90 transition-opacity shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Registrar
                        </button>
                    
                        <!-- Link para Login -->
                        <p class="mt-8 text-center text-gray-600 text-sm">
                            Já tem uma conta? <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-800">Entrar</a>
                        </p>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div class="mt-10 text-center text-gray-500 text-sm">
            &copy; 2025 EventConnect. Todos os direitos reservados.
        </div>
    </div>
</body>
@endsection


