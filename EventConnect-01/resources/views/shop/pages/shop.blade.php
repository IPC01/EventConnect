@extends('shop.layout.base')
@section('title', 'Pagina inicial')

@Section('content')

<body>
   

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Encontre o salão perfeito para seu evento</h1>
                <p class="hero-subtitle">Planeje seu evento dos sonhos com facilidade. Escolha entre os melhores salões, gastronomia e decoração em um só lugar.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary">Agendar Agora</a>
                    <a href="#venues" class="btn btn-outline">Ver Salões</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://via.placeholder.com/600x400" alt="Elegant Event Venue">
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <div class="search-card">
                <div class="search-grid">
                    <div class="search-field">
                        <label class="search-label">Local</label>
                        <select class="search-select">
                            <option>Todas as cidades</option>
                            <option>São Paulo</option>
                            <option>Rio de Janeiro</option>
                            <option>Belo Horizonte</option>
                        </select>
                    </div>
                    <div class="search-field">
                        <label class="search-label">Tipo de Evento</label>
                        <select class="search-select">
                            <option>Todos os eventos</option>
                            <option>Casamento</option>
                            <option>Formatura</option>
                            <option>Corporativo</option>
                            <option>Aniversário</option>
                        </select>
                    </div>
                    <div class="search-field">
                        <label class="search-label">Capacidade</label>
                        <select class="search-select">
                            <option>Qualquer tamanho</option>
                            <option>Até 50 pessoas</option>
                            <option>50-100 pessoas</option>
                            <option>100-200 pessoas</option>
                            <option>Mais de 200 pessoas</option>
                        </select>
                    </div>
                    <div class="search-field">
                        <label class="search-label">Data</label>
                        <input type="date" class="search-input">
                    </div>
                </div>
                <div class="search-button">
                    <button class="btn btn-primary">Buscar Salões</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Venues -->
    <section id="venues" class="section section-gray">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Salões em Destaque</h2>
                <p class="section-subtitle">Descubra os melhores salões para seu evento, com localização privilegiada e infraestrutura completa.</p>
            </div>
            
            <div class="card-grid">
                <!-- Venue Card 1 -->
                <div class="card">
                    <div class="card-image">
                        <img src="https://via.placeholder.com/400x250" alt="Salão Crystal Palace">
                        <div class="card-badge badge-yellow">Destaque</div>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Salão Crystal Palace</h3>
                            <div class="card-rating">
                                <svg class="icon" viewBox="0 0 20 20" fill="#fbbf24">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span>4.9</span>
                            </div>
                        </div>
                        <div class="card-location">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Centro, São Paulo</span>
                        </div>
                        <div class="card-tags">
                            <span class="card-tag tag-purple">Até 300 pessoas</span>
                            <span class="card-tag tag-cyan">Estacionamento</span>
                            <span class="card-tag tag-yellow">Climatizado</span>
                        </div>
                        <div class="card-footer">
                            <span class="card-price">R$ 5.900</span>
                            <button class="btn btn-secondary">Ver detalhes</button>
                        </div>
                    </div>
                </div>
                
                <!-- Venue Card 2 -->
                <div class="card">
                    <div class="card-image">
                        <img src="https://via.placeholder.com/400x250" alt="Villa Moderna">
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Villa Moderna</h3>
                            <div class="card-rating">
                                <svg class="icon" viewBox="0 0 20 20" fill="#fbbf24">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span>4.7</span>
                            </div>
                        </div>
                        <div class="card-location">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Jardins, São Paulo</span>
                        </div>
                        <div class="card-tags">
                            <span class="card-tag tag-purple">Até 150 pessoas</span>
                            <span class="card-tag tag-cyan">Área externa</span>
                            <span class="card-tag tag-yellow">Wi-Fi</span>
                        </div>
                        <div class="card-footer">
                            <span class="card-price">R$ 4.200</span>
                            <button class="btn btn-secondary">Ver detalhes</button>
                        </div>
                    </div>
                </div>
                
                <!-- Venue Card 3 -->
                <div class="card">
                    <div class="card-image">
                        <img src="https://via.placeholder.com/400x250" alt="Palácio Dourado">
                        <div class="card-badge badge-cyan">Novo</div>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Palácio Dourado</h3>
                            <div class="card-rating">
                                <svg class="icon" viewBox="0 0 20 20" fill="#fbbf24">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span>5.0</span>
                            </div>
                        </div>
                        <div class="card-location">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Ipanema, Rio de Janeiro</span>
                        </div>
                        <div class="card-tags">
                            <span class="card-tag tag-purple">Até 250 pessoas</span>
                            <span class="card-tag tag-cyan">Vista para o mar</span>
                            <span class="card-tag tag-yellow">Som e iluminação</span>
                        </div>
                        <div class="card-footer">
                            <span class="card-price">R$ 7.800</span>
                            <button class="btn btn-secondary">Ver detalhes</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section-footer">
                <button class="btn btn-outline">Ver todos os salões</button>
            </div>
        </div>
    </section>
    
    <!-- Food Section -->
    <section id="food" class="section section-white">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Opções Gastronômicas</h2>
                <p class="section-subtitle">Encante seus convidados com menus exclusivos preparados pelos melhores chefs.</p>
            </div>
            
            <div class="card-grid">
                <!-- Food Option 1 -->
                <div class="card">
                    <div class="card-image">
                        <img src="https://via.placeholder.com/400x250" alt="Menu Clássico">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title mb-4">Menu Clássico</h3>
                        <p class="mb-4">Menu tradicional com entradas refinadas, pratos principais elaborados e sobremesas artesanais.</p>
                        <div class="card-features">
                            <div class="feature">
                                <svg class="icon feature-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>4 opções de entrada</span>
                            </div>
                            <div class="feature">
                                <svg class="icon feature-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>3 opções de prato principal</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="card-price">A partir de R$ 120/pessoa</span>
                            <button class="btn btn-secondary">Ver menu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
@endsection