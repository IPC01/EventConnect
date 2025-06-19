@extends('admin.layout.base')
@section('title', 'Pacotes')

@section('content')
    <main>
        <div class="dashboard-grid">

            <!-- Total de Pacotes -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Total de Pacotes</p>
                        <h3 class="stat-value">{{ $packages->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-cyan">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>15% desde o último mês</span>
                </div>
            </div>

            <!-- Pacotes Ativos -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Pacotes Ativos</p>
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

            <!-- Pacotes Inativos -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Pacotes Inativos</p>
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

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Pacotes</h2>
                <button class="add-btn" onclick="openPackageModal()">
                    <i class="fas fa-plus"></i>Adicionar Pacote
                </button>
            </div>

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

                                    <button class="details-link"
                                        onclick='openViewPackageModal(@json($packageData))'>
                                        Ver detalhes <i class="fas fa-eye"></i>
                                    </button>


                                    <div style="display: flex; gap: 0.5rem;">
                                        <a href="#" class="action-btn edit-btn"
                                            onclick="openPackageModal({{ $package->toJson() }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn"
                                                onclick="return confirm('Tem certeza de que deseja excluir este pacote?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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

        <!-- Modal de Cadastro/Edição -->
        <div id="packageModal" class="modal hidden">
            <div class="modal-content">
                <span class="close-btn" onclick="closePackageModal()">&times;</span>
                <h2 id="modalTitle">Adicionar Pacote</h2>

                <form id="packageForm" method="POST">
                    @csrf
                    <div id="methodInput"></div>

                    <div class="form-group">
                        <label for="name">Nome do Pacote:</label>
                        <input type="text" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="id_event_type">Tipo de Evento:</label>
                        <select name="id_event_type" id="id_event_type" required>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_event_hall">Salão:</label>
                        <select name="id_event_hall" id="id_event_hall" required>
                            @foreach ($eventhalls as $hall)
                                <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_menu">Menu:</label>
                        <select name="id_menu" id="id_menu" required>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_decoration">Decoração:</label>
                        <select name="id_decoration" id="id_decoration" required>
                            @foreach ($decorations as $decoration)
                                <option value="{{ $decoration->id }}">{{ $decoration->name }}</option>
                            @endforeach
                        </select>
                    </div>




                    <button type="submit" class="text-rigth add-btn">Salvar</button>

                </form>
            </div>
        </div>


        <!-- Modal de Visualização -->
        <div id="viewPackageModal" class="modal hidden">
            <div class="modal-content">
                <span class="close-btn" onclick="closeViewPackageModal()">&times;</span>
                <h2>Detalhes do Pacote</h2>
                <ul id="packageDetails" style="list-style: none; padding: 0;">
                    <!-- conteúdo inserido via JS -->
                </ul>
            </div>
        </div>

        <!-- Scripts dos Modais -->

    </main>
    <script>
        function openPackageModal(pkg = null) {
            const modal = document.getElementById('packageModal');
            const form = document.getElementById('packageForm');
            const methodInput = document.getElementById('methodInput');
            form.reset();
            methodInput.innerHTML = '';
            modal.classList.remove('hidden');

            if (pkg) {
                document.getElementById('modalTitle').innerText = 'Editar Pacote';
                form.action = `/admin/packages/${pkg.id}`; // rota para update
                methodInput.innerHTML = `<input type="hidden" name="_method" value="PUT">`;

                document.getElementById('name').value = pkg.name;
                document.getElementById('id_event_type').value = pkg.id_event_type;
                document.getElementById('id_event_hall').value = pkg.id_event_hall;
                document.getElementById('id_menu').value = pkg.id_menu;
                document.getElementById('id_decoration').value = pkg.id_decoration;
                document.getElementById('total_price').value = pkg.total_price;
            } else {
                document.getElementById('modalTitle').innerText = 'Adicionar Pacote';
                form.action = `/admin/packages`; // rota para store
            }
        }

        function closePackageModal() {
            document.getElementById('packageModal').classList.add('hidden');
        }


        function openViewPackageModal(data) {
            const modal = document.getElementById('viewPackageModal');
            const details = document.getElementById('packageDetails');
            details.innerHTML = `
                <li><strong>Nome:</strong> ${data.name}</li>
                <li><strong>Tipo de Evento:</strong> ${data.eventType} - R$${parseFloat(data.eventType_price).toFixed(2)}</li>
                <li><strong>Salão:</strong> ${data.eventHall} - R$${parseFloat(data.eventHall_price).toFixed(2)}</li>
                <li><strong>Menu:</strong> ${data.menu} - R$${parseFloat(data.menu_price).toFixed(2)}</li>
                <li><strong>Decoração:</strong> ${data.decoration} - R$${parseFloat(data.decoration_price).toFixed(2)}</li>
                <li><strong><u>Preço Total:</u></strong> <strong>R$${parseFloat(data.total_price).toFixed(2)}</strong></li>
            `;
            modal.classList.remove('hidden');
        }

        function closeViewPackageModal() {
            document.getElementById('viewPackageModal').classList.add('hidden');
        }
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

    <!-- Estilo Modal simples -->
    <style>
        .modal.hidden {
            display: none;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            width: 500px;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
@endsection
