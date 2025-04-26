<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Glamour | Salões de Festa</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        purple: {
                            light: '#e6e6fa',
                            DEFAULT: '#9932cc',
                            dark: '#6a0dad',
                            darker: '#4b0082',
                        },
                        accent: '#d8bfd8',
                    },
                    fontFamily: {
                        playfair: ['Playfair Display', 'serif'],
                        montserrat: ['Montserrat', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="font-montserrat bg-gray-50">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-gradient-to-r from-purple-darker to-purple-dark z-50 shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="font-playfair text-2xl font-bold text-white">Espaço Glamour</a>
            
            <ul class="hidden md:flex space-x-8">
                <li><a href="#" class="text-white hover:text-accent transition duration-300">Home</a></li>
                <li><a href="#" class="text-white hover:text-accent transition duration-300">Salões</a></li>
                <li><a href="#" class="text-white hover:text-accent transition duration-300">Serviços</a></li>
                <li><a href="#" class="text-white hover:text-accent transition duration-300">Contato</a></li>
            </ul>
            
            <div class="relative">
                <button class="flex items-center focus:outline-none">
                    <div class="w-10 h-10 rounded-full bg-accent flex items-center justify-center text-purple-dark">
                        <i class="fas fa-user"></i>
                    </div>
                </button>
                <!-- Dropdown menu would go here -->
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        <!-- Hero Carousel -->
        <section class="w-full bg-purple-darker">
            <div class="relative h-96 md:h-screen max-h-screen overflow-hidden">
                <div class="carousel absolute inset-0 flex transition-transform duration-700 ease-in-out">
                    <div class="w-full flex-shrink-0 bg-gradient-to-r from-purple-darker to-purple-dark relative">
                        <img src="/api/placeholder/1920/1080" alt="Salão de festas elegante" class="w-full h-full object-cover opacity-60">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center px-4">
                                <h1 class="font-playfair text-4xl md:text-6xl text-white mb-4 leading-tight">Espaço Glamour</h1>
                                <p class="text-xl md:text-2xl text-purple-light mb-8">Transforme seu evento em uma experiência inesquecível</p>
                                <a href="#" class="bg-gradient-to-r from-purple to-purple-dark text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transform hover:-translate-y-1 transition duration-300 inline-block">Agende agora</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/30 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/50 transition duration-300">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/30 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/50 transition duration-300">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                    <button class="w-3 h-3 rounded-full bg-white/70"></button>
                    <button class="w-3 h-3 rounded-full bg-white/30"></button>
                    <button class="w-3 h-3 rounded-full bg-white/30"></button>
                </div>
            </div>
        </section>

        <!-- Event Categories -->
        <section class="py-16 bg-gradient-to-b from-purple-darker/5 to-white">
            <div class="container mx-auto px-4">
                <h2 class="font-playfair text-3xl md:text-4xl text-center mb-12 text-purple-darker">Tipos de Eventos</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="group rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 text-center bg-white">
                        <div class="h-40 bg-purple/10 flex items-center justify-center">
                            <i class="fas fa-glass-cheers text-5xl text-purple"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="font-playfair text-xl text-purple-dark">Casamentos</h3>
                        </div>
                    </div>
                    <div class="group rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 text-center bg-white">
                        <div class="h-40 bg-purple/10 flex items-center justify-center">
                            <i class="fas fa-birthday-cake text-5xl text-purple"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="font-playfair text-xl text-purple-dark">Aniversários</h3>
                        </div>
                    </div>
                    <div class="group rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 text-center bg-white">
                        <div class="h-40 bg-purple/10 flex items-center justify-center">
                            <i class="fas fa-briefcase text-5xl text-purple"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="font-playfair text-xl text-purple-dark">Corporativos</h3>
                        </div>
                    </div>
                    <div class="group rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 text-center bg-white">
                        <div class="h-40 bg-purple/10 flex items-center justify-center">
                            <i class="fas fa-music text-5xl text-purple"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="font-playfair text-xl text-purple-dark">Formaturas</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Venues -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="font-playfair text-3xl md:text-4xl text-center mb-12 text-purple-darker">Salões em Destaque</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="group rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/api/placeholder/600/400" alt="Salão Cristal" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/80 to-transparent flex items-end">
                                <div class="p-4">
                                    <h3 class="font-playfair text-2xl text-white">Salão Cristal</h3>
                                    <p class="text-purple-light">Capacidade: 200 pessoas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/api/placeholder/600/400" alt="Salão Diamante" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/80 to-transparent flex items-end">
                                <div class="p-4">
                                    <h3 class="font-playfair text-2xl text-white">Salão Diamante</h3>
                                    <p class="text-purple-light">Capacidade: 350 pessoas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/api/placeholder/600/400" alt="Salão Ametista" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/80 to-transparent flex items-end">
                                <div class="p-4">
                                    <h3 class="font-playfair text-2xl text-white">Salão Ametista</h3>
                                    <p class="text-purple-light">Capacidade: 150 pessoas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-8">
                    <a href="#" class="bg-gradient-to-r from-purple to-purple-dark text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transform hover:-translate-y-1 transition duration-300 inline-block">Ver todos os salões</a>
                </div>
            </div>
        </section>

        <!-- Promotions -->
        <section class="py-16 bg-gradient-to-r from-purple-light/30 to-accent/30">
            <div class="container mx-auto px-4">
                <h2 class="font-playfair text-3xl md:text-4xl text-center mb-12 text-purple-darker">Promoções Especiais</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="/api/placeholder/600/300" alt="Pacote Casamento" class="w-full h-64 object-cover">
                            <div class="absolute top-4 right-4 bg-purple-dark text-white px-4 py-2 rounded-full text-sm font-bold">
                                Termina em: 5 dias
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-playfair text-2xl text-purple-dark mb-2">Pacote Casamento</h3>
                            <p class="text-gray-700 mb-4">Inclui decoração, buffet e DJ para até 150 convidados.</p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-500 line-through">R$ 15.000</span>
                                    <span class="font-bold text-purple-dark text-xl ml-2">R$ 12.500</span>
                                </div>
                                <a href="#" class="bg-gradient-to-r from-purple to-purple-dark text-white px-4 py-2 rounded-full font-semibold hover:shadow-lg transform hover:-translate-y-1 transition duration-300">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="/api/placeholder/600/300" alt="Pacote Aniversário" class="w-full h-64 object-cover">
                            <div class="absolute top-4 right-4 bg-purple-dark text-white px-4 py-2 rounded-full text-sm font-bold">
                                Termina em: 3 dias
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-playfair text-2xl text-purple-dark mb-2">Pacote Aniversário</h3>
                            <p class="text-gray-700 mb-4">Inclui decoração temática, buffet e animação para até 100 convidados.</p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-500 line-through">R$ 9.000</span>
                                    <span class="font-bold text-purple-dark text-xl ml-2">R$ 7.500</span>
                                </div>
                                <a href="#" class="bg-gradient-to-r from-purple to-purple-dark text-white px-4 py-2 rounded-full font-semibold hover:shadow-lg transform hover:-translate-y-1 transition duration-300">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Food Gallery -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="font-playfair text-3xl md:text-4xl text-center mb-12 text-purple-darker">Gastronomia</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="relative overflow-hidden rounded-lg shadow-md group h-48">
                        <img src="/api/placeholder/400/300" alt="Prato Gourmet" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                            <div class="p-3">
                                <h3 class="font-playfair text-white text-lg">Entrada Gourmet</h3>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group h-48">
                        <img src="/api/placeholder/400/300" alt="Prato Principal" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                            <div class="p-3">
                                <h3 class="font-playfair text-white text-lg">Prato Principal</h3>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group h-48">
                        <img src="/api/placeholder/400/300" alt="Sobremesa" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                            <div class="p-3">
                                <h3 class="font-playfair text-white text-lg">Sobremesas</h3>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group h-48">
                        <img src="/api/placeholder/400/300" alt="Bebidas" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                            <div class="p-3">
                                <h3 class="font-playfair text-white text-lg">Bebidas</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Food Categories -->
        <section class="py-16 bg-gradient-to-b from-purple-dark/5 to-white">
            <div class="container mx-auto px-4">
                <h2 class="font-playfair text-3xl md:text-4xl text-center mb-12 text-purple-darker">Categorias de Cardápio</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="w-24 h-24 rounded-full bg-purple-light mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-utensils text-3xl text-purple-dark"></i>
                        </div>
                        <h3 class="font-playfair text-xl text-purple-dark mb-2">Clássico</h3>
                        <p class="text-gray-600 text-sm">Buffet tradicional com opções variadas</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 rounded-full bg-purple-light mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-leaf text-3xl text-purple-dark"></i>
                        </div>
                        <h3 class="font-playfair text-xl text-purple-dark mb-2">Vegetariano</h3>
                        <p class="text-gray-600 text-sm">Opções exclusivas para vegetarianos</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 rounded-full bg-purple-light mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-globe-americas text-3xl text-purple-dark"></i>
                        </div>
                        <h3 class="font-playfair text-xl text-purple-dark mb-2">Internacional</h3>
                        <p class="text-gray-600 text-sm">Pratos de diversas culinárias</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 rounded-full bg-purple-light mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-cheese text-3xl text-purple-dark"></i>
                        </div>
                        <h3 class="font-playfair text-xl text-purple-dark mb-2">Finger Food</h3>
                        <p class="text-gray-600 text-sm">Pequenos pratos sofisticados</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="font-playfair text-3xl md:text-4xl text-center mb-12 text-purple-darker">Galeria de Eventos</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="/api/placeholder/400/300" alt="Evento 1" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="/api/placeholder/400/300" alt="Evento 2" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="/api/placeholder/400/300" alt="Evento 3" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="/api/placeholder/400/300" alt="Evento 4" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="/api/placeholder/400/300" alt="Evento 5" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-md group">
                        <img src="/api/placeholder/400/300" alt="Evento 6" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-darker/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    </div>
                </div>
                <div class="text-center mt-8">
                    <a href="#" class="bg-gradient-to-r from-purple to-purple-dark text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transform hover:-translate-y-1 transition duration-300 inline-block">Ver galeria completa</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-purple-darker to-purple-dark text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-playfair text-2xl mb-4">Espaço Glamour</h3>
                    <p class="text-purple-light mb-4">Transformando momentos em memórias inesquecíveis.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-accent transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white hover:text-accent transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-white hover:text-accent transition duration-300">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-playfair text-xl mb-4">Links Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-purple-light hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="text-purple-light hover:text-white transition duration-300">Salões</a></li>
                        <li><a href="#" class="text-purple-light hover:text-white transition duration-300">Serviços</a></li>
                        <li><a href="#" class="text-purple-light hover:text-white transition duration-300">Galeria</a></li>
                        <li><a href="#" class="text-purple-light hover:text-white transition duration-300">Contato</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-playfair text-xl mb-4">Contato</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <span>Av. Elegância, 1000 - Jardim Luxo</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-2"></i>
                            <span>(11) 99999-9999</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-2"></i>
                            <span>contato@espacoglamour.com</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-playfair text-xl mb-4">Newsletter</h4>
                    <p class="text-purple-light mb-4">Receba nossas novidades e promoções exclusivas.</p>
                    <form>
                        <div class="flex flex-col sm:flex-row">
                            <input type="email" placeholder="Seu e-mail" class="px-4 py-2 w-full sm:w-auto rounded-l-full focus:outline-none text-purple-darker">
                            <button type="submit" class="bg-accent text-purple-darker font-semibold px-4 py-2 rounded-r-full mt-2 sm:mt-0">Assinar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border-t border-purple-light/30 mt-8 pt-8 text-center">
                <p class="text-purple-light">© 2025 Espaço Glamour. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Simple JS for carousel -->
    <script>
        // This would be replaced with a proper carousel implementation
        // This is just a placeholder to show the concept
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Carousel initialized');
        });
    </script>
</body>
</html>  