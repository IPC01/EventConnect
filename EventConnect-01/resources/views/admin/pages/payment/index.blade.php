@extends('admin.layout.base')

@section('title', 'Pagamentos')

@section('content')
<main>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Lista de Pagamentos</h2>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Dono</th>
                        <th>Reserva</th>
                        <th>Método</th>
                        <th>Valor</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->user->name ?? '—' }}</td>
                            <td>{{ $payment->owner->name ?? '—' }}</td>
                            <td>{{ $payment->reserve ?? '—' }}</td>
                            <td>{{ ucfirst($payment->method) }}</td>
                            <td>R$ {{ number_format($payment->amount, 2, ',', '.') }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nenhum pagamento encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
