@extends('admin.layout.base')
@section('title', 'Decorações')

@section('content')
<main>
    <!-- Summary Cards -->
    <div class="dashboard-grid">

        <!-- Total de Decorações -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <p class="stat-label">Total de Decorações</p>
                    <h3 class="stat-value">{{ $decorations->count() }}</h3>
                </div>
                <div class="stat-icon icon-cyan">
                    <i class="fas fa-paint-brush"></i> <!-- Ícone de decoração -->
                </div>
            </div>
            <div class="stat-trend">
                <i class="fas fa-arrow-up"></i>
                <span>5% desde o último mês</span>
            </div>
        </div>

    </div>

    <!-- Decoration Table -->
    <div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Lista de Decorações</h2>
                <a href="{{ route('admin.decorations.create') }}" class="add-btn">
                    <i class="fas fa-plus"></i>Adicionar Decoração
                </a>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($decorations as $decoration)
                            <tr>
                                <td>
                                    @if($decoration->base_img)
                                        <img src="{{ asset('storage/' . $decoration->base_img) }}" alt="Imagem da decoração" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                    @else
                                        <div style="width: 60px; height: 60px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                            <i class="fas fa-image" style="color: #ccc;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $decoration->name }}</td>
                                <td>{{ $decoration->description ?? '-' }}</td>
                                <td>{{ number_format($decoration->price, 2, ',', '.') }} MZN</td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <!-- Botão Editar -->
                                        <a href="{{ route('admin.decorations.edit', $decoration->id) }}" class="action-btn edit-btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Botão Excluir -->
                                        <form action="{{ route('admin.decorations.destroy', $decoration->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Tem certeza de que deseja excluir esta decoração?');">
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
