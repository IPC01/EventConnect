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
                    <div class="row justify-content-center">
                        <div class="">
                            <div class="">

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

                                    <form action="{{ route('eventHall.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                       id="name" name="name" value="{{ old('name') }}" 
                                                       placeholder="Digite o nome do local" required maxlength="255">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="address" class="form-label">Endereço <span class="text-danger">*</span></label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" 
                                                          id="address" name="address" rows="3" 
                                                          placeholder="Digite o endereço completo" required maxlength="500">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="capacity" class="form-label">Capacidade <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                                                           id="capacity" name="capacity" value="{{ old('capacity') }}" 
                                                           placeholder="Quantidade de pessoas" required min="1">
                                                    <span class="input-group-text">pessoas</span>
                                                    @error('capacity')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="price" class="form-label">Preço (R$) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">R$</span>
                                                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                           id="price" name="price" value="{{ old('price') }}" 
                                                           placeholder="0.00" required min="0" step="0.01">
                                                    @error('price')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                       id="email" name="email" value="{{ old('email') }}" 
                                                       placeholder="Digite o e-mail">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Telefone</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                                       id="phone" name="phone" value="{{ old('phone') }}" 
                                                       placeholder="Digite o telefone">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Descrição</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                                          id="description" name="description" rows="3" 
                                                          placeholder="Digite a descrição do local">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="website" class="form-label">Website</label>
                                                <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                                       id="website" name="website" value="{{ old('website') }}" 
                                                       placeholder="Digite o URL do site">
                                                @error('website')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="images" class="form-label">Imagens</label>
                                                <input type="file" class="form-control @error('images') is-invalid @enderror" 
                                                       id="images" name="images[]" multiple>
                                                @error('images')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-4">
                                            <div class="col-12 d-flex justify-content-between">
                                                <a href="{{ route('eventHall.create') }}" class="btn btn-secondary">
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

    </div>
@endsection
