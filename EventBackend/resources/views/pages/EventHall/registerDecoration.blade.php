@extends('layouts.base')

@section('Content')
    <div id="wrapper">

        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('components.nav')

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Cadastro de Decoração</h5>
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

                                    <form action="{{ route('decoration.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                       id="name" name="name" value="{{ old('name') }}" 
                                                       placeholder="Nome da decoração" required maxlength="255">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Descrição</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                                          id="description" name="description" rows="3" 
                                                          placeholder="Descrição da decoração" maxlength="500">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="price" class="form-label">Preço (R$) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">R$</span>
                                                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                           id="price" name="price" value="{{ old('price') }}" 
                                                           placeholder="0.00" required min="0" step="0.01">
                                                    @error('price')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="base_img" class="form-label">Imagem Principal <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control @error('base_img') is-invalid @enderror" 
                                                       id="base_img" name="base_img" accept="image/*" required>
                                                @error('base_img')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="additional_images" class="form-label">Imagens Adicionais</label>
                                                <input type="file" class="form-control @error('additional_images') is-invalid @enderror" 
                                                       id="additional_images" name="additional_images[]" accept="image/*" multiple>
                                                <small class="text-muted">Selecione até 5 imagens extras.</small>
                                                @error('additional_images')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 d-flex justify-content-between">
                                                <a href="{{ route('decoration.index') }}" class="btn btn-secondary">
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
