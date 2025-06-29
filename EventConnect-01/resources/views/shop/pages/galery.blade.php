@extends('shop.layout.base')
@section('title', 'Galeria Premium')

@section('content')
<body>
    <!-- Hero Section -->
    <section class="text-center py-10 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-cyan-500/20">
            <div class="container mx-auto px-4 mt-5">
                <div class="mt-5"></div>
                <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">
                    Explore uma coleção inspiradora de imagens impressionantes.
                </p>
            </div>
        </div>
    </section>

    <!-- Galeria -->
    <section class="container mx-auto px-4 pb-24 mt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-5">
            @foreach($images as $index => $image)
            <div class="group overflow-hidden rounded-2xl shadow-xl relative transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer"
                 onclick="openModal({{ $index }})">
                <img src="{{ asset('storage/' . $image->url_img) }}"
                     alt="Imagem {{ $index + 1 }}"
                     class="w-full h-full object-cover aspect-square transition duration-500 group-hover:brightness-110 group-hover:contrast-110">
                <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                
                <!-- Ícone de zoom -->
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                    </svg>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Botão "Carregar Mais" -->
        <div class="text-center mt-16">
            <button class="relative px-8 py-4 bg-gradient-to-r from-purple-600 via-purple-700 to-purple-800 text-white font-semibold rounded-full overflow-hidden transition transform hover:scale-105 shadow-lg hover:shadow-purple-500/30">
                <span class="relative z-10">Carregar Mais Imagens</span>
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-pink-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-full"></div>
                <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-700 rounded-full"></div>
            </button>
        </div>
    </section>

    <!-- Frame Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-4 bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header do Frame -->
            <div class="bg-gradient-to-r from-purple-600 to-cyan-500 p-4 flex justify-between items-center">
                <h3 class="text-white font-semibold text-lg">Galeria Premium</h3>
                <button onclick="closeModal()" class="bg-white/20 hover:bg-white/30 rounded-full p-2 transition-colors duration-200">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Conteúdo do Frame -->
            <div class="flex h-full">
                <!-- Área da Imagem -->
                <div class="flex-1 flex items-center justify-center p-4 bg-gray-50">
                    <img id="modalImage" src="" alt="" class="w-full h-full object-contain rounded-xl shadow-lg">
                </div>

                <!-- Painel de Controles -->
                <div class="w-80 bg-white border-l border-gray-200 flex flex-col">
                    <!-- Contador -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="text-center">
                            <span id="imageCounter" class="text-2xl font-bold text-gray-800">1 de {{ count($images) }}</span>
                            <p class="text-gray-500 mt-1">Imagem atual</p>
                        </div>
                    </div>

                    <!-- Botões de Navegação -->
                    <div class="flex-1 flex flex-col justify-center p-6 space-y-4">
                        <button onclick="previousImage()" class="w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white py-4 px-6 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <div class="flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span>Voltar</span>
                            </div>
                        </button>

                        <button onclick="nextImage()" class="w-full bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-600 hover:to-cyan-700 text-white py-4 px-6 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <div class="flex items-center justify-center space-x-2">
                                <span>Próxima</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Botão Close -->
                    <div class="p-6 border-t border-gray-200">
                        <button onclick="closeModal()" class="w-full bg-gray-600 hover:bg-gray-700 text-white py-3 px-6 rounded-xl font-semibold transition-colors duration-200">
                            Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const images = @json($images->map(function($image, $index) {
            return [
                'url' => asset('storage/' . $image->url_img),
                'alt' => 'Imagem ' . ($index + 1)
            ];
        }));
        
        let currentImageIndex = 0;

        function openModal(index) {
            currentImageIndex = index;
            updateModalImage();
            const modal = document.getElementById('imageModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
            document.body.style.overflow = 'auto';
        }

        function nextImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updateModalImage();
        }

        function previousImage() {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            updateModalImage();
        }

        function updateModalImage() {
            const modalImage = document.getElementById('modalImage');
            const imageCounter = document.getElementById('imageCounter');
            
            // Remover estilos de renderização antes de carregar nova imagem
            modalImage.style.imageRendering = 'auto';
            
            // Criar nova imagem para pré-carregar em alta qualidade
            const newImg = new Image();
            newImg.onload = function() {
                modalImage.src = this.src;
                modalImage.alt = images[currentImageIndex].alt;
                
                // Aplicar renderização otimizada após carregamento
                if (this.naturalWidth > 1000 || this.naturalHeight > 1000) {
                    modalImage.style.imageRendering = '-webkit-optimize-contrast';
                } else {
                    modalImage.style.imageRendering = 'crisp-edges';
                }
            };
            newImg.src = images[currentImageIndex].url;
            
            imageCounter.textContent = `${currentImageIndex + 1} de ${images.length}`;
        }

        // Navegação por teclado
        document.addEventListener('keydown', function(event) {
            if (!document.getElementById('imageModal').classList.contains('hidden')) {
                switch(event.key) {
                    case 'Escape':
                        closeModal();
                        break;
                    case 'ArrowLeft':
                        previousImage();
                        break;
                    case 'ArrowRight':
                        nextImage();
                        break;
                }
            }
        });

        // Fechar modal clicando no backdrop
        document.getElementById('imageModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script>
</body>
@endsection