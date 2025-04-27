@extends('admin.layout.base')
@section('title', 'Itens de Menu')

@section('content')
<main>
    <div class="dashboard-grid">
        <!-- Total de Itens de Menu -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <p class="stat-label">Total de Itens de Menu</p>
                    <h3 class="stat-value">{{ $menuItems->count() }}</h3>
                </div>
                <div class="stat-icon icon-cyan">
                    <i class="fas fa-utensils"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabela de Itens de Menu -->
    <div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Itens de Menu</h2>
                <a class="add-btn" href="{{route('admin.items.create')}}">
                    <i class="fas fa-plus"></i> Adicionar Item
                </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menuItems as $menuItem)
                        <tr>
                            <td>{{ $menuItem->name }}</td>
                            <td>{{ $menuItem->description }}</td>
                            <td>{{ $menuItem->category->name }}</td>
                         
                            <td><img src="{{ asset('storage/' . $menuItem->image->url_img) }}" width="50" alt="Imagem do Item"></td>
                            <td>
                                <a class="action-btn edit-btn" href="{{ route('admin.items.edit', $menuItem->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <form action="{{ route('admin.items.destroy', $menuItem->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn" onclick="return confirm('Tem certeza de que deseja excluir este item?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
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
