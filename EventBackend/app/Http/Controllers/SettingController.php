<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class SettingController extends Controller
{
    // Listar todos os registros
    public function index()
    {
        $settings=Setting::first();
        return view('pages.admin.settings',compact('settings'));
    }

    // Criar novo registro
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'cancel_start_fee' => 'required|numeric|min:0',
                'cancel_end_fee' => 'required|numeric|min:0',
                'late_pct' => 'required|numeric|min:0|max:100',
                'on_time_pct' => 'required|numeric|min:0|max:100',
                'base_time' => 'required|integer|min:1',
            ]);
    
            // Verifica se já existe uma configuração
            $eventSetting = Setting::first();
    
            if ($eventSetting) {
                // Atualiza a configuração existente
                $eventSetting->update($data);
                return redirect()->back()->with('success', 'Configuração atualizada com sucesso!');
            } else {
                // Cria uma nova configuração
                $eventSetting = Setting::create($data);
                return redirect()->back()->with('success', 'Configuração criada com sucesso!');
            }
    
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro interno do servidor: ' . $e->getMessage());
        }
    }
    

    // Exibir um registro específico
    public function show($id)
    {
        try {
            $eventSetting = Setting::findOrFail($id);
            return response()->json($eventSetting, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }
    }

    // Atualizar um registro
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'cancel_start_fee' => 'sometimes|numeric|min:0',
                'cancel_end_fee' => 'sometimes|numeric|min:0',
                'late_pct' => 'sometimes|numeric|min:0|max:100',
                'on_time_pct' => 'sometimes|numeric|min:0|max:100',
                'base_time' => 'sometimes|integer|min:1',
            ]);

            $eventSetting = Setting::findOrFail($id);
            $eventSetting->update($data);

            return response()->json(['message' => 'Configuração atualizada com sucesso!', 'data' => $eventSetting], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Erro de validação', 'messages' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }
    }

    // Deletar um registro
    public function destroy($id)
    {
        try {
            $eventSetting = Setting::findOrFail($id);
            $eventSetting->delete();
            return response()->json(['message' => 'Configuração deletada com sucesso!'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }
    }
}
