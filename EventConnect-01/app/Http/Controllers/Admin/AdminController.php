<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Payment;
use App\Models\Reserve;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
 
  public function index()
{
    // Contadores de usuários
    $totalUsers = User::count();
    $totalClients = User::where('id_role', 'client')->count();
    $totalCollaborators = User::where('id_role', 'collaborator')->count();
    $totalAdmins = User::where('id_role', 'admin')->count();
    
    // Estatísticas de pedidos
    $totalOrders = Order::count();
    $pendingOrders = Order::where('status', 'pending')->count();
    $acceptedOrders = Order::where('status', 'accepted')->count();
    $rejectedOrders = Order::where('status', 'rejected')->count();
    $cancelledOrders = Order::where('status', 'cancelled')->count();
    
    // Estatísticas de pagamentos
    $totalRevenue = Payment::sum('amount');
    $totalPayments = Payment::count();
 $paidReservations = Reserve::where('status_pagamento', 'pago')->count();
$unpaidReservations = Reserve::where('status_pagamento', 'não pago')->count();

    
    // Crescimento mensal de receita (últimos 6 meses)
    $monthlyRevenue = Payment::select(
        DB::raw('YEAR(created_at) as year'),
        DB::raw('MONTH(created_at) as month'),
        DB::raw('SUM(amount) as total')
    )
    ->where('created_at', '>=', Carbon::now()->subMonths(6))
    ->groupBy('year', 'month')
    ->orderBy('year')
    ->orderBy('month')
    ->get()
    ->map(function($item) {
        return [
            'month' => Carbon::createFromDate($item->year, $item->month, 1)->format('M'),
            'total' => $item->total
        ];
    });
    
    // Crescimento semanal de receita (últimas 2 semanas)
    $weeklyRevenueArray = [];
    for ($i = 13; $i >= 0; $i--) {
        $date = Carbon::now()->subDays($i);
        $dayRevenue = Payment::whereDate('created_at', $date)->sum('amount');
        $weeklyRevenueArray[] = [
            'day' => $date->format('D'),
            'date' => $date->format('d/m'),
            'total' => $dayRevenue
        ];
    }
    // Converter o array para Collection do Laravel
    $weeklyRevenue = collect($weeklyRevenueArray);
    
    // Comparação com mês anterior
    $currentMonthRevenue = Payment::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->sum('amount');
    
    $lastMonthRevenue = Payment::whereMonth('created_at', Carbon::now()->subMonth()->month)
                              ->whereYear('created_at', Carbon::now()->subMonth()->year)
                              ->sum('amount');
    
    $revenueGrowth = $lastMonthRevenue > 0 ? 
        round((($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100, 1) : 0;
    
    // Comparação de pedidos com mês anterior
    $currentMonthOrders = Order::whereMonth('created_at', Carbon::now()->month)
                              ->whereYear('created_at', Carbon::now()->year)
                              ->count();
    
    $lastMonthOrders = Order::whereMonth('created_at', Carbon::now()->subMonth()->month)
                            ->whereYear('created_at', Carbon::now()->subMonth()->year)
                            ->count();
    
    $ordersGrowth = $lastMonthOrders > 0 ? 
        round((($currentMonthOrders - $lastMonthOrders) / $lastMonthOrders) * 100, 1) : 0;
    
    // Últimos pedidos
    $recentOrders = Order::with('user')
                       ->orderBy('created_at', 'desc')
                       ->limit(5)
                       ->get();
    
    // Estatísticas de crescimento de usuários
    $currentMonthUsers = User::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();
    
    $lastMonthUsers = User::whereMonth('created_at', Carbon::now()->subMonth()->month)
                         ->whereYear('created_at', Carbon::now()->subMonth()->year)
                         ->count();
    
    $usersGrowth = $lastMonthUsers > 0 ? 
        round((($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 1) : 0;
    
    return view('admin.pages.index', compact(
        'totalUsers',
        'totalClients', 
        'totalCollaborators',
        'totalAdmins',
        'totalOrders',
        'pendingOrders',
        'acceptedOrders',
        'rejectedOrders',
        'cancelledOrders',
        'totalRevenue',
        'totalPayments',
        'paidReservations',
        'unpaidReservations',
        'monthlyRevenue',
        'weeklyRevenue',
        'revenueGrowth',
        'ordersGrowth',
        'usersGrowth',
        'recentOrders'
    ));
}

public function indexUserDashboard()
{
    $userId = Auth::id();




    // Contagem de pedidos relacionados aos pacotes do usuário (via event_halls)
    $baseOrdersQuery = DB::table('orders')
        ->join('event_packages', 'orders.id_package', '=', 'event_packages.id')
        ->join('event_halls', 'event_packages.id_event_hall', '=', 'event_halls.id')
        ->where('event_halls.id_user', $userId);

    $totalOrders     = (clone $baseOrdersQuery)->count();
    $pendingOrders   = (clone $baseOrdersQuery)->where('orders.status', 'pending')->count();
    $acceptedOrders  = (clone $baseOrdersQuery)->where('orders.status', 'accepted')->count();
    $rejectedOrders  = (clone $baseOrdersQuery)->where('orders.status', 'rejected')->count();
    $cancelledOrders = (clone $baseOrdersQuery)->where('orders.status', 'cancelled')->count();

    // Estatísticas de reservas do usuário (via relacionamento Order→Reserve)
    $reservesQuery = Reserve::whereHas('order', fn($q) => $q->where('id_user', $userId));
    $totalReserves  = $reservesQuery->count();
    $paidReserves   = $reservesQuery->where('status_pagamento', 'pago')->count();
    $unpaidReserves = $reservesQuery->where('status_pagamento', 'pendente')->count();

    $paidReservations =Payment::
    where('owner_id', $userId)
    ->count();
    $unpaidReservations=  $totalReserves-$paidReservations;

    // Estatísticas de pagamentos feitos pelo usuário
    $paymentsQuery = Payment::where('user_id', $userId);
    $totalPayments = $paymentsQuery->count();
    $totalRevenue  = $paymentsQuery->sum('amount');

    // Crescimento mensal de receita (últimos 6 meses)
    $monthlyRevenue = (clone $paymentsQuery)
        ->select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total')
        )
        ->where('created_at', '>=', now()->subMonths(6))
        ->groupBy('year', 'month')
        ->orderBy('year')
        ->orderBy('month')
        ->get()
        ->map(fn($item) => [
            'month' => Carbon::createFromDate($item->year, $item->month, 1)->format('M'),
            'total' => $item->total,
        ]);

    // Crescimento semanal de receita (últimas 2 semanas)
    $weeklyArray = [];
    for ($i = 13; $i >= 0; $i--) {
        $date = now()->subDays($i);
        $weeklyArray[] = [
            'day'   => $date->format('D'),
            'date'  => $date->format('d/m'),
            'total' => (clone $paymentsQuery)->whereDate('created_at', $date)->sum('amount'),
        ];
    }
    $weeklyRevenue = collect($weeklyArray);

    // Crescimento comparativo do mês anterior
    $currentMonthRev = (clone $paymentsQuery)
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->sum('amount');

    $lastMonthRev = (clone $paymentsQuery)
        ->whereMonth('created_at', now()->subMonth()->month)
        ->whereYear('created_at', now()->subMonth()->year)
        ->sum('amount');

    $revenueGrowth = $lastMonthRev > 0
        ? round((($currentMonthRev - $lastMonthRev) / $lastMonthRev) * 100, 1)
        : 0;

    // Comparação de pedidos no mês anterior (considerando pedidos do usuário)
    $currentMonthOrders = Order::where('id_user', $userId)
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

    $lastMonthOrders = Order::where('id_user', $userId)
        ->whereMonth('created_at', now()->subMonth()->month)
        ->whereYear('created_at', now()->subMonth()->year)
        ->count();

    $ordersGrowth = $lastMonthOrders > 0
        ? round((($currentMonthOrders - $lastMonthOrders) / $lastMonthOrders) * 100, 1)
        : 0;

    // Últimos 5 pedidos do usuário
    $recentOrders = Order::with('eventType')
        ->where('id_user', $userId)
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    return view('admin.pages.dashbyuser', compact(
        'totalOrders',
        'paidReservations',
        'unpaidReservations',
        'pendingOrders',
        'acceptedOrders',
        'rejectedOrders',
        'cancelledOrders',
        'totalReserves',
        'paidReserves',
        'unpaidReserves',
        'totalPayments',
        'totalRevenue',
        'monthlyRevenue',
        'weeklyRevenue',
        'revenueGrowth',
        'ordersGrowth',
        'recentOrders'
    ));
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
