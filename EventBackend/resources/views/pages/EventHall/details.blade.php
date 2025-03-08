@extends('layouts.base')

@section('Content')
    <div id="wrapper">

        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('components.nav')

                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Detalhes do Salão de Evento</h1>

                    <!-- Event Hall Details -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Salão: {{ $eventHall->name }}</h6>
                        </div>
                        <div class="card-body">
                            <p><strong>Endereço:</strong> {{ $eventHall->address }}</p>
                            <p><strong>Capacidade:</strong> {{ $eventHall->capacity }} pessoas</p>
                            <p><strong>Preço por Hora:</strong> R$ {{ number_format($eventHall->price, 2, ',', '.') }}</p>
                        </div>
                    </div>

                    <!-- List of Packages -->
                    <h4 class="mb-3">Pacotes Associados</h4>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @if($packages->isEmpty())
                                <p>Não há pacotes associados a este salão.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome do Pacote</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($packages as $package)
                                            <tr>
                                                <td>{{ $package->name }}</td>
                                                <td>R$ {{ number_format($package->total_price, 2, ',', '.') }}</td>
                                                <td>
                                                    <a href="{{ route('event-halls.details', $package->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                    <!-- Button to Open Modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPackageModal">
                        <i class="bi bi-plus"></i> Criar Pacote
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal for Creating Package -->
        <div class="modal fade" id="createPackageModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPackageModalLabel">Criar Novo Pacote</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('package.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_event_hall" value="{{ $eventHall->id }}">

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Nome do pacote <span class="text-danger">*</span></label>
                                            <input type="text" name="name">
                                    
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="id_menu" class="form-label">Menu <span class="text-danger">*</span></label>
                                    <select class="form-control @error('id_menu') is-invalid @enderror" 
                                            id="id_menu" name="id_menu" required>
                                        <option value="">Selecione o menu</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" 
                                                    @if(old('id_menu') == $menu->id) selected @endif>
                                                {{ $menu->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_menu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="id_decoration" class="form-label">Decoração <span class="text-danger">*</span></label>
                                    <select class="form-control @error('id_decoration') is-invalid @enderror" 
                                            id="id_decoration" name="id_decoration" required>
                                        <option value="">Selecione a decoração</option>
                                        @foreach($decorations as $decoration)
                                            <option value="{{ $decoration->id }}" 
                                                    @if(old('id_decoration') == $decoration->id) selected @endif>
                                                {{ $decoration->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_decoration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="id_event_type" class="form-label">Tipo de Evento <span class="text-danger">*</span></label>
                                    <select class="form-control @error('id_event_type') is-invalid @enderror" 
                                            id="id_event_type" name="id_event_type" required>
                                        <option value="">Selecione o tipo de evento</option>
                                        @foreach($eventTypes as $eventType)
                                            <option value="{{ $eventType->id }}" 
                                                    @if(old('id_event_type') == $eventType->id) selected @endif>
                                                {{ $eventType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_event_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="total_price" class="form-label">Preço Total (R$) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('total_price') is-invalid @enderror" 
                                           id="total_price" name="total_price" value="{{ old('total_price') }}" 
                                           placeholder="0.00" required min="0" step="0.01">
                                    @error('total_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar Pacote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
