<!-- Navigation -->
<nav class="bg-white shadow-md" style="height: 70px" x-data="{ openDropdown: false }">
    <div class="container flex justify-between items-center py-3">
        <div class="flex items-center">
            <div class="flex items-center">
               
                    <img src="{{asset('favicon.ico')}}" alt="" srcset="">
                     <div class="logo-text">
                       <h1><span class="logo-text-blue">Event</span><span class="logo-text-purple">Connect</span></h1>
                     </div>
               
            </div>
        </div>

        <div class="hidden md:flex space-x-6 mt-5">
            <a href="{{route('shop')}}" class="text-gray-700 hover:text-purple-500">Início</a>
            <a href="#" class="text-gray-700 hover:text-purple-500">Busca Avancada</a>
            <a href="{{route('shop.galery')}}" class="text-gray-700 hover:text-purple-500">Galeria</a>
            <a href="{{route('shop.package')}}" class="text-gray-700 hover:text-purple-500">Pacotes</a>
            <a href="#" class="text-gray-700 hover:text-purple-500">Saloes de eventos</a>
        </div>

        <div class="flex items-center space-x-4">
            @auth
                <!-- Se o usuário estiver logado -->
                <div class="relative" id="avatarDropdownWrapper">
                    <button id="avatarButton" class="flex items-center space-x-2 focus:outline-none">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/image.png') }}" alt="Avatar" class="w-10 h-10 rounded-full object-cover">
                    </button>
        
                    <!-- Dropdown -->
                    <div 
                        id="avatarDropdown" 
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50 hidden"
                    >
        
                        @if(Auth::user()->is_admin )
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Entrar como Admin</a>
                        @endif
                        
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                        <a href="{{ route('profile.orders') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pedidos</a>
                        <a href="{{ route('user.reservations.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Reservas</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
        
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const avatarButton = document.getElementById('avatarButton');
                        const avatarDropdown = document.getElementById('avatarDropdown');
        
                        avatarButton.addEventListener('click', function (e) {
                            e.stopPropagation();
                            avatarDropdown.classList.toggle('hidden');
                        });
        
                        document.addEventListener('click', function (e) {
                            if (!avatarDropdown.contains(e.target) && !avatarButton.contains(e.target)) {
                                avatarDropdown.classList.add('hidden');
                            }
                        });
                    });
                </script>
            @else
                <!-- Se o user NÃO estiver logado -->
                <a href="{{ route('login') }}" class="hidden md:block px-4 py-2 rounded-md text-gray-700 hover:text-purple-500">Entrar</a>
                <a href="{{ route('register') }}" class="px-6 py-2 rounded-md btn-primary text-white font-medium hover:shadow-lg">Registrar</a>
                <button class="md:hidden text-gray-700">
                    <span class="fas fa-bars"></span>
                </button>
            @endauth
        </div>
        
    </div>
</nav>
