<!-- resources/views/components/nav.blade.php -->

<nav class="bg-white shadow-md fixed w-full z-50">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <span class="text-amber-700 font-serif text-3xl font-bold">Elegance</span>
                    <span class="text-gray-700 font-serif ml-1 text-xl">Events</span>
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-amber-600 font-medium transition duration-300">Home</a>
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-amber-600 font-medium transition duration-300">Sobre</a>
                <div class="relative group">
                    <button class="text-gray-700 hover:text-amber-600 font-medium transition duration-300 flex items-center">
                        Serviços
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-50">
                        <div class="py-1">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600">Decoração</a>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600">Gastronomia</a>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600">Espaços</a>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600">Ver Todos</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-amber-600 font-medium transition duration-300">Promoções</a>
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-amber-600 font-medium transition duration-300">Galeria</a>
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-amber-600 font-medium transition duration-300">Contato</a>
            </div>

            <!-- Botão CTA -->
            <div class="hidden md:block">
                <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition duration-300">Solicitar Orçamento</a>
            </div>

            <!-- Menu Mobile Toggle -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-amber-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="md:hidden hidden pb-4">
            <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600 font-medium border-b border-gray-100">Home</a>
            <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600 font-medium border-b border-gray-100">Sobre</a>
            
            <!-- Menu Dropdown Mobile -->
            <div class="relative">
                <button id="services-dropdown" class="flex justify-between items-center w-full py-2 text-gray-700 font-medium border-b border-gray-100">
                    Serviços
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="services-menu" class="hidden pl-4">
                    <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600">Decoração</a>
                    <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600">Gastronomia</a>
                    <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600">Espaços</a>
                    <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600">Ver Todos</a>
                </div>
            </div>
            
            <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600 font-medium border-b border-gray-100">Promoções</a>
            <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600 font-medium border-b border-gray-100">Galeria</a>
            <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-amber-600 font-medium border-b border-gray-100">Contato</a>
            <div class="mt-4">
                <a href="{{ route('dashboard') }}" class="block text-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition duration-300">Solicitar Orçamento</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Services dropdown toggle for mobile
    document.getElementById('services-dropdown').addEventListener('click', function() {
        document.getElementById('services-menu').classList.toggle('hidden');
    });
</script>