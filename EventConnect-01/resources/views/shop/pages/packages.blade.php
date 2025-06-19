@extends('shop.layout.base')
@section('title', 'Pagina inicial')

@Section('content')

    <body>
        <div class="container">


            <div class="pacotes-section">
                <!-- Filtros -->
                <div class="search-filter-container">
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Buscar pacotes..." class="search-input">
                    </div>
                    <div class="filter-container">
                        <i class="fas fa-filter"></i>
                        <select class="filter-select">
                            <option value="">Filtrar por tipo de evento</option>
                            @foreach ($packages->pluck('eventType.name')->unique()->filter()->values() as $typeName)
                                <option value="{{ $typeName }}">{{ $typeName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Grid de Pacotes -->
                <div class="packages-grid">
                    @if ($packages->isEmpty())
                        <h1>Nenhum pacote encontrado</h1>
                    @else
                        @foreach ($packages as $package)
                            <div class="package-card">
                                <div class="package-header">
                                    <h2 class="package-title"><i class="fas fa-box"></i> {{ $package->name }}</h2>
                                </div>
                                <div class="package-body">
                                    <div class="package-price">
                                        <i class="fas fa-tag"></i>
                                        Preço: <span
                                            class="price-amount">R${{ number_format($package->total_price, 2, ',', '.') }}</span>
                                    </div>
                                    <div class="package-type">
                                        <i class="fas fa-briefcase"></i>
                                        {{ $package->eventType->name ?? 'Tipo não definido' }}
                                    </div>
                                </div>
                                <div class="package-footer">
                                    @php
                                        $packageData = [
                                            'name' => $package->name,
                                            'eventType' => $package->eventType->name ?? '-',
                                            'eventHall' => $package->eventHall->name ?? '-',
                                            'menu' => $package->menu->name ?? '-',
                                            'decoration' => $package->decoration->name ?? '-',
                                            'eventType_price' => $package->eventType->price ?? 0,
                                            'eventHall_price' => $package->eventHall->price ?? 0,
                                            'menu_price' => $package->menu->price ?? 0,
                                            'decoration_price' => $package->decoration->price ?? 0,
                                        ];
                                    @endphp

                                    <a class="details-link" href="{{route('shop.package.details')}}">
                                        Ver detalhes <i class="fas fa-eye"></i>
                                    </a>


                                    <div style="display: flex; gap: 0.5rem;">
                                        <a href="#" class="add-btn" onclick="">
                                            agendar
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Paginação placeholder -->
                <div class="pagination-container">
                    <button class="pagination-button page-prev"><i class="fas fa-chevron-left"></i> Anterior</button>
                    <button class="pagination-button page-number active">1</button>
                    <button class="pagination-button page-next">Próxima <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <style>
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #1f1f2e;
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(45deg, #8056FF, #FF56B1);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(45deg, #FF56B1, #0BC4E2);
            }
        </style>

        <body>

            <script>
                document.querySelector('.search-input').addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const packages = document.querySelectorAll('.package-card');

                    packages.forEach(pkg => {
                        const title = pkg.querySelector('.package-title').innerText.toLowerCase();
                        if (title.includes(searchTerm)) {
                            pkg.style.display = ''; // mostra
                        } else {
                            pkg.style.display = 'none'; // esconde
                        }
                    });
                });
            </script>

        @endsection
