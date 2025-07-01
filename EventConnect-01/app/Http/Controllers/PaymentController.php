<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

  
public function index()
{
    $user = auth()->user();

    if ($user->id_role == 1) {
        // Admin: vê todos os pagamentos
        $payments = Payment::with(['user', 'owner'])->get();
    } elseif ($user->id_role == 2) {
        // Dono: vê apenas os pagamentos em que ele é o owner
        $payments = Payment::with(['user', 'owner'])
                           ->where('owner_id', $user->id)
                           ->get();
    } else {
        // Outro tipo de usuário: retorno vazio ou redirecionamento
        $payments = collect(); // Coleção vazia
    }

    return view('admin.pages.payment.index', compact('payments'));
}

   
}
