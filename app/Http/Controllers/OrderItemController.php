<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return response()->json(OrderItem::with('order', 'costume')->get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|exists:orders,id',
            'costume_id' => 'required|exists:costumes,id',
            'quantity' => 'required|integer',
            'price_snapshot' => 'required|numeric'
        ]);

        $item = OrderItem::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(OrderItem::with('order', 'costume')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = OrderItem::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        OrderItem::destroy($id);
        return response()->json(['message' => 'Item deleted']);
    }
}
