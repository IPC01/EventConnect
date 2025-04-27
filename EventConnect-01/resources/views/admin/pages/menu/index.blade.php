@extends('admin.layout.base')
@section('title', 'Menus')

@section('content')
<main>
    <!-- Summary Cards -->
    <div class="dashboard-grid">

        <!-- Total de Menus -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <p class="stat-label">Total de Menus</p>
                    <h3 class="stat-value">{{ $menus->count() }}</h3>
                </div>
                <div class="stat-icon icon-cyan">
                    <i class="fas fa-utensils"></i>
                </div>
            </div>
            <div class="stat-trend">
                <i class="fas fa-arrow-up"></i>
                <span>5% desde o último mês</span>
            </div>
        </div>

        <!-- Menu Mais Caro -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <p class="stat-label">Menu Mais Caro</p>
                    <h3 class="stat-value">
                        @if ($menus->count() > 0)
                            {{ number_format($menus->max('price'), 2, ',', '.') }} MZN
                        @else
                            0 MZN
                        @endif
                    </h3>
                </div>
                <div class="stat-icon icon-purple">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
            <div class="stat-trend">
                <i class="fas fa-arrow-up"></i>
                <span>Atualizado</span>
            </div>
        </div>

        <!-- Menu Mais Popular -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <p class="stat-label">Menu Mais Popular</p>
                    <h3 class="stat-value">
                        @if ($menus->count() > 0)
                            {{ $menus->sortByDesc('popularity')->first()->name ?? '-' }}
                        @else
                            -
                        @endif
                    </h3>
                </div>
                <div class="stat-icon icon-yellow">
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="stat-trend">
                <i class="fas fa-arrow-up"></i>
                <span>Baseado em vendas</span>
            </div>
        </div>

        <!-- Total de Itens -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <p class="stat-label">Total de Itens</p>
                    <h3 class="stat-value">
                        {{ $menus->pluck('items')->flatten()->count() }}
                    </h3>
                </div>
                <div class="stat-icon icon-green">
                    <i class="fas fa-list"></i>
                </div>
            </div>
            <div class="stat-trend">
                <i class="fas fa-arrow-up"></i>
                <span>3% mais que mês passado</span>
            </div>
        </div>

    </div>

    <!-- Menu Table -->
    <div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Menus Cadastrados</h2>
                <a href="{{ route('admin.menus.create') }}" class="add-btn">
                    <i class="fas fa-plus"></i> Adicionar Menu
                </a>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Itens</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>{{ number_format($menu->price, 2, ',', '.') }} MZN</td>
                                <td>
                                    <a href="{{ route('admin.menus.show', $menu->id) }}" class="action-btn view-btn">
                                        <i class="fas fa-eye text-blue-500"></i>
                                    </a>
                                    
                                </td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <!-- Ver Detalhes -->
                                       

                                        <!-- Editar -->
                                        <a href="{{ route('admin.menus.edit', $menu->id) }}" class="action-btn edit-btn">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Eliminar -->
                                        <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Tem certeza que deseja eliminar este menu?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</main>
@endsection
