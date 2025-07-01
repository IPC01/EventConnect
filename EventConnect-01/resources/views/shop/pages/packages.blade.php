@extends('shop.layout.base')
@section('title', 'Pacotes')

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
                    <div class="advanced-search-container">
                        <button type="button" class="advanced-search-btn" onclick="openAdvancedSearchModal()">
                            <i class="fas fa-search-plus"></i>
                            Busca Avançada
                        </button>
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
                                @php
                                    $packageScheduleData = [
                                        'id' => $package->id,
                                        'name' => $package->name,
                                        'eventType' => $package->eventType->name ?? '-',
                                        'price' => $package->total_price,
                                    ];
                                    $types = App\Models\eventType::all();
                                @endphp
                                <div class="package-footer">

                                    <a class="details-link"
                                        href="{{ route('shop.package.details', ['id' => $package->id]) }}">
                                        Ver detalhes <i class="fas fa-eye"></i>
                                    </a>

                                    <div style="display: flex; gap: 0.5rem;">
                                        <button onclick='openScheduleModal(@json($packageScheduleData))' class="add-btn">
                                            agendar
                                        </button>
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

        <!-- Modal de Busca Avançada -->
        <div id="advancedSearchModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-search-plus"></i> Busca Avançada</h3>
                    <span class="close" onclick="closeAdvancedSearchModal()">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="{{ route('search') }}" method="GET" id="advancedSearchForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="data_inicio">Data de Início do Evento:</label>
                                <input type="date" id="data_inicio" name="start_date" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="data_fim">Data de Fim do Evento:</label>
                                <input type="date" id="data_fim" name="end_date" class="form-input">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="orcamento_min">Orçamento Mínimo:</label>
                                <input type="number" id="orcamento_min" name="budget" step="0.01" placeholder="R$ 0,00"
                                    class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="orcamento_max">Numero de Convidados:</label>
                                <input type="number" id="orcamento_max" name="guests" step="0.01" placeholder="R$ 0,00"
                                    class="form-input">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="tipo_evento">Tipo de Evento:</label>
                                <select id="tipo_evento" name="event_type" class="form-input">
                                    <option value="">Selecione o tipo de evento</option>
                                    @foreach ($packages->pluck('eventType')->unique('id')->filter()->values() as $eventType)
                                        <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="descricao">Descrição Breve:</label>
                                <textarea id="descricao" name="description" rows="3"
                                    placeholder="Descreva brevemente o que você está procurando..." class="form-input"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn-secondary" onclick="clearAdvancedSearch()">
                                <i class="fas fa-eraser"></i> Limpar
                            </button>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-search"></i> Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <style>
            /* Estilos para busca avançada */
            .search-filter-container {
                display: flex;
                gap: 1rem;
                margin-bottom: 2rem;
                align-items: center;
                flex-wrap: wrap;
            }

            .advanced-search-container {
                margin-left: auto;
            }

            .advanced-search-btn {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                padding: 12px 20px;
                border-radius: 8px;
                cursor: pointer;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .advanced-search-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }

            /* Modal Styles */
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(5px);
            }

            .modal-content {
                background-color: #fff;
                margin: 5% auto;
                padding: 0;
                border-radius: 12px;
                width: 90%;
                max-width: 600px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                animation: modalSlideIn 0.3s ease;
            }

            @keyframes modalSlideIn {
                from {
                    opacity: 0;
                    transform: translateY(-50px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .modal-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 20px;
                border-radius: 12px 12px 0 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .modal-header h3 {
                margin: 0;
                font-size: 18px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .close {
                color: white;
                font-size: 24px;
                font-weight: bold;
                cursor: pointer;
                transition: color 0.3s ease;
            }

            .close:hover {
                color: #f0f0f0;
            }

            .modal-body {
                padding: 30px;
            }

            .form-row {
                display: flex;
                gap: 20px;
                margin-bottom: 20px;
            }

            .form-group {
                flex: 1;
            }

            .form-group.full-width {
                flex: 100%;
            }

            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: 500;
                color: #333;
                font-size: 14px;
            }

            .form-input {
                width: 100%;
                padding: 12px;
                border: 2px solid #e1e5e9;
                border-radius: 8px;
                font-size: 14px;
                transition: border-color 0.3s ease;
                box-sizing: border-box;
            }

            .form-input:focus {
                outline: none;
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }

            textarea.form-input {
                resize: vertical;
                min-height: 80px;
            }

            .modal-footer {
                display: flex;
                gap: 15px;
                justify-content: flex-end;
                margin-top: 30px;
            }

            .btn-secondary,
            .btn-primary {
                padding: 12px 24px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .btn-secondary {
                background-color: #6c757d;
                color: white;
            }

            .btn-secondary:hover {
                background-color: #5a6268;
                transform: translateY(-1px);
            }

            .btn-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
            }

            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }

            @media (max-width: 768px) {
                .form-row {
                    flex-direction: column;
                    gap: 15px;
                }

                .modal-content {
                    width: 95%;
                    margin: 10% auto;
                }

                .search-filter-container {
                    flex-direction: column;
                    align-items: stretch;
                }

                .advanced-search-container {
                    margin-left: 0;
                }
            }
        </style>

        <script>
            // Função de busca básica (mantida)
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

            // Função de filtro por tipo (mantida e melhorada)
            document.querySelector('.filter-select').addEventListener('change', function() {
                const selectedType = this.value.toLowerCase();
                const packages = document.querySelectorAll('.package-card');

                packages.forEach(pkg => {
                    const type = pkg.querySelector('.package-type').innerText.toLowerCase();
                    if (selectedType === '' || type.includes(selectedType)) {
                        pkg.style.display = ''; // mostra
                    } else {
                        pkg.style.display = 'none'; // esconde
                    }
                });
            });

            // Funções do modal de busca avançada
            function openAdvancedSearchModal() {
                document.getElementById('advancedSearchModal').style.display = 'block';
                document.body.style.overflow = 'hidden'; // Previne scroll da página
            }

            function closeAdvancedSearchModal() {
                document.getElementById('advancedSearchModal').style.display = 'none';
                document.body.style.overflow = 'auto'; // Restaura scroll da página
            }

            function clearAdvancedSearch() {
                document.getElementById('advancedSearchForm').reset();
            }

            // Fechar modal clicando fora dele
            window.onclick = function(event) {
                const modal = document.getElementById('advancedSearchModal');
                if (event.target == modal) {
                    closeAdvancedSearchModal();
                }
            }

            // Fechar modal com ESC
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeAdvancedSearchModal();
                }
            });

            // Validação de datas
            document.getElementById('data_inicio').addEventListener('change', function() {
                const dataInicio = this.value;
                const dataFimInput = document.getElementById('data_fim');

                if (dataInicio) {
                    dataFimInput.min = dataInicio;
                }
            });
        </script>

    @endsection
