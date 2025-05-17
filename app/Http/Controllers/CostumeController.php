<?php

namespace App\Http\Controllers;

use App\Models\Costume;
use Illuminate\Http\Request;

class CostumeController extends Controller
{
    public function index()
    {
        return response()->json(Costume::with('category', 'size')->get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'size_id' => 'required|exists:sizes,id',
            'price_per_day' => 'required|numeric',
            'stock' => 'required|integer',
            'status' => 'required|in:available,unavailable',
        ]);

        $costume = Costume::create($request->all());
        return response()->json($costume, 201);
    }

    public function show($id)
    {
        return response()->json(Costume::with('category', 'size')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $costume = Costume::findOrFail($id);
        $costume->update($request->all());
        return response()->json($costume);
    }

    public function destroy($id)
    {
        Costume::destroy($id);
        return response()->json(['message' => 'Costume deleted']);
    }
}
