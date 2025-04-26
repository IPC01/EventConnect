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
                    <h1 class="h3 mb-2 text-gray-800">Decorações</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Decorações</h6>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDecorationModal">
                                <i class="bi bi-plus-circle"></i> Adicionar Decoração
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($decorations as $decoration)
                                            <tr>
                                                <td>{{ $decoration->name }}</td>
                                                <td>{{ $decoration->description }}</td>
                                                <td>${{ number_format($decoration->price, 2, ',', '.') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('decoration.show', $decoration->id) }}" class="btn btn-sm btn-info">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        <a href="{{ route('decoration.edit', $decoration->id) }}" class="btn btn-sm btn-warning">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('decoration.destroy', $decoration->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Tem certeza que deseja excluir esta decoração?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Nenhuma decoração encontrada</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Adicionar Decoração -->
                <div class="modal fade" id="addDecorationModal" tabindex="-1" aria-labelledby="addDecorationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="addDecorationModalLabel">Cadastro de Decoração</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('decoration.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               id="name" name="name" value="{{ old('name') }}" 
                                               placeholder="Nome da decoração" required maxlength="255">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descrição</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="3" 
                                                  placeholder="Descrição da decoração" maxlength="500">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
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

                                    <div class="mb-3">
                                        <label for="base_img" class="form-label">Imagem Principal <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control @error('base_img') is-invalid @enderror" 
                                               id="base_img" name="base_img" accept="image/*" required>
                                        @error('base_img')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="additional_images" class="form-label">Imagens Adicionais</label>
                                        <input type="file" class="form-control @error('additional_images') is-invalid @enderror" 
                                               id="additional_images" name="additional_images[]" accept="image/*" multiple>
                                        <small class="text-muted">Selecione até 5 imagens extras.</small>
                                        @error('additional_images')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                            <i class="bi bi-x-circle"></i> Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-save"></i> Salvar
                                        </button>
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
