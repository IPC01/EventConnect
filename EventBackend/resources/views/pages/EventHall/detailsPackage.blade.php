@extends('layouts.base')

@section('Content')
<div id="wrapper">
    <!-- Sidebar -->
    <!-- Include Navigation -->
    @include('components.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Include Navigation -->
            @include('components.nav')

            <!-- Conteúdo da Página -->
            <div class="container-fluid py-4">
                <!-- Cabeçalho do Pacote -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow border-0">
                            <div class="card-body p-0">
                          
                                <div class="p-4">
                                    <div class="d-flex align-items-center mb-3">
                                       <h5>{{$package->eventHall->name}}</h5>
                                        <div class="ms-auto">
                                            <h4 class="text-primary mb-0">{{$package->eventHall->price}} MZN Por Pessoa</h4>
                                            <small class="text-muted">para até {{$package->eventHall->capacity}} convidados</small>
                                        </div>
                                    </div>
                                    <p class="lead">{{$package->eventHall->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detalhes do Pacote em Abas -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow border-0 mb-4">
                            <div class="card-header bg-white py-3">
                                <ul class="nav nav-tabs card-header-tabs" id="detalhesTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active fw-medium" id="salao-tab" data-bs-toggle="tab" data-bs-target="#salao" type="button" role="tab" aria-controls="salao" aria-selected="true">
                                            <i class="fas fa-building me-2"></i>Salão
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-medium" id="decoracao-tab" data-bs-toggle="tab" data-bs-target="#decoracao" type="button" role="tab" aria-controls="decoracao" aria-selected="false">
                                            <i class="fas fa-paint-brush me-2"></i>Decoração
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-medium" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu" type="button" role="tab" aria-controls="menu" aria-selected="false">
                                            <i class="fas fa-utensils me-2"></i>Menu
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="detalhesTabContent">
                                    <!-- Conteúdo do Salão -->
                                    <div class="tab-pane fade show active" id="salao" role="tabpanel" aria-labelledby="salao-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3 class="h4 mb-3">{{$package->name}}</h3>
                                                <p>Nosso elegante salão de festas oferece um ambiente amplo e sofisticado para a realização do seu evento. Com arquitetura moderna e acabamentos de luxo, o espaço é versátil e pode ser adaptado para diferentes tipos de celebrações.</p>
                                                
                                                <h4 class="h5 mt-4 mb-3">Recursos do Salão</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Área de 450m²</li>
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Ar-condicionado central</li>
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Capacidade para 200 pessoas</li>
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Estacionamento privativo</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Sistema de som integrado</li>
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Iluminação cenográfica</li>
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Gerador de emergência</li>
                                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Wi-Fi de alta velocidade</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4">
                                                    <a href="#" class="btn btn-outline-primary">
                                                        <i class="fas fa-calendar-alt me-2"></i>Verificar disponibilidade
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="position-relative rounded overflow-hidden h-100" style="min-height: 300px;">
                                                    <div id="salaoCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#salaoCarousel" data-bs-slide-to="0" class="active"></button>
                                                            <button type="button" data-bs-target="#salaoCarousel" data-bs-slide-to="1"></button>
                                                            <button type="button" data-bs-target="#salaoCarousel" data-bs-slide-to="2"></button>
                                                        </div>
                                                        <div class="carousel-inner h-100">
                                                            @foreach($package->eventHall->images as $index => $image)
                                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} h-100">
                                                                    <img src="{{ asset('storage/' . $image->url_img) }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Imagem do Salão">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#salaoCarousel" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"></span>
                                                            <span class="visually-hidden">Anterior</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#salaoCarousel" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"></span>
                                                            <span class="visually-hidden">Próximo</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Conteúdo da Decoração -->
                                    <div class="tab-pane fade" id="decoracao" role="tabpanel" aria-labelledby="decoracao-tab">
                                        <div class="row">
                                            {{-- <div class="col-lg-6 order-lg-2">
                                                <h3 class="h4 mb-3">Decoração Personalizada</h3>
                                                <p>Nossa equipe de decoradores especializados criará um ambiente único e personalizado para o seu evento, com atenção aos mínimos detalhes e de acordo com suas preferências e estilo.</p>
                                                
                                                <div class="mt-4 mb-4">
                                                    <h4 class="h5 mb-3">Temas Disponíveis</h4>
                                                    <div class="row g-2">
                                                        <div class="col-6 col-md-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body text-center p-3">
                                                                    <i class="fas fa-crown text-warning fa-2x mb-2"></i>
                                                                    <h6 class="mb-0">Clássico Elegante</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body text-center p-3">
                                                                    <i class="fas fa-leaf text-success fa-2x mb-2"></i>
                                                                    <h6 class="mb-0">Jardim Romântico</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body text-center p-3">
                                                                    <i class="fas fa-water text-info fa-2x mb-2"></i>
                                                                    <h6 class="mb-0">Oceânico</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body text-center p-3">
                                                                    <i class="fas fa-moon text-primary fa-2x mb-2"></i>
                                                                    <h6 class="mb-0">Noite Estrelada</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body text-center p-3">
                                                                    <i class="fas fa-snowflake text-info fa-2x mb-2"></i>
                                                                    <h6 class="mb-0">Inverno Encantado</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body text-center p-3">
                                                                    <i class="fas fa-palette text-danger fa-2x mb-2"></i>
                                                                    <h6 class="mb-0">Personalizado</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <h4 class="h5 mt-4 mb-3">Incluso no Pacote</h4>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Decoração completa do ambiente</li>
                                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Arranjos florais para mesas</li>
                                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Toalhas e cobre-cadeiras de luxo</li>
                                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Iluminação temática</li>
                                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Decoração personalizada da mesa principal</li>
                                                </ul>
                                            </div> --}}
                                            <div class="col-lg-12 order-lg-1">
                                                <div class="masonry-gallery">
                                                    <div class="row g-3">
                                                        @foreach($package->decoration->images as $image) <!-- Corrigido o nome da variável para $image -->
                                                            <div class="col-6">
                                                             
                                                                <!-- Aqui, substituímos o caminho estático para um caminho dinâmico -->
                                                                <img src="{{ asset('storage/' . $image->url_img) }}" class="img-fluid rounded shadow" alt=" {{ $image->url_img }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="#" class="btn btn-outline-primary">
                                                        <i class="fas fa-images me-2"></i>Ver mais exemplos
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Conteúdo do Menu -->
                                    <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                                        <div class="container py-4">
                                            <div class="row mb-4">
                                                <div class="col-lg-12">
                                                    <h2 class="text-center mb-3">{{ $package->menu->name }}</h2>
                                                    <p class="text-center lead">{{ $package->menu->price }}</p>
                                                </div>
                                            </div>
                                    
                                            <div class="row">
                                                @php
                                                    use App\Models\Category;
                                    
                                                    $categories = [];
                                    
                                                    // Agrupar itens por categoria
                                                    foreach ($package->menu->items as $item) {
                                                        $categoryName = is_object($item->category) ? $item->category->name : 'Sem Categoria';
                                                        if (!isset($categories[$categoryName])) {
                                                            $categories[$categoryName] = [];
                                                        }
                                                        $categories[$categoryName][] = $item;
                                                    }
                                                @endphp
                                    
                                                @foreach ($categories as $categoryName => $items)
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="card h-100 shadow-sm">
                                                            <div class="card-header bg-light">
                                                                <h3 class="h5 mb-0">
                                                                    <i class="fas fa-circle me-2 text-primary"></i>{{ $categoryName }}
                                                                </h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <ul class="list-group list-group-flush">
                                                                    @foreach ($items as $item)
                                                                        <li class="list-group-item border-0">
                                                                            <i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>{{ $item->name }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                            <!-- End of Content Wrapper -->
                                            @include('components.footer')

                                        </div>  
@endsection