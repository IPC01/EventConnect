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
                                    <h5 class="mb-0">Configurações do Sistema</h5>
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

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('settings.store') }}" method="POST">
                                        @csrf
                                        @method('POST')

                                        <!-- Taxas de Cancelamento -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="cancel_start_fee" class="form-label">Taxa de Cancelamento Inicial (R$)</label>
                                                <input type="number" class="form-control @error('cancel_start_fee') is-invalid @enderror"
                                                       id="cancel_start_fee" name="cancel_start_fee" value="{{ old('cancel_start_fee', $settings->cancel_start_fee ?? '') }}"
                                                       required step="0.01" min="0">
                                                @error('cancel_start_fee')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="cancel_end_fee" class="form-label">Taxa de Cancelamento Final (R$)</label>
                                                <input type="number" class="form-control @error('cancel_end_fee') is-invalid @enderror"
                                                       id="cancel_end_fee" name="cancel_end_fee" value="{{ old('cancel_end_fee', $settings->cancel_end_fee ?? '') }}"
                                                       required step="0.01" min="0">
                                                @error('cancel_end_fee')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Percentuais -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="late_pct" class="form-label">Percentual de Atraso (%)</label>
                                                <input type="number" class="form-control @error('late_pct') is-invalid @enderror"
                                                       id="late_pct" name="late_pct" value="{{ old('late_pct', $settings->late_pct ?? '') }}"
                                                       required step="0.1" min="0" max="100">
                                                @error('late_pct')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="on_time_pct" class="form-label">Percentual Pontual (%)</label>
                                                <input type="number" class="form-control @error('on_time_pct') is-invalid @enderror"
                                                       id="on_time_pct" name="on_time_pct" value="{{ old('on_time_pct', $settings->on_time_pct ?? '') }}"
                                                       required step="0.1" min="0" max="100">
                                                @error('on_time_pct')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Tempo Base -->
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="base_time" class="form-label">Tempo Base (meses)</label>
                                                <input type="number" class="form-control @error('base_time') is-invalid @enderror"
                                                       id="base_time" name="base_time" value="{{ old('base_time', $settings->base_time ?? '') }}"
                                                       required min="1">
                                                @error('base_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 d-flex justify-content-between">
                                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                                    <i class="bi bi-arrow-left"></i> Voltar
                                                </a>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="bi bi-save"></i> Salvar Configurações
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
