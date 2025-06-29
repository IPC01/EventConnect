<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Reserve;

class ReservationsController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.pages.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_event_type' => 'required|exists:event_types,id',
                'budget' => 'required|numeric|min:0',
                'id_user' => 'required|exists:users,id',
                'id_package' => 'required',
                'nr_guests' => 'required|integer|min:1',
                'event_start_date' => 'required|date|after_or_equal:today',
                'event_end_date' => 'required|date|after_or_equal:event_start_date',
                'status' => 'required|string|in:pending,accepted,rejected,cancelled',
            ]);

            Order::create($validated);

            return redirect()->back()->with('success', 'Pedido de reserva enviado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            \Log::error('Erro ao criar pedido de reserva', [
                'message' => $e->getMessage(),
                'request' => $request->all()
            ]);

            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao processar o pedido. Tente novamente mais tarde.')
                ->withInput();
        }
    }

    public function destroyorder(Order $order)
    {
        try {
            $order->delete();
            return redirect()->back()->with('success', 'Pedido excluído com sucesso!');
        } catch (\Exception $e) {
            \Log::error('Erro ao excluir pedido: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao excluir o pedido. Tente novamente mais tarde.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $newStatus = $request->input('status');

        if ($order->status === 'cancelled') {
            return back()->with('error', 'Não é possível alterar o status de um pedido cancelado.');
        }

        $order->status = $newStatus;

        if ($newStatus === 'accepted') {
            $alreadyReserved = Reserve::where('id_order', $order->id)->exists();

            if (! $alreadyReserved) {
                Reserve::create([
                    'id_order' => $order->id,
                    'id_package' => $order->id_package,
                    'total_price' => $order->budget,
                    'status_pagamento' => 'pendente',
                ]);
            }
        }

        $order->save();

        return back()->with('success', 'Status atualizado com sucesso!');
    }

    public function indexReserve(){
        $reserves=Reserve::all();
        return view('admin.pages.reserves.index',compact('reserves'));
    }
    public function destroy($id)
{
    $reserve = Reserve::findOrFail($id);
    $reserve->delete();

    return redirect()->route('admin.reserves.index')
                     ->with('success', 'Reserva excluída com sucesso!');
}
public function edit($id)
{
    $reserve = Reserve::findOrFail($id);
    return view('admin.pages.reserves.edit', compact('reserve'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'id_order' => 'required|integer',
        'id_package' => 'required|integer',
        'total_price' => 'required|numeric',
        'status_pagamento' => 'required|string',
    ]);

    $reserve = Reserve::findOrFail($id);
    $reserve->update($request->only(['id_order', 'id_package', 'total_price', 'status_pagamento']));

    return redirect()->route('admin.reserves.index')
                     ->with('success', 'Reserva atualizada com sucesso!');
}
public function toggleStatus($id)
{
    $reserve = Reserve::findOrFail($id);

    $reserve->status_pagamento = $reserve->status_pagamento === 'pago' ? 'pendente' : 'pago';
    $reserve->save();

    return redirect()->route('admin.reserves.index')
                     ->with('success', 'Status de pagamento alterado com sucesso!');
}

}
