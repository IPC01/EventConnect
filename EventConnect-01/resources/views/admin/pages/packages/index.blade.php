@extends('admin.layout.base')
@section('title', 'usuarios')

@Section('content')
    <main>
      
            @if (!$packages)
                <h1>nenhum pacote encontrado</h1>  
            @else
            <div class="dashboard-grid">

                <!-- Total de Salões de Evento -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Total de Salões de Evento</p>
                            <h3 class="stat-value">{{ $packages->count() }}</h3>
                        </div>
                        <div class="stat-icon icon-cyan">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-up"></i>
                        <span>15% desde o último mês</span>
                    </div>
                </div>
        
                <!-- Salões Ativos -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Salões Ativos</p>
                            <h3 class="stat-value">{{ $packages->where('status', 'active')->count() }}</h3>
                        </div>
                        <div class="stat-icon icon-purple">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-up"></i>
                        <span>10 novos este mês</span>
                    </div>
                </div>
        
                <!-- Salões Inativos -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Salões Inativos</p>
                            <h3 class="stat-value">{{ $packages->where('status', 'inactive')->count() }}</h3>
                        </div>
                        <div class="stat-icon icon-yellow">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-down"></i>
                        <span>5 novos este mês</span>
                    </div>
                </div>
                <!-- Salões Inativos -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Salões Inativos</p>
                            <h3 class="stat-value">{{ $packages->where('status', 'inactive')->count() }}</h3>
                        </div>
                        <div class="stat-icon icon-yellow">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-down"></i>
                        <span>5 novos este mês</span>
                    </div>
                </div>
        
            </div>
            <div>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Pacotes</h2>
                        <a href="{{ route('admin.hall.create') }}" class="add-btn">
                            <i class="fas fa-plus"></i>Adicionar Salão
                        </a>
                    </div>
                    <div class="pacotes-section">
                        <!-- Search and filters -->
                        <div class="search-filter-container">
                            <div class="search-container">
                                <i class="fas fa-search"></i>
                                <input
                                    type="text"
                                    placeholder="                Buscar pacotes..."
                                    class="search-input"
                                >
                            </div>
                            <div class="filter-container">
                                <i class="fas fa-filter"></i>
                                <select class="filter-select">
                                    <option value="">Filtrar por tipo de evento</option>
                                    <option value="casamento">Casamento</option>
                                    <option value="aniversario">Aniversário</option>
                                    <option value="corporativo">Corporativo</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Packages grid -->
                        <div class="packages-grid">
                         
                        
                            
                            <!-- Package card 3 -->
                            <div class="package-card">
                                <div class="package-header">
                                    <h2 class="package-title">
                                        <i class="fas fa-building"></i>
                                        Pacote Empresarial
                                    </h2>
                                </div>
                                <div class="package-body">
                                    <div class="package-price">
                                        <i class="fas fa-tag"></i>
                                        Preço: <span class="price-amount">R$3.800,00</span>
                                    </div>
                                    <div class="package-type">
                                        <i class="fas fa-briefcase"></i>
                                        Corporativo
                                    </div>
                                </div>
                                <div class="package-footer">
                                    <a href="#" class="details-link">
                                        Ver detalhes <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <!-- Botão Editar (Redireciona para a página de edição) -->
                                        <a href="" class="action-btn edit-btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- Botão Excluir (Formulário para excluir o salão) -->
                                        <form action="" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Tem certeza de que deseja excluir este salão?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="pagination-container">
                            <button class="pagination-button page-prev">
                                <i class="fas fa-chevron-left"></i> Anterior
                            </button>
                            <button class="pagination-button page-number active">1</button>
                            <button class="pagination-button page-number">2</button>
                            <button class="pagination-button page-number">3</button>
                            <button class="pagination-button page-next">
                                Próxima <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
    </main>

@endsection
