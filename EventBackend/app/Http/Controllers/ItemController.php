<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ItemController extends Controller
{
    public function index()
    {
        // Lista todos os itens associados ao user autenticado
        $items = Item::where('id_user', auth()->user()->id)->get();
        return view('pages.eventHall.listItem', compact('items'));
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'id_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        DB::beginTransaction(); // Inicia a transação do banco de dados
    
        try {
            // Cria o item sem a imagem
            $item = Item::create([
                'name' => $request->name,
                'id_user' => Auth::id(), 
                'description' => $request->description,
            ]);
    
            // Verifica se a imagem foi enviada
            if ($request->hasFile('id_img')) {
                // Armazena a imagem no diretório public/images e recupera o nome do arquivo
                $image = $request->file('id_img');
                $imageName = 'item_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
    
                // Cria a imagem na tabela `images` e recupera o ID
                $imageRecord = Image::create([
                    'url_img' => 'images/' . $imageName,
                ]);
    
                // Associa o ID da imagem ao item
                $item->update([
                    'id_img' => $imageRecord->id,
                ]);
            }
    
            DB::commit(); // Confirma a transação
    
            return redirect()->route('item.index')->with('success', 'Item criado com sucesso!');
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
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'id_img' => 'nullable|image',
        ]);

        // Atualiza o item
        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'id_img' => $request->file('id_img') ? $request->file('id_img')->store('images') : $item->id_img,
        ]);

        return redirect()->route('item.index')->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Deleta o item
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('item.index')->with('success', 'Item excluído com sucesso!');
    }
}
