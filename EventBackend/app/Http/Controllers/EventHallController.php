<?php

namespace App\Http\Controllers;

use App\Models\EventHall;
use App\Models\EventPackage;
use App\Models\Menu;
use App\Models\Item;
use App\Models\EventType;
use App\Models\Decoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventHallController extends Controller
{
    /**
     * Exibir a lista de salões de eventos.
     */
    public function index()
    {
        $eventHalls = EventHall::where('id_user', auth()->id())->get();
    
        return view('pages.eventHall.list', compact('eventHalls'));
    }
    

    /**
     * Mostrar o formulário de registro de um novo salão de evento.
     */
    public function create()
    {
        return view('pages.eventHall.register');
    }

    /**
     * Armazenar um novo salão de evento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        try {
            EventHall::create([
                'id_user' => Auth::id(), // Associa o salão ao usuário autenticado
                'name' => $request->name,
                'address' => $request->address,
                'capacity' => $request->capacity,
                'price' => $request->price,
            ]);

            return redirect()->route('eventHall.list')->with('success', 'Salão de evento cadastrado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao cadastrar salão de evento.']);
        }
    }

    /**
     * Mostrar o formulário de edição.
     */
    public function edit($id)
    {
        $eventHall = EventHall::findOrFail($id);
        return view('eventHalls.edit', compact('eventHall'));
    }

    /**
     * Atualizar um salão de evento.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        try {
            $eventHall = EventHall::findOrFail($id);
            $eventHall->update($request->all());

            return redirect()->route('eventHall.index')->with('success', 'Salão de evento atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao atualizar salão de evento.']);
        }
    }

    /**
     * Excluir um salão de evento.
     */
    public function destroy($id)
    {
        try {
            $eventHall = EventHall::findOrFail($id);
            $eventHall->delete();

            return redirect()->route('eventHall.index')->with('success', 'Salão de evento excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao excluir salão de evento.']);
        }
    }
    public function eventHallDetails()
    {
        $user = Auth::user();
        
        // Recupera o EventHall relacionado ao id_user do usuário autenticado
        $eventHall = EventHall::where('id_user', $user->id)->firstOrFail();

        // Recupera os pacotes associados ao EventHall
        $packages = EventPackage::where('id_event_hall', $eventHall->id)->get();        $menus = Menu::all(); // Recupera todos os menus
        $decorations = Decoration::all(); // Recupera todas as decorações
        $eventTypes = EventType::all(); // Recupera todos os tipos de evento

        return view('pages.eventHall.details', compact('eventHall', 'menus', 'decorations', 'eventTypes','packages'));
    }

    public function storePackage(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'id_event_hall' => 'required|exists:event_halls,id',
            'id_menu' => 'required|exists:menus,id',
            'id_decoration' => 'required|exists:decorations,id',
            'id_event_type' => 'required|exists:event_types,id',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Cria o pacote
        $package = EventPackage::create([
            'id_event_hall' => $request->id_event_hall,
            'name' => 'Pacote  ' .$request->name,
            'id_menu' => $request->id_menu,
            'id_decoration' => $request->id_decoration,
            'id_event_type' => $request->id_event_type,
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('event-halls.details')->with('success', 'Pacote criado com sucesso!');
    }
}
