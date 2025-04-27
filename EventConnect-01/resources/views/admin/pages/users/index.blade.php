@extends('admin.layout.base')
@section('title', 'usuarios')

@Section('content')
    <main>
        <!-- Summary Cards -->
        <div class="dashboard-grid">

            <!-- Total de Usuários -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Total de Usuários</p>
                        <h3 class="stat-value">{{ $users->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-cyan">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>15% desde o último mês</span>
                </div>
            </div>

            <!-- Administradores -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Administradores</p>
                        <h3 class="stat-value">{{ $users->where('id_role', 1)->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-purple">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>2 novos este mês</span>
                </div>
            </div>

            <!-- Clientes -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Clientes</p>
                        <h3 class="stat-value">{{ $users->where('id_role', 3)->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-yellow">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>12% desde o último mês</span>
                </div>
            </div>

            <!-- Decoradores (vou usar 'Colaborador' como base) -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <p class="stat-label">Colaboradores</p> <!-- Corrigi aqui: você tinha escrito Decoradores -->
                        <h3 class="stat-value">{{ $users->where('id_role', 2)->count() }}</h3>
                    </div>
                    <div class="stat-icon icon-green">
                        <i class="fas fa-briefcase"></i> <!-- Ícone de trabalho/colaborador -->
                    </div>
                </div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>8% desde o último mês</span>
                </div>
            </div>

        </div>


        <!-- User Table -->
        <div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Usuários do Sistema</h2>
                    <a href="{{ route('admin.users.create') }}" class="add-btn">
                        <i class="fas fa-plus"></i>Adicionar Usuário
                    </a>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Função</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="event-item">
                                            <div class="user-avatar" style="background-color: {{ $user->color ?? 'var(--purple)' }};">
                                                {{ strtoupper(implode('', array_map(function($word) { return strtoupper($word[0]); }, explode(' ', $user->name)))) }}
                                            </div>
                                            
                                            <span>{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td style="font-size: 0.875rem;">{{ $user->email }}</td>
                                    <td style="font-size: 0.875rem;">{{ $user->phone }}</td>
                                    <td style="font-size: 0.875rem;">{{ $user->address }}</td>
                                    <td>
                                        @php
                                        switch ($user->role->name) {
                                            case 'Administrador':
                                                $badgeColor = 'rgba(128, 86, 255, 0.1)'; // Roxo claro
                                                $textColor = 'var(--purple)'; 
                                                break;
                                            case 'Colaborador':
                                                $badgeColor = 'rgba(0, 172, 193, 0.1)'; // Ciano claro
                                                $textColor = '#00ACC1'; 
                                                break;
                                            case 'Cliente':
                                                $badgeColor = 'rgba(255, 193, 7, 0.1)'; // Amarelo claro
                                                $textColor = '#FFC107'; 
                                                break;
                                            default:
                                                $badgeColor = 'rgba(128, 86, 255, 0.1)';
                                                $textColor = 'var(--purple)';
                                                break;
                                        }
                                    @endphp
                                    
                                    <span class="status-badge"
                                          style="background-color: {{ $badgeColor }}; color: {{ $textColor }};">
                                        {{ $user->role->name }}
                                    </span>
                                    
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 0.5rem;">
                                           
                                                <!-- Botão Editar (Redireciona para a página de edição) -->
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="action-btn edit-btn">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            
                                                <!-- Botão Excluir (Formulário para excluir o usuário) -->
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn delete-btn" onclick="return confirm('Tem certeza de que deseja excluir este usuário?');">
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
