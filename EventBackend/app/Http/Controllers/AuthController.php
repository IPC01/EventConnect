<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function roleStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:191|unique:roles,name',
        ]);

        // Criar novo Role
        $role = Role::create($validatedData);

        // Retornar resposta JSON
        return response()->json(
            [
                'message' => 'Role cadastrada com sucesso!',
                'data' => $role,
            ],
            201,
        );
    }

    public function register(Request $request)
    {
        // Validação dos dados de entrada
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'id_role' => 'required|exists:roles,id',
            'id_img' => 'nullable|exists:images,id',
        ]);

        try {
            // Criação do usuário
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'id_role' => $validated['id_role'], // Role enviado no registro
                'id_img' => $validated['id_img'] ?? null,
                'address' => $validated['address']??null,
            ]);

            // Retorno do usuário criado com sucesso
            return response()->json(
                [
                    'message' => 'Usuário registrado com sucesso!',
                    'user' => $user,
                ],
                201,
            );
        } catch (\Exception $e) {
            // Se houver algum erro inesperado, retorne uma resposta de erro
            return response()->json(
                [
                    'error' => 'Ocorreu um erro ao registrar o usuário.',
                    'message' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    public function update(Request $request, $id)
    {
        // Encontra o usuário
        $user = User::findOrFail($id);

        // Validação dos dados de entrada
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'address' => 'nullable|string|max:255',
            'id_img' => 'nullable|exists:images,id', // Imagem opcional, valida se existe na tabela images
        ]);

        // Atualiza os dados do usuário (sem alterar o id_role)
        $user->update(array_filter($validated)); // Filtra apenas os campos não nulos

        // Retorna a resposta com o usuário atualizado
        return response()->json($user);
    }

    public function login(Request $request)
    {
        // Validação dos dados de entrada
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Tentativa de login com email e senha
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            // Recupera o usuário autenticado
            $user = Auth::user();

            // Retorna o usuário autenticado com token (se necessário)
            return response()->json(
                [
                    'message' => 'Login bem-sucedido',
                    'user' => $user,
                    'token' => $user->createToken('API Token')->plainTextToken, // Gerando um token se estiver usando Sanctum ou Passport
                ],
                200,
            );
        }

        // Se falhar a autenticação
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
