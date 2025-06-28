<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class ReservationsController extends Controller
{
  



public function store(Request $request)
{
    $validated = $request->validate([
        'package_id' => 'required|exists:packages,id',
        'id_user' => 'required|exists:users,id',
        'nr_guests' => 'required|integer|min:1',
        'budget' => 'required|numeric|min:0',
        'event_start_date' => 'required|date|after_or_equal:today',
        'event_end_date' => 'required|date|after_or_equal:event_start_date',
        'status' => 'required|string|in:pending,confirmed,cancelled',
    ]);

    Order::create($validated);

    return redirect()->back()->with('success', 'Pedido de reserva enviado com sucesso!');
}

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
