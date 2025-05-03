@extends('admin.layout.base')

@section('title', isset($settings) ? 'Editar Configurações' : 'Adicionar Configurações')

@section('content')
<main class="bg-gray-50">
    <div class="">
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">{{ isset($settings) ? 'Editar Configurações' : 'Adicionar Configurações' }}</h2>  
            </div>

            <form action="{{ isset($settings) ? route('admin.settings.update', $settings->id) : route('admin.settings.store') }}" method="POST" class="space-y-6">
                @csrf
                @if(isset($settings))
                    @method('PUT')
                @endif

                <!-- Taxa de Cancelamento de Início -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Taxa de Cancelamento de Início</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cancelamento Inicial (%) <span class="text-red-500">*</span></label>
                        <input type="number" name="cancel_start_fee" value="{{ old('cancel_start_fee', isset($settings) ? $settings->cancel_start_fee : '') }}" required 
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Taxa de Cancelamento de Fim -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Taxa de Cancelamento de Fim</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cancelamento Final (%) <span class="text-red-500">*</span></label>
                        <input type="number" name="cancel_end_fee" value="{{ old('cancel_end_fee', isset($settings) ? $settings->cancel_end_fee : '') }}" required min="0"
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Percentual de Atraso -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Percentual de Atraso</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Atraso (%) <span class="text-red-500">*</span></label>
                        <input type="number" name="late_pct" value="{{ old('late_pct', isset($settings) ? $settings->late_pct : '') }}" required min="0" max="100"
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Percentual de Pontualidade -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Percentual de Pontualidade</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pontualidade (%) <span class="text-red-500">*</span></label>
                        <input type="number" name="on_time_pct" value="{{ old('on_time_pct', isset($settings) ? $settings->on_time_pct : '') }}" required min="0" max="100"
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Tempo Base -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Tempo Base</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempo Base (em minutos) <span class="text-red-500">*</span></label>
                        <input type="number" name="base_time" value="{{ old('base_time', isset($settings) ? $settings->base_time : '') }}" required min="1"
                            class="w-full border-gray-300 focus:ring-cyan-500 focus:border-cyan-500 rounded-md shadow-sm p-3">
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6 border-t mt-8">
                    <a href="{{ route('admin.settings.index') }}"
                        class="inline-flex justify-center py-2 px-6 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200">
                        Cancelar
                    </a>
                    <button type="submit" class="add-btn">
                        {{ isset($settings) ? 'Atualizar' : 'Salvar' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection
