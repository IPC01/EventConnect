@extends('admin.layout.base')

@section('title', 'Reservas')

@section('content')
<main>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Lista de Reservas</h2>
            <!-- Você pode colocar um botão para criar reserva, se quiser -->
          {{-- <a href="{{route('admin.reserves.create') }}" class="add-btn">
                <i class="fas fa-plus"></i>Adicionar Reserva
            </a> --}}
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>ID Pacote</th>
                        <th>Preço Total</th>
                        <th>Status Pagamento</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reserves as $reserve)
                 
                        <tr>
                            <td>{{ $reserve->id_order }}</td>
                            <td><a href="{{ route('shop.package.details', ['id' => $reserve->eventpackage->id]) }}" class="details-link">{{ $reserve->eventpackage->name }}</a></td>
                            <td>{{ number_format($reserve->total_price, 2, ',', '.') }} R$</td>
                            <td>{{ ucfirst($reserve->status_pagamento) }}</td>
                            <td>
                                <!-- Exemplo: ações como editar ou excluir -->
                                {{-- <a href="{{ route('admin.reserves.edit', $reserve->id) }}" class="action-btn edit-btn">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.reserves.destroy', $reserve->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn" onclick="return confirm('Deseja realmente excluir esta reserva?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
