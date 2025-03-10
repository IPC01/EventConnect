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
                                    <div class="tab-pane fade" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3 class="h4 mb-3">Gastronomia de Excelência</h3>
                                                <p>Nossa equipe de chefs renomados preparará um cardápio exclusivo para seu evento, com ingredientes selecionados e apresentação impecável. Oferecemos opções para todos os gostos e restrições alimentares.</p>
                                                
                                                <div class="menu-categories mt-4">
                                                    <div class="accordion" id="menuAccordion">
                                                        <!-- Entradas -->
                                                        {{$package->menu}} ...
                                                        <div class="accordion-item border-0 mb-3 shadow-sm">
                                                            <h2 class="accordion-header" id="entradasHeading">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#entradasCollapse" aria-expanded="true" aria-controls="entradasCollapse">
                                                                    <i class="fas fa-seedling me-2 text-success"></i>
                                                                </button>
                                                            </h2>
                                                            <div id="entradasCollapse" class="accordion-collapse collapse show" aria-labelledby="entradasHeading">
                                                                <div class="accordion-body">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Canapés de salmão defumado com cream cheese</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Bruschettas de tomate e manjericão</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Carpaccio de carne com molho de alcaparras</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Mini quiches de queijo brie e cogumelos</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Espetinhos de camarão grelhado com molho cítrico</span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Pratos Principais -->
                                                        <div class="accordion-item border-0 mb-3 shadow-sm">
                                                            <h2 class="accordion-header" id="pratosPrincipaisHeading">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pratosPrincipaisCollapse" aria-expanded="false" aria-controls="pratosPrincipaisCollapse">
                                                                    <i class="fas fa-utensils me-2 text-danger"></i>Pratos Principais (escolha 3 opções)
                                                                </button>
                                                            </h2>
                                                            <div id="pratosPrincipaisCollapse" class="accordion-collapse collapse" aria-labelledby="pratosPrincipaisHeading">
                                                                <div class="accordion-body">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Medalhão de filé mignon ao molho de vinho tinto</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Salmão grelhado com crosta de ervas</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Risoto de cogumelos selvagens</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Escalope de frango recheado com queijo e espinafre</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Ravioli de queijos nobres ao molho de tomate fresco</span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Sobremesas -->
                                                        <div class="accordion-item border-0 mb-3 shadow-sm">
                                                            <h2 class="accordion-header" id="sobremesasHeading">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sobremesasCollapse" aria-expanded="false" aria-controls="sobremesasCollapse">
                                                                    <i class="fas fa-ice-cream me-2 text-warning"></i>Sobremesas (escolha 3 opções)
                                                                </button>
                                                            </h2>
                                                            <div id="sobremesasCollapse" class="accordion-collapse collapse" aria-labelledby="sobremesasHeading">
                                                                <div class="accordion-body">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Petit gateau de chocolate com sorvete de baunilha</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Cheesecake de frutas vermelhas</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Tiramisu tradicional</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Profiteroles com calda de chocolate</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Mousse de maracujá com calda de frutas vermelhas</span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Bebidas -->
                                                        <div class="accordion-item border-0 shadow-sm">
                                                            <h2 class="accordion-header" id="bebidasHeading">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bebidasCollapse" aria-expanded="false" aria-controls="bebidasCollapse">
                                                                    <i class="fas fa-glass-cheers me-2 text-info"></i>Bebidas (inclusas no pacote)
                                                                </button>
                                                            </h2>
                                                            <div id="bebidasCollapse" class="accordion-collapse collapse" aria-labelledby="bebidasHeading">
                                                                <div class="accordion-body">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Água mineral com e sem gás</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Refrigerantes tradicionais e zero</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Sucos naturais (3 sabores)</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Cerveja premium (2 opções)</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Vinho tinto e branco selecionados</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Espumante para brinde</span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item border-0 ps-0">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <span><i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>Serviço de bar com 2 opções de drinks</span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @include('components.footer')

                                            </div>
                                            <!-- End of Content Wrapper -->
                                        
                                        </div>  
                                        @endsection