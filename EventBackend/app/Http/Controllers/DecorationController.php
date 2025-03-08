<?php

namespace App\Http\Controllers;

use App\Models\Decoration;
use App\Models\Image;
use Illuminate\Http\Request;
use Exception;
use App\Models\DecorationImg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DecorationController extends Controller
{
    /**
     * Exibe a lista de decorações.
     */
    public function index()
    {
        try {
            $decorations = Decoration::all();
            return view('pages.eventHall.listDecoration', compact('decorations'));
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao carregar a lista de decorações.');
        }
    }

    /**
     * Mostra o formulário de cadastro de decoração.
     */
    public function create()
    {
        return view('pages.eventHall.registerDecoration');
    }

    /**
     * Salva uma nova decoração no banco de dados.
     */
  
    
   
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
             'price' => 'required|numeric|min:0',
             'base_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
     
         DB::beginTransaction();
     
         try {
             // 📌 Criar a decoração no banco
             $decoration = Decoration::create([
                'id_user' => Auth::id(), 
                 'name' => $request->name,
                 'description' => $request->description,
                 'price' => $request->price,
                 'base_img' => null, // Atualizaremos após o upload
             ]);
     
             // 📌 Salvar a imagem principal
             if ($request->hasFile('base_img')) {
                 $image = $request->file('base_img');
                 $filename = 'decorations/' . time() . '_' . $image->getClientOriginalName();
     
                 // Salvar no storage
                 Storage::disk('public')->put($filename, file_get_contents($image));
     
                 // Atualizar o caminho da imagem principal na decoração
                 $decoration->update(['base_img' => $filename]);
             }
     
             // 📌 Salvar imagens adicionais
             if ($request->hasFile('additional_images')) {
                 foreach ($request->file('additional_images') as $imgFile) {
                     $imgFilename = 'decorations/' . time() . '_' . $imgFile->getClientOriginalName();
     
                     // Salvar no storage
                     Storage::disk('public')->put($imgFilename, file_get_contents($imgFile));
     
                     // Criar um registro na tabela `images`
                     $image = Image::create(['url_img' => $imgFilename]);
     
                     // Criar a relação na tabela `decoration_imgs`
                     DecorationImg::create([
                         'id_decoration' => $decoration->id,
                         'id_img' => $image->id,
                     ]);
                 }
             }
     
             DB::commit();
     
             return redirect()->route('decoration.index')->with('success', 'Decoração criada com sucesso!');
         } catch (\Exception $e) {
             DB::rollBack();
             return back()->withErrors('Erro ao criar decoração: ' . $e->getMessage());
         }
     
        }
    

    /**
     * Exibe detalhes de uma decoração específica.
     */
    public function show($id)
    {
        try {
            $decoration = Decoration::findOrFail($id);
            return view('pages.decoration.show', compact('decoration'));
        } catch (Exception $e) {
            return back()->with('error', 'Decoração não encontrada.');
        }
    }

    /**
     * Mostra o formulário de edição de decoração.
     */
    public function edit($id)
    {
        try {
            $decoration = Decoration::findOrFail($id);
            return view('pages.decoration.edit', compact('decoration'));
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao carregar a decoração para edição.');
        }
    }

    /**
     * Atualiza os dados da decoração.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'base_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $decoration = Decoration::findOrFail($id);
            $decoration->name = $request->name;
            $decoration->description = $request->description;
            $decoration->price = $request->price;

            if ($request->hasFile('base_img')) {
                $path = $request->file('base_img')->store('decorations', 'public');
                $decoration->base_img = $path;
            }

            $decoration->save();

            return redirect()->route('decoration.index')->with('success', 'Decoração atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar a decoração.');
        }
    }

    /**
     * Exclui uma decoração.
     */
    public function destroy($id)
    {
        try {
            $decoration = Decoration::findOrFail($id);
            $decoration->delete();

            return redirect()->route('decoration.index')->with('success', 'Decoração excluída com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao excluir a decoração.');
        }
    }
}
