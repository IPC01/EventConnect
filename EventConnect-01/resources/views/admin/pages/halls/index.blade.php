@extends('admin.layout.base')
@section('title', 'Salões de Evento')

@section('content')
<main>
    <!-- Summary Cards -->
    <div class="dashboard-grid">

        <!-- Total de Salões de Evento -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <p class="stat-label">Total de Salões de Evento</p>
                    <h3 class="stat-value">{{ $halls->count() }}</h3>
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
                    <h3 class="stat-value">{{ $halls->where('status', 'active')->count() }}</h3>
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
                    <h3 class="stat-value">{{ $halls->where('status', 'inactive')->count() }}</h3>
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

    <!-- Tabela de Salões -->
    <div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Salões de Evento Cadastrados</h2>
                <a href="{{ route('admin.hall.create') }}" class="add-btn">
                    <i class="fas fa-plus"></i>Adicionar Salão
                </a>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Capacidade</th>
                            <th>Preço</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Pacotes</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($halls as $hall)
                            <tr>
                                <td>{{ $hall->name }}</td>
                                <td>{{ $hall->address }}</td>
                                <td>{{ $hall->capacity }}</td>
                                <td>{{ number_format($hall->price, 2, ',', '.') }} R$</td>
                                <td>{{ $hall->email }}</td>
                                <td>{{ $hall->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.hall.show', $hall->id) }}" class="action-btn">
                                        <i class="fas fa-eye text-purple-600"></i>
                                    </a>
                                    
                                   
                                </td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <!-- Botão Editar (Redireciona para a página de edição) -->
                                        <a href="{{ route('admin.hall.edit', $hall->id) }}" class="action-btn edit-btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- Botão Excluir (Formulário para excluir o salão) -->
                                        <form action="{{ route('admin.hall.destroy', $hall->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Tem certeza de que deseja excluir este salão?');">
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
