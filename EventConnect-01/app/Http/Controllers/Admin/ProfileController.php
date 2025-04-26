<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Image;
use App\Models\User;
use App\Models\EventHall;


class ProfileController extends Controller
{



    public function index(){
        $users=User::all();
        $eventhalls=EventHall::all();
        return view('dashboard',compact('users','eventhalls'));
    }
    public function create(){
        $admin=Auth::user();
        return view('pages.profile',compact('admin'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('pages.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
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
        
        return view('pages.profile',compact('admin'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
   
        // Verifica se a senha fornecida está correta
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Senha incorreta'], 403);
        }
    
        // Faz logout do usuário
        Auth::logout();
    
        // Exclui a conta do usuário
        $user->delete();
    
        // Redireciona para a página de login
        return redirect()->route('login')->with('message', 'Conta excluída com sucesso');
    }

    public function updatePassword(Request $request)
    {
        // Validar os dados recebidos
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8', // Nova senha deve ser confirmada e ter pelo menos 8 caracteres
        ]);

        // Verificar se a senha atual está correta
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'A senha atual está incorreta.']);
        }

        // Atualizar a senha
        Auth::user()->update([
            'password' => Hash::make($request->password), // Criptografando a nova senha
        ]);

        return redirect()->route('profile.create')->with('status', 'Senha atualizada com sucesso e perfil criado!');
    }
}
