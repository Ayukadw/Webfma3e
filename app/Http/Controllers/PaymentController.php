<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::with('order')->get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required',
            'proof_image' => 'required',
            'status' => 'required|in:pending,accepted,rejected'
        ]);

        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    public function show($id)
    {
        return response()->json(Payment::with('order')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return response()->json($payment);
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return response()->json(['message' => 'Payment deleted']);
    }
}
