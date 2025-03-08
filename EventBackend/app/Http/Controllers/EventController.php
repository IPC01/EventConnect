<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventType;

class EventController extends Controller
{



    public function showEventType(){
        $types=EventType::paginate(50);
        return view('pages.admin.listEventType',compact('types'));
    }
    /**
     * Registra um novo tipo de evento.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeType(Request $request)
    {
        try {
            // Validação dos dados de entrada
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:event_types,name',
            ]);

            // Criação do novo tipo de evento
            $eventType = EventType::create($validated);

            return redirect()->route('event.list')->with('sucess', 'Acesso negado. Você não tem permissão para visualizar a lista de usuários.');


        } catch (ValidationException $e) {
            // Se falhar a validação, retorna um erro de validação
            return response()->json([
                'error' => 'Erro de Validação',
                'messages' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            // Caso outro erro aconteça
            return response()->json([
                'error' => 'Erro inesperado',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Atualiza um tipo de evento existente.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateType(Request $request, $id)
    {
        try {
            // Encontra o tipo de evento pelo ID
            $eventType = EventType::findOrFail($id);

            // Validação dos dados de entrada
            $validated = $request->validate([
                'nome' => 'sometimes|required|string|max:255|unique:event_types,nome,' . $id,
            ]);

            // Atualiza o tipo de evento
            $eventType->update($validated);

            // Retorna a resposta com o tipo de evento atualizado
            return response()->json([
                'message' => 'Tipo de evento atualizado com sucesso!',
                'event_type' => $eventType
            ], 200);

        } catch (ValidationException $e) {
            // Se falhar a validação, retorna um erro de validação
            return response()->json([
                'error' => 'Erro de Validação',
                'messages' => $e->errors()
            ], 422);

        } catch (ModelNotFoundException $e) {
            // Se o tipo de evento não for encontrado, retorna erro 404
            return response()->json([
                'error' => 'Tipo de evento não encontrado'
            ], 404);

        } catch (\Exception $e) {
            // Caso outro erro aconteça
            return response()->json([
                'error' => 'Erro inesperado',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Busca um tipo de evento pelo ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getType($id)
    {
        try {
            // Encontra o tipo de evento pelo ID
            $eventType = EventType::findOrFail($id);

            // Retorna a resposta com o tipo de evento encontrado
            return response()->json($eventType, 200);

        } catch (ModelNotFoundException $e) {
            // Se o tipo de evento não for encontrado, retorna erro 404
            return response()->json([
                'error' => 'Tipo de evento não encontrado'
            ], 404);

        } catch (\Exception $e) {
            // Caso outro erro aconteça
            return response()->json([
                'error' => 'Erro inesperado',
                'message' => $e->getMessage()
            ], 500);
        }
    }

     /**
     * Retorna todos os tipos de evento.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTypes()
    {
        try {
            // Recupera todos os tipos de evento
            $eventTypes = EventType::all();

            // Retorna a lista de tipos de evento
            return response()->json($eventTypes, 200);

        } catch (\Exception $e) {
            // Caso ocorra algum erro inesperado
            return response()->json([
                'error' => 'Erro inesperado',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
