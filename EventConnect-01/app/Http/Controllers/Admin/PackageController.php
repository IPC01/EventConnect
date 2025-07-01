<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\EventHall;
use App\Models\EventType;
use App\Models\Decoration;
use App\Models\EventPackage;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventhalls=EventHall::all();
        $types=EventType::all();
        $menus=Menu::all();
        $decorations=Decoration::all();
        $packages=EventPackage::paginate(8);
       

    return view('admin.pages.packages.index', compact(
        'eventhalls',
        'types',
        'menus',
        'decorations',
        'packages'
    ));    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



public function search(Request $request)
{
    $request->validate([
        'start_date'   => 'required|date',
        'end_date'     => 'required|date|after_or_equal:start_date',
        'guests'       => 'required|integer|min:1',
        'budget'       => 'required|numeric|min:0',
        'event_type'   => 'required|exists:event_types,id',
        'description'  => 'nullable|string',
    ]);

    $guests = $request->guests;
    $budget = $request->budget;
    $start = $request->start_date;
    $end = $request->end_date;
    $desc = trim($request->description);

    $days = \Carbon\Carbon::parse($start)->diffInDays(\Carbon\Carbon::parse($end)) + 1;
    $maxPerPackage = $budget / ($guests * $days);

    $packages = EventPackage::with(['menu.items', 'eventHall', 'decoration'])
        ->where('id_event_type', $request->event_type)
        ->where('total_price', '<=', $maxPerPackage)

        // Filtro de disponibilidade
        ->whereDoesntHave('reserves', function ($query) use ($start, $end) {
            $query->whereHas('order', function ($q) use ($start, $end) {
                $q->whereBetween('event_start_date', [$start, $end])
                  ->orWhereBetween('event_end_date', [$start, $end])
                  ->orWhere(function ($q2) use ($start, $end) {
                      $q2->where('event_start_date', '<=', $start)
                         ->where('event_end_date', '>=', $end);
                  });
            });
        })

        // ->when($desc !== '', function ($query) use ($desc) {
        //     // Isso serve como filtro adicional leve
        //     $query->where(function ($q) use ($desc) {
        //         $q->whereHas('menu', function ($menuQuery) use ($desc) {
        //             $menuQuery->where('name', 'like', "%$desc%")
        //                       ->orWhereHas('items', function ($itemQuery) use ($desc) {
        //                           $itemQuery->where('name', 'like', "%$desc%")
        //                                     ->orWhere('description', 'like', "%$desc%");
        //                       });
        //         });
        //         // Os filtros abaixo são secundários e não obrigatórios
        //         $q->orWhereHas('decoration', fn($q2) =>
        //             $q2->where('description', 'like', "%$desc%"));

        //         $q->orWhereHas('eventHall', fn($q2) =>
        //             $q2->where('description', 'like', "%$desc%"));
        //     });
        // })

        ->get();

    return view('shop.pages.packages', compact('packages'));
}


    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'id_event_hall' => 'required|exists:event_halls,id',
        'id_menu' => 'required|exists:menus,id',
        'id_decoration' => 'required|exists:decorations,id',
        'id_event_type' => 'required|exists:event_types,id',

    ]);

    // Buscar preços das relações
    $eventHallPrice = EventHall::findOrFail($validated['id_event_hall'])->price ?? 0;
    $menuPrice = Menu::findOrFail($validated['id_menu'])->price ?? 0;
    $decorationPrice = Decoration::findOrFail($validated['id_decoration'])->price ?? 0;

    // Somar preços
    $totalPrice = $eventHallPrice + $menuPrice + $decorationPrice;

    // Criar o pacote com total_price calculado
    $package = EventPackage::create([
        'name' => $validated['name'],
        'id_event_hall' => $validated['id_event_hall'],
        'id_menu' => $validated['id_menu'],
        'id_decoration' => $validated['id_decoration'],
        'id_event_type' => $validated['id_event_type'],
        'total_price' => $totalPrice,
    ]);

    return redirect()->back()->with('success', 'Pacote criado com sucesso!');
}

public function update(Request $request, $id)
{
    $package = EventPackage::findOrFail($id);

    $validated = $request->validate([
        'name' => 'sometimes|string|max:255',
        'id_event_hall' => 'sometimes|exists:event_halls,id',
        'id_menu' => 'sometimes|exists:menus,id',
        'id_decoration' => 'sometimes|exists:decorations,id',
        'id_event_type' => 'sometimes|exists:event_types,id',
       
    ]);

    // Atualizar campos passados
    $package->fill($validated);

    // Buscar os ids atuais ou os novos para calcular o preço
    $eventHallId = $validated['id_event_hall'] ?? $package->id_event_hall;
    $menuId = $validated['id_menu'] ?? $package->id_menu;
    $decorationId = $validated['id_decoration'] ?? $package->id_decoration;

    // Buscar preços
    $eventHallPrice = EventHall::findOrFail($eventHallId)->price ?? 0;
    $menuPrice = Menu::findOrFail($menuId)->price ?? 0;
    $decorationPrice = Decoration::findOrFail($decorationId)->price ?? 0;

    // Calcular preço total
    $package->total_price = $eventHallPrice + $menuPrice + $decorationPrice;

    $package->save();

    return redirect()->back()->with('success', 'Pacote atualizado com sucesso!');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

  

    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
{
    $package = EventPackage::findOrFail($id);
    $package->delete();

    return redirect()->back()->with('success', 'Pacote excluído com sucesso!');
}

}
