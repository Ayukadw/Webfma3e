<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with('user', 'items.costume')->get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'address' => 'required',
            'status' => 'required|in:pending,approved,rejected',
            'payment_status' => 'required|in:pending,verified,rejected',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show($id)
    {
        return response()->json(Order::with('user', 'items.costume', 'payment')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(['message' => 'Order deleted']);
    }
}
