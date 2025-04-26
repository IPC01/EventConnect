
@extends('auth.layout.base')
@section('title', 'Login')

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
            
            <!-- Right Column - Login Form -->
            <div class="w-full max-w-md">
                <div class="login-card rounded-2xl shadow-xl p-8 md:p-10">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Bem-vindo de volta</h2>
                        <p class="text-gray-600 mt-2">Acesse sua conta para continuar</p>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <!-- E-mail -->
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">E-mail</label>
                            <div class="relative">
                                <input id="email" class="form-input pl-10 w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none transition duration-200"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autofocus
                                       autocomplete="username" />
                                @error('email')
                                    <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Senha -->
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Senha</label>
                            <div class="relative">
                                <input id="password" class="form-input pl-10 w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none transition duration-200"
                                       type="password"
                                       name="password"
                                       required autocomplete="current-password" />
                                @error('password')
                                    <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Lembrar de mim -->
                        <div class="flex items-center mb-6">
                            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Lembrar de mim</label>
                        </div>
                    
                        <!-- Botão Entrar -->
                        <button type="submit" class="w-full bg-gradient py-3 px-4 rounded-lg text-white font-medium hover:opacity-90 transition-opacity shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Entrar
                        </button>
                    
                        <div class="my-6 flex items-center">
                            <div class="flex-grow h-px bg-gray-300"></div>
                            <span class="mx-4 text-gray-500 text-sm">ou continue com</span>
                            <div class="flex-grow h-px bg-gray-300"></div>
                        </div>
                    
                        <!-- Botões de Login Social -->
                        <div class="grid grid-cols-2 gap-2">
                            <button type="button" class="py-2 px-4 flex justify-center items-center bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-red-600" viewBox="0 0 24 24">
                                    <path d="M12 2.04c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm-1.9 15h-2.8v-7.7h2.8v7.7zm-1.4-8.7c-1 0-1.8-.8-1.8-1.8s.8-1.8 1.8-1.8c1 0 1.8.8 1.8 1.8s-.8 1.8-1.8 1.8zm9.4 8.7h-2.8v-4.5c0-1.1-.9-1.9-1.9-1.9s-1.9.9-1.9 1.9v4.5h-2.8v-7.7h2.8v1.1c.8-1.1 2.2-1.1 3-0.2 1 1 1.1 2.7.5 3.8l-.5.8z"/>
                                </svg>
                            </button>
                            
                            <button type="button" class="py-2 px-4 flex justify-center items-center bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-blue-800" viewBox="0 0 24 24">
                                    <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                                </svg>
                            </button>
                            
                        </div>
                    
                        <!-- Link para Registro -->
                        <p class="mt-8 text-center text-gray-600 text-sm">
                            Não tem uma conta? <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-800">Registre-se</a>
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
