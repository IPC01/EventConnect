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
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Cadastro de Pacote</h5>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('package.store') }}" method="POST">
                                        @csrf
                                        
                                        <!-- Salão de Evento -->
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="id_event_hall" class="form-label">Salão de Evento <span class="text-danger">*</span></label>
                                                <select class="form-control @error('id_event_hall') is-invalid @enderror" 
                                                        id="id_event_hall" name="id_event_hall" required>
                                                    <option value="">Selecione o salão</option>
                                                    @foreach($eventHalls as $eventHall)
                                                        <option value="{{ $eventHall->id }}" 
                                                                @if(old('id_event_hall') == $eventHall->id) selected @endif>
                                                            {{ $eventHall->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_event_hall')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Menu -->
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

                                        <!-- Decoração -->
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

                                        <!-- Tipo de Evento -->
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

                                        <!-- Preço Total -->
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="total_price" class="form-label">Preço Total (R$) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">R$</span>
                                                    <input type="number" class="form-control @error('total_price') is-invalid @enderror" 
                                                           id="total_price" name="total_price" value="{{ old('total_price') }}" 
                                                           placeholder="0.00" required min="0" step="0.01">
                                                    @error('total_price')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 d-flex justify-content-between">
                                                <a href="{{ route('package.index') }}" class="btn btn-secondary">
                                                    <i class="bi bi-arrow-left"></i> Voltar
                                                </a>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="bi bi-save"></i> Salvar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
