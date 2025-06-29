@extends('shop.layout.base')
@section('title', 'Detalhes do Pacote')

@section('content')
    @php
        $menuid = $package->menu->id;
        $decorationid = $package->decoration->id;

        $menu = App\Models\Menu::with(['items.image'])->find($menuid);
        $decoration = App\Models\Decoration::with(['images'])->find($decorationid);
        $eventhall = $package->eventhall;
    @endphp

    <body class="bg-gray-50 min-h-screen ">
        <!-- Breadcrumb -->
        {{-- <div class="bg-white shadow-sm border-b">
            <div class="container mx-auto px-4 py-3">
                <nav class="flex items-center space-x-2 text-sm">
                    <a href="/" class="text-purple-600 hover:text-purple-800 transition-colors">Início</a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="/packages" class="text-purple-600 hover:text-purple-800 transition-colors">Pacotes</a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-600">{{ $package->name ?? 'Detalhes do Pacote' }}</span>
                </nav>
            </div>
        </div> --}}

        <div class="container mx-auto px-4 py-8 mt-5">
            <!-- Package Header -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 mt-5">
                <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white p-8">
                    <div class="flex flex-col lg:flex-row  lg:justify-between">
                        <div class="mb-4 lg:mb-0">
                            <h1 class="text-3xl lg:text-4xl font-bold mb-2">{{ $package->name ?? 'NaN' }}</h1>
                            <div class="flex items-left space-x-4 text-left">
                                <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-medium">
                                    {{ $package->eventType->name }}
                                </span>
                                {{-- <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-300 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="text-sm">4.8 (156 avaliações)</span>
                            </div> --}}
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold mb-2">
                                {{ number_format($package->total_price) }} MZN
                            </div>
                            <p class="text-purple-200">Preço total por Convidado</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">

                    <!-- Event Hall Details -->
                    @if (isset($eventhall))
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 text-white p-6">
                                <h2 class="text-2xl font-bold flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h3M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    Salão de Eventos
                                </h2>
                                <div class="mt-4 text-right">
                                    <div class="text-2xl font-bold text-purple-200">
                                        R$ {{ number_format($eventhall->price ?? 1200, 2, ',', '.') }}
                                    </div>
                                    <p class="text-sm text-white-500">Valor do salão por Convidado</p>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $eventhall->name }}</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-center text-gray-600">
                                                <svg class="w-5 h-5 mr-3 text-purple-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $eventhall->address }}
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <svg class="w-5 h-5 mr-3 text-purple-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                                    </path>
                                                </svg>
                                                Capacidade: {{ $eventhall->capacity }} pessoas
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <svg class="w-5 h-5 mr-3 text-purple-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                {{ $eventhall->phone }}
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <svg class="w-5 h-5 mr-3 text-purple-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                    </path>
                                                </svg>
                                                {{ $eventhall->email }}
                                            </div>
                                            @if ($eventhall->website)
                                                <div class="flex items-center text-gray-600">
                                                    <svg class="w-5 h-5 mr-3 text-purple-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                                        </path>
                                                    </svg>
                                                    <a href="{{ $eventhall->website }}" target="_blank"
                                                        class="text-purple-600 hover:text-purple-800">
                                                        Website do salão
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-gradient-to-br from-purple-50 to-cyan-50 rounded-lg p-4">
                                            <h4 class="font-semibold text-gray-800 mb-2">Descrição</h4>
                                            <p class="text-gray-600 text-sm leading-relaxed">
                                                {{ $eventhall->description ?? 'Salão elegante e moderno, perfeito para eventos especiais com toda infraestrutura necessária para tornar seu evento inesquecível.' }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Menu Details -->
                    @if (isset($menu) && $menu->items->count() > 0)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div
                                class="bg-gradient-to-r from-pink-500 to-pink-600 text-white p-6 flex justify-between items-center">
                                <h2 class="text-2xl font-bold flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                    Cardápio Incluso
                                </h2>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-purple-200">
                                        R$ {{ number_format($menu->price) }}
                                    </div>
                                    <p class="text-sm text-purple-300">Valor por Convidado</p>
                                </div>
                            </div>

                            <div class="p-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                                @foreach ($menu->items as $item)
                                    <div
                                        class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col hover:shadow-lg transition-shadow">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image->url_img) }}"
                                                alt="{{ $item->name }}" class="w-full h-32 object-cover">
                                        @else
                                            <div
                                                class="w-full h-32 bg-gradient-to-br from-pink-200 to-purple-200 flex items-center justify-center text-pink-600">
                                                <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="p-3 flex-1 flex flex-col justify-between">
                                            <div>
                                                <h3 class="text-md font-semibold text-gray-800 truncate">
                                                    {{ $item->name }}</h3>
                                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                                    {{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif



                    <!-- Decoration Details -->
                    @if (isset($decoration))
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6">
                                <h2 class="text-2xl font-bold flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                        </path>
                                    </svg>
                                    Decoração Incluída
                                </h2>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-purple-200">
                                        R$ {{ number_format($decoration->price ?? 1200, 2, ',', '.') }}
                                    </div>
                                    <p class="text-sm text-purple-300">Valor por Convidado</p>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="mb-6">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $decoration->name }}</h3>
                                    <p class="text-gray-600">
                                        {{ $decoration->description ?? 'Decoração elegante e personalizada para tornar seu evento único e memorável.' }}
                                    </p>
                                </div>

                                @if (isset($decoration->images) && $decoration->images->count() > 0)
                                    <div class="mb-6">
                                        <h4 class="font-semibold text-gray-800 mb-3">Galeria da Decoração</h4>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            @foreach ($decoration->images as $image)
                                                <div
                                                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                                    <img src="{{ asset('storage/' . $image->url_img ?? $image) }}"
                                                        alt="Decoração"
                                                        class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-300">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                    @endif

                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Booking Card -->
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-6">
                        <div class="text-center mb-6">
                            <div class="text-3xl font-bold text-purple-600 mb-2">
                                {{ number_format($package->total_price) }} MZN
                            </div>
                            <p class="text-gray-500">Pacote completo</p>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Salão</span>
                                <span class="font-semibold">
                                    {{ number_format($eventhall->price) }} MZN</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Cardápio</span>
                                <span class="font-semibold">R$
                                    {{ number_format($menu->price) }} MZN</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Decoração</span>
                                <span class="font-semibold">R$
                                    {{ number_format($decoration->price) }} MZN</span>
                            </div>
                            <div class="flex justify-between items-center py-2 font-bold text-lg">
                                <span>Total</span>
                                <span class="text-purple-600">R$
                                    {{ number_format($package->total_price) }} MZN</span>
                            </div>
                        </div>
                        @php
                            $packageScheduleData = [
                                'id' => $package->id,
                                'name' => $package->name,
                                'eventType' => $package->eventType->name ?? '-',
                                'price' =>$package->total_price,
                            ];
                            $types = App\Models\eventType::all();
                        @endphp
                        <button onclick='openScheduleModal(@json($packageScheduleData))'
                            class=" w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">



                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 11-8 0v-4h8v4z"></path>
                            </svg>
                            Agendar Agora


                        </button>

                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-500">Reserva gratuita • Cancelamento até 24h</p>
                        </div>
                    </div>




                    <!-- Features Card -->
                    {{-- <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">O que está incluído</h3>
                        <div class="space-y-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Salão completo por 8 horas
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Cardápio completo incluído
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Decoração personalizada
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Suporte durante o evento
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-weight="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Limpeza pós-evento
                            </div>
                        </div>
                    </div> --}}

                    <!-- Contact Card -->
                    <div class="bg-gradient-to-br from-purple-50 to-cyan-50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Dúvidas?</h3>
                        <p class="text-sm text-gray-600 mb-4">Entre em contato conosco para mais informações
                            .</p>
                        <button
                            class="w-full bg-white text-purple-600 border border-purple-200 hover:bg-purple-50 font-semibold py-2 px-4 rounded-lg transition-colors">
                            Falar com Consultor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
