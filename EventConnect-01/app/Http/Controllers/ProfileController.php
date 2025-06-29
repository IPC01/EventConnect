<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Order;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
   public function edit()
{
    return view('user.pages.profile', ['user' => auth()->user()]);
}

   public function update(Request $request)
    {
        $admin = auth()->user(); // Obtém o usuário autenticado
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Se uma nova imagem for enviada, salvar e obter o ID
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = $image->store('uploads/profile_images', 'public');
            
            // Criar registro da imagem no banco de dados
            $imageRecord = Image::create(['url_img' => $path]);
            $admin->id_img = $imageRecord->id; // Atribuir o ID da imagem ao usuário
        }
        
        // Atualizar os dados do usuário
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        
    return back()->with('success', ' alterado com sucesso!');
    }

public function updatePassword(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = auth()->user();
    $user->password = bcrypt($request->password);
    $user->save();

    return back()->with('success', 'Senha alterada com sucesso!');
}
   public function orders(){

      $orders = Order::where('id_user', Auth::id())->get();

      return view('admin.pages.orders.index', compact('orders'));
   }
public function destroy()
{
    $user = auth()->user();
    Auth::logout();
    $user->delete();

    return redirect('/')->with('success', 'Conta apagada com sucesso.');
}


}
