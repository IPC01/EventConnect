
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


                <div class="container-fluid">
                    <div class="">
                        <div class="">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2>Tipos de Eventos</h2>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventTypeModal">
                                        <i class="bi bi-plus-circle"></i> Novo Tipo de Evento
                                    </button>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                                        </div>
                                    @endif
                                    
                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                                        </div>
                                    @endif
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col" width="20%">Data de Criação</th>
                                                    <th scope="col" width="15%">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($types as $eventType)
                                                    <tr>
                                                        <td>{{ $eventType->id }}</td>
                                                        <td>{{ $eventType->name }}</td>
                                                        <td>{{ $eventType->created_at->format('d/m/Y H:i') }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-sm btn-warning" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#editEventTypeModal{{ $eventType->id }}">
                                                                    <i class="bi bi-pencil"></i>
                                                                </button>
                                                                <form action="{{ route('event.update', $eventType->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                                            onclick="return confirm('Tem certeza que deseja excluir este tipo de evento?')">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                
                                                            <!-- Modal de Edição -->
                                                            <div class="modal fade" id="editEventTypeModal{{ $eventType->id }}" tabindex="-1" aria-labelledby="editEventTypeModalLabel{{ $eventType->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('event.update', $eventType->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="editEventTypeModalLabel{{ $eventType->id }}">Editar Tipo de Evento</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="edit_name{{ $eventType->id }}" class="form-label">Nome do Tipo de Evento</label>
                                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                                                           id="edit_name{{ $eventType->id }}" name="name" 
                                                                                           value="{{ old('name', $eventType->name) }}" required>
                                                                                    @error('name')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-success">Atualizar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">Nenhum tipo de evento cadastrado.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $types->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal para Cadastro de Tipos de Eventos -->
                <div class="modal fade" id="eventTypeModal" tabindex="-1" aria-labelledby="eventTypeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('event.add') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eventTypeModalLabel">Cadastrar Tipo de Evento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome do Tipo de Evento</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endsection
                
                @section('scripts')
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Limpar formulário do modal de cadastro quando for fechado
                        const eventTypeModal = document.getElementById('eventTypeModal');
                        if (eventTypeModal) {
                            eventTypeModal.addEventListener('hidden.bs.modal', function () {
                                const form = eventTypeModal.querySelector('form');
                                form.reset();
                                // Remove as classes is-invalid
                                const invalidInputs = form.querySelectorAll('.is-invalid');
                                invalidInputs.forEach(input => {
                                    input.classList.remove('is-invalid');
                                });
                            });
                        }
                    });
                </script>

            </div>   
        </div>   
    </div>   
                @endsection

      

