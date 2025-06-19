@extends('admin.layout.base')
@section('title', 'Itens de Menu')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Itens de Menu</h1>
        <div class="flex space-x-3">
            <a href="{{ route('admin.items.create') }}" class="bg-custom-purple text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:opacity-90 transition">
                <i class="fas fa-plus"></i>
                <span>Novo Item</span>
            </a>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div class="search-box flex items-center space-x-2 px-4 py-2 rounded-lg border border-gray-200 w-full md:w-auto">
            <i class="fas fa-search text-gray-400"></i>
            <input type="text" placeholder="Buscar itens..." class="bg-transparent border-none focus:outline-none text-gray-700 w-full">
        </div>
        <div class="flex space-x-3">
            <select class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-custom-purple">
                <option>Todos os status</option>
                <option>Ativo</option>
                <option>Inativo</option>
            </select>
            <select class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-custom-purple">
                <option>Ordenar por</option>
                <option>Nome (A-Z)</option>
                <option>Nome (Z-A)</option>
                <option>Preço (Maior)</option>
                <option>Preço (Menor)</option>
            </select>
        </div>
    </div>

    <!-- Category Tabs -->
    @php
        $categorias = $items->pluck('category')->unique('id');
    @endphp
    <div class="border-b border-gray-200 mb-6">
        <div class="flex overflow-x-auto pb-2 hide-scrollbar space-x-8">
            <button class="category-tab active py-3 px-1 font-medium text-gray-700 focus:outline-none" data-category="all">
                Todas as categorias
            </button>
            @foreach ($categorias as $categoria)
                <button class="category-tab py-3 px-1 font-medium text-gray-700 focus:outline-none" data-category="{{ $categoria->id }}">
                    <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full mr-2" style="background-color: {{ $categoria->color ?? '#ccc' }}"></span>
                        {{ $categoria->name }}
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    <!-- Menu Items Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="menu-items">
        @foreach ($items as $item)
            <div class="menu-item bg-white rounded-lg shadow-sm overflow-hidden relative" data-category="{{ $item->category->id }}">
                <div class="category-indicator" style="background-color: {{ $item->category->color ?? '#8056FF' }}"></div>
                <div class="p-6 pl-8">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->name }}</h3>
                        <div class="flex space-x-2">
                            @if ($item->is_featured)
                                <span class="featured-badge text-xs font-bold text-white px-2 py-1 rounded-full">Destaque</span>
                            @endif
                            @if ($item->tag)
                                <span class="text-xs px-2 py-1 rounded-full {{ $item->tag_color ?? 'bg-gray-200 text-gray-800' }}">{{ $item->tag }}</span>
                            @endif
                        </div>
                    </div>
                    <span class="text-lg font-bold text-purple"> {{ number_format($item->price, 2, ',', '.') }}</span>
                        
                    <div class="flex justify-between items-center">
                        
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.items.edit', $item->id) }}" class="text-gray-400 hover:text-cyan p-1 transition">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.items.destroy', $item->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-pink p-1 transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="p-6 pl-2">
                    
                      <img src="{{asset('storage/' . $item->image->url_img)}}" alt="" srcset="">
                      <p class="text-gray-600 text-sm mb-3">{{ $item->description }}</p>

                  
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination (Se usar Laravel paginator) -->
    {{-- <div class="mt-8 flex justify-between items-center">
        <p class="text-gray-600 text-sm">Exibindo {{ $items->count() }}  itens</p>
        {{ $items->links('vendor.pagination.tailwind') }}
    </div> --}}
</div>
@endsection

@push('scripts')
<script>
    // Alternância de abas de categoria
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.category-tab');
        const items = document.querySelectorAll('.menu-item');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                const cat = this.getAttribute('data-category');

                items.forEach(item => {
                    if (cat === 'all' || item.getAttribute('data-category') === cat) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
