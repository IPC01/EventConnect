<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Support\Collection;
    

class MenuController extends Controller
{
    public function index()
    {
        try {
            // Lista todos os menus associados ao usuário autenticado
            $menus = Menu::where('id_user', auth()->user()->id)->get();
            $items = Item::where('id_user', auth()->user()->id)->get(); 
            return view('admin.pages.menu.index', compact('menus','items'));
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao carregar a lista de menus. Por favor, tente novamente mais tarde.');
        }
    }
    

    public function create()
    {
        // Exibe o formulário para criar um novo menu
        $items = Item::all(); // Todos os itens disponíveis para adicionar ao menu
        return view('admin.pages.menu.create', compact('items'));
    }
    
    public function show(Request $request, $id)
    {
        $menu = Menu::with('items.category')->findOrFail($id);
    
        // Todos os itens do menu (já carregados)
        $items = $menu->items;
    
        // Filtros manuais na Collection
        if ($request->filled('search')) {
            $items = $items->filter(function ($item) use ($request) {
                return stripos($item->name, $request->search) !== false;
            });
        }
    
        if ($request->filled('status')) {
            $items = $items->filter(function ($item) use ($request) {
                return $item->status === $request->status;
            });
        }
    
        if ($request->filled('category_id')) {
            $items = $items->filter(function ($item) use ($request) {
                return $item->category_id == $request->category_id;
            });
        }
    
        // Ordenação
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $items = $items->sortBy('name');
                    break;
                case 'name_desc':
                    $items = $items->sortByDesc('name');
                    break;
                case 'price_high':
                    $items = $items->sortByDesc('price');
                    break;
                case 'price_low':
                    $items = $items->sortBy('price');
                    break;
            }
        }
    
        // Paginação manual
        $perPage = 8;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemsPaginated = new LengthAwarePaginator(
            $items->slice(($currentPage - 1) * $perPage, $perPage)->values(),
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => url()->current(), 'query' => $request->query()]
        );
    
        return view('admin.pages.items.show', [
            'items' => $itemsPaginated,
            'menu' => $menu
        ]);
    
    }

    
        public function store(Request $request)
    {
        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'items' => 'required|array', // Itens do menu
        ]);

        // Criação do menu
        $menu = Menu::create([
            'id_user' => Auth::id(), 
            'name' => $request->name,
            'price' => $request->price,
        ]);

        // Relacionando itens ao menu
        foreach ($request->items as $itemId) {
            MenuItem::create([
                'id_menu' => $menu->id,
                'id_item' => $itemId,
            ]);
        }

        return redirect()->route('admin.menus.index')->with('success', 'Menu criado com sucesso!');
    }

    public function edit($id)
    {
        // Exibe o formulário para editar um menu
        $menu = Menu::findOrFail($id);
        $items = Item::all(); // Todos os itens disponíveis
        $selectedItems = $menu->items()->pluck('id_item')->toArray(); // Itens selecionados para o menu
        return view('admin.pages.menu.edit', compact('menu', 'items', 'selectedItems'));
    }

    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'items' => 'required|array', // Itens do menu
        ]);

        // Atualiza o menu
        $menu = Menu::findOrFail($id);
        $menu->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        // Atualiza a relação com os itens
        $menu->items()->delete();
        foreach ($request->items as $itemId) {
            MenuItem::create([
                'id_menu' => $menu->id,
                'id_item' => $itemId,
            ]);
        }

        return redirect()->route('admin.menus.index')->with('success', 'Menu atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Deleta o menu
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu excluído com sucesso!');
    }
}
