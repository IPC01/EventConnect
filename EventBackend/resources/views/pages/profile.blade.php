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
                    <h1 class="h3 mb-4 text-gray-800">Perfil </h1>

                    <div class="row">
                        <!-- Left column - Profile Details -->
                        <div class="col-lg-8">
                            <!-- Profile Information Card -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Informações Pessoais</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')

                                        <div class="text-center mb-4">
                                            <div class="position-relative d-inline-block">
                                                <img src="{{ $admin->id_img ? asset('storage/' . $admin->image->url_img) : asset('img/default-avatar.png') }}" class="img-profile rounded-circle" 
                                                     style="width: 100px; height: 100px; object-fit: cover;">
                                                <label for="avatar" class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-2 text-white" style="cursor: pointer; margin-right: 10px;">
                                                    <i class="bi bi-camera-fill"></i>
                                                    <input type="file" id="avatar" name="avatar" class="d-none">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $admin->name ?? '') }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $admin->email ?? '') }}" required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Telefone</label>
                                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $admin->phone ?? '') }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="role" class="form-label">Cargo</label>
                                                <input type="text" class="form-control" id="role" value="{{ $admin->role->name ?? 'Administrador' }}" disabled>
                                            </div>
                                        </div>

                                        <h6 class="text-primary mt-4 mb-3">Endereço</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="address" class="form-label">Rua</label>
                                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $admin->address ?? '') }}">
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save"></i> Salvar Alterações
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Right column - Account Settings -->
                        <div class="col-lg-4">
                            <!-- Change Password Card -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Alterar Senha</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.updatePassword') }}" method="post">
                                        @csrf
                                        @method('post')
                                        
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Senha Atual <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Nova Senha <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirmar Nova Senha <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                        
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-lock"></i> Atualizar Senha
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Delete Account Card -->
                            <div class="card border-danger shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Zona de Perigo</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-3">Ao excluir sua conta, todos os seus dados serão removidos permanentemente. Esta ação não pode ser desfeita.</p>
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                            <i class="bi bi-trash"></i> Excluir Minha Conta
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Confirmation Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Confirmar Exclusão de Conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Você tem certeza que deseja excluir permanentemente sua conta? Esta ação não pode ser desfeita e todos os seus dados serão perdidos.</p>
                    <form id="deleteAccountForm" action="{{ route('profile.destroy') }}" method="post">
                        @csrf
                        @method('post')
                        
                        <div class="mb-3">
                            <label for="delete_confirmation" class="form-label">Digite "EXCLUIR" para confirmar</label>
                            <input type="text" class="form-control" id="delete_confirmation" name="delete_confirmation" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password_confirmation_delete" class="form-label">Senha atual</label>
                            <input type="password" class="form-control" id="password_confirmation_delete" name="password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="deleteAccountForm" class="btn btn-danger">Excluir Permanentemente</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Preview avatar image before upload
    document.getElementById('avatar')?.addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgProfile = document.querySelector('.img-profile');
                if (imgProfile) {
                    imgProfile.setAttribute('src', e.target.result);
                }
            };

            reader.readAsDataURL(file);
        } else {
            alert('Por favor, selecione um arquivo de imagem!');
        }
    });

    // Validate delete account confirmation
    document.getElementById('deleteAccountForm').addEventListener('submit', function(e) {
        const confirmation = document.getElementById('delete_confirmation').value;
        if (confirmation !== 'EXCLUIR') {
            e.preventDefault();
            alert('Por favor, digite "EXCLUIR" para confirmar a exclusão da conta.');
        }
    });
</script>
@endsection
