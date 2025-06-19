@extends('shop.layout.base')
@section('title', 'Galeria Premium')

@section('content')
<body >

    <!-- Hero Section -->
    <section class="text-center py-10 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-cyan-500/20  "> 
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
            <div class="group overflow-hidden rounded-2xl shadow-xl relative transform hover:scale-105 transition duration-300 ease-in-out">
                <img src="{{ asset('storage/' . $image->url_img) }}"
                     alt="Imagem {{ $index + 1 }}"
                     class="w-full h-full object-cover aspect-square transition duration-500 group-hover:brightness-110 group-hover:contrast-110">
                <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
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

    <!-- Estilo Customizado -->


</body>
      
@endsection
