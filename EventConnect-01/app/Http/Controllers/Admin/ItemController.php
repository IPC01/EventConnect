<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ItemController extends Controller
{
    public function index()
    {
        // Lista todos os itens associados ao user autenticado
        $menuItems = Item::where('id_user', auth()->user()->id)->get();
        $categories=Category::all();
        return view('admin.pages.items.index', compact('menuItems','categories'));
    }
    public function create()
    {
        $categories=Category::all();
        return view('admin.pages.items.create', compact('categories'));
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'id_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id', // Valida que o category_id seja válido
        ]);
    
        DB::beginTransaction(); // Inicia a transação do banco de dados
    
        try {
            // Cria o item sem a imagem
            $item = Item::create([
                'name' => $request->name,
                'id_user' => Auth::id(), 
                'description' => $request->description,
                'id_category'=>$request->category_id
            ]);
    
            // Verifica se a imagem foi enviada
            if ($request->hasFile('id_img')) {
                // Armazena a imagem no diretório public/images e recupera o nome do arquivo
                $image = $request->file('id_img');
                $imageName = 'item_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->store('images', 'public');
                // $image->storeAs('public/images', $imageName);
    
                // Cria a imagem na tabela `images` e recupera o ID
                $imageRecord = Image::create([
                    'url_img' =>  $path
                ]);
    
                // Associa o ID da imagem ao item
                $item->update([
                    'id_img' => $imageRecord->id,
                ]);
            }
    
            DB::commit(); // Confirma a transação
    
            return redirect()->route('admin.items.index')->with('success', 'Item criado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack(); // Se ocorrer algum erro, desfaz a transação
    
            // Exibe o erro
            return back()->with('error', 'Erro ao criar o item: ' . $e->getMessage());
        }
    }
    
    public function edit($id)
    {
        // Exibe o formulário para editar um item existente
        $item = Item::findOrFail($id);
        $categories=Category::all();

        return view('admin.pages.items.edit', compact('item','categories'));
    }

    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'id_img' => 'nullable|image',
        ]);

        if ($request->hasFile('id_img')) {
            // Armazena a imagem no diretório public/images e recupera o nome do arquivo
            $image = $request->file('id_img');
            $imageName = 'item_' . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');
            // $image->storeAs('public/images', $imageName);

            // Cria a imagem na tabela `images` e recupera o ID
            $imageRecord = Image::create([
                'url_img' =>  $path
            ]);

       
        }

        // Atualiza o item
        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'id_img' => $imageRecord->id
        ]);

        return redirect()->route('admin.items.index')->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Deleta o item
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.items.index')->with('success', 'Item excluído com sucesso!');
    }
}
