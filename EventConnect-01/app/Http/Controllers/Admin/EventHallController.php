<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventHall;
use App\Http\Controllers\Controller; 
use App\Models\EventPackage;
use App\Models\Menu;
use App\Models\Item;
use App\Models\Image;
use App\Models\EventType;
use App\Models\Decoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventHallController extends Controller
{
    /**
     * Exibir a lista de salões de eventos.
     */
    public function index()
    {
        $halls = EventHall::where('id_user', auth()->id())->get();
    
        return view('admin.pages.halls.index', compact('halls'));
    }
    

    /**
     * Mostrar o formulário de registro de um novo salão de evento.
     */
    public function create()
    {
        return view('admin.pages.halls.create');
    }

    /**
     * Armazenar um novo salão de evento.
     */
    public function store(Request $request)
    {
        
        // Validate form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'description' => 'nullable|string|max:1000',
            'website' => 'nullable|url|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image
        ]);
    
        try {
            // Start a transaction to ensure data consistency
            DB::beginTransaction();
    
            // Create the EventHall record
            $eventHall = EventHall::create([
                'id_user' => Auth::id(),
                'name' => $request->name,
                'address' => $request->address,
                'capacity' => $request->capacity,
                'price' => $request->price,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
                'website' => $request->website,
            ]);
    
            // If there are images, process them and associate with the event hall
            if ($request->has('images')) {
                $imageIds = [];
    
                foreach ($request->file('images') as $image) {
                    // Store the image and get the stored image's path
                    $path = $image->store('event_hall_images', 'public'); // Save in 'storage/app/public/event_hall_images'
    
                    // Create an Image model for each uploaded image
                    $imageRecord = Image::create([
                        'url_img' => $path, // Save the image path in the 'images' table
                    ]);
    
                    // Collect the image IDs for the association
                    $imageIds[] = $imageRecord->id;
                }
    
                // Associate the images with the event hall in the pivot table (event_hall_images)
                foreach ($imageIds as $imageId) {
                    DB::table('event_hall_images')->insert([
                        'event_hall_id' => $eventHall->id,
                        'image_id' => $imageId,
                    ]);
                }
            }
    
            // Commit the transaction
            DB::commit();
    
            // Redirect to the event hall list with a success message
            return redirect()->route('admin.hall.index')->with('success', 'Salão de evento cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();
    
            // Return back with an error message
            return back()->withErrors(['error' => 'Erro ao cadastrar salão de evento.']);
        }
    }
    

    /**
     * Mostrar o formulário de edição.
     */
    public function edit($id)
    {
        $hall = EventHall::findOrFail($id);
        return view('admin.pages.halls.edit', compact('hall'));
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

            return redirect()->route('admin.Hall.index')->with('success', 'Salão de evento atualizado com sucesso!');
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
    public function show($id)
    {
     
        // Recupera o EventHall relacionado ao id_user do usuário autenticado
        $eventhalls = EventHall::where('id', $id)->firstOrFail();

        // Recupera os pacotes associados ao EventHall
        $packages = EventPackage::where('id_event_hall', $eventhalls->id)->get();
        $menus = Menu::all(); // Recupera todos os menus
        $decorations = Decoration::all(); // Recupera todas as decorações
        $types = EventType::all(); // Recupera todos os tipos de evento

        return view('admin.pages.packages.index', compact('eventhalls', 'menus', 'decorations', 'types','packages'));
    }

    public function storePackage(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'name' => 'required',
            'id_event_hall' => 'required|exists:event_halls,id',
            'id_menu' => 'required|exists:menus,id',
            'id_decoration' => 'required|exists:decorations,id',
            'id_event_type' => 'required|exists:event_types,id',
        ]);
    
        try {
            // Buscar os preços dos itens selecionados
            $eventHallPrice = EventHall::findOrFail($request->id_event_hall)->price;
            $menuPrice = Menu::findOrFail($request->id_menu)->price;
            $decorationPrice = Decoration::findOrFail($request->id_decoration)->price;
    
            // Calcula o preço total
            $totalPrice = $eventHallPrice + $menuPrice + $decorationPrice;
    
            // Cria o pacote
            $package = EventPackage::create([
                'id_event_hall' => $request->id_event_hall,
                'name' => 'Pacote ' . $request->name,
                'id_menu' => $request->id_menu,
                'id_decoration' => $request->id_decoration,
                'id_event_type' => $request->id_event_type,
                'total_price' => $totalPrice, // Atribui o valor calculado para o total_price
            ]);
            $this->eventHallDetails($package->eventhall->id);
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao criar o pacote. Tente novamente mais tarde.');
        }
    }

    public function showPackageDetails($id)
    {
        $package = EventPackage::findOrFail($id);
        return view('pages.eventhall.detailsPackage', compact('package'));
    }
    
}
