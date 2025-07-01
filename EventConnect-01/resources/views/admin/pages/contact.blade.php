@extends('admin.layout.base')

@section('title', 'Contactos Recebidos')

@section('content')
<main>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Lista de Contactos</h2>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Mensagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ Str::limit($contact->message, 50) }}</td>
                            <td>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn" onclick="return confirm('Deseja realmente excluir este contato?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhum contacto encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
