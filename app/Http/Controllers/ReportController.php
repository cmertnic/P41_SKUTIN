<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{  
    
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
    public function adminIndex()
    {
        if (!$this->isAdmin()) {
            abort(403, 'Недостаточно полномочий для доступа к этой странице.');
        }

        $orders = Order::paginate(10);
        $furnitures = Furniture::all();

        return view('admin', compact('orders', 'furnitures'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->furnitures_id = $request->input('furniture_id');
        $order->save();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'furnitures_id' => 'required|exists:furnitures,id',
        ]);

        $order = Order::findOrFail($id);
        $order->furnitures_id = $request->furnitures_id;
        $order->save();

        return redirect()->route('admin.index')->with('success', 'Статус обновлён успешно!');
    }



    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->paginate(10);
        return view('welcome', ['orders' => $orders,'furnitures']);
    }

    public function create()
    {
        $furnitures = Furniture::all();

        return view('request', compact('furnitures')); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date|max:255',
            'time' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'payment' => 'required|string|max:255',
            'count' => 'required|integer|max:255',
        ]);



        Order::create([
            'date' => $data['date'],
            'time' => $data['time'],
            'type' => $data['type'],
            'payment' => $data['payment'],
            'count' => $data['count'],
            'furniture_id' => Furniture::id(),
            'user_id' => Auth::id(),
        ]);

        Log::info('Report created successfully.');

        return redirect('/')->with('message', 'Создание заявки успешно!');
    }
}
