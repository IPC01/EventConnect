<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }
    public function users(){
        $users=User::all();
        return view('admin.pages.users.index',compact('users'));
    }
    public function create(){
        $roles=Role::all();
        return view('admin.pages.users.create',compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'id_role'=>['required'],
            'phone'=>['nullable']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role'=>$request->id_role,
            'phone'=>$request->phone
        ]);

        

  

        return redirect(route('admin.users.index'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Certifique-se de que você tenha o modelo de `Role` se for usá-lo para listar funções
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Método para atualizar as informações do usuário
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'id_role'=>['required'],
            'phone'=>['nullable']
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_role = $request->id_role;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect(route('admin.users.index'))->with('success', 'Usuário atualizado com sucesso.');
    }

    // Método para excluir um usuário
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Verifica se o usuário é o próprio administrador para evitar exclusão acidental
        if ($user->id == auth()->user()->id) {
            return redirect()->route('admin.users.index')->with('error', 'Você não pode excluir sua própria conta.');
        }

        $user->delete();

        return redirect(route('admin.users.index'))->with('success', 'Usuário excluído com sucesso.');
    }
    public function show(){
        
    }
}
