@extends('layouts.base')

@section('Content')
    <div id="wrapper">
        @include('components.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('components.nav')

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Menus</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Menus</h6>
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addMenuModal">
                                <i class="bi bi-plus-lg"></i> Adicionar Menu
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($menus as $menu)
                                            <tr>
                                                <td>{{ $menu->name }}</td>
                                                <td>R$ {{ number_format($menu->price, 2, ',', '.') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-warning">
                                                            <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este menu?')">
                                                                <i class="bi bi-trash"></i> Excluir
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Nenhum menu encontrado</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Adicionar Menu -->
                <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="addMenuModalLabel">Adicionar Novo Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('menu.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               id="name" name="name" value="{{ old('name') }}" required maxlength="255">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Preço (R$) <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                   id="price" name="price" value="{{ old('price') }}" 
                                                   required min="0" step="0.01">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="items" class="form-label">Itens</label>
                                        <select class="form-control @error('items') is-invalid @enderror" 
                                                id="items" name="items[]" multiple required>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}" 
                                                        @if(in_array($item->id, old('items', []))) selected @endif>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('items')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="bi bi-x-lg"></i> Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-save"></i> Salvar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- Fim do Modal -->
            </div>
        </div>
    </div>
@endsection
