<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        return response()->json(Size::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $size = Size::create($request->all());
        return response()->json($size, 201);
    }

    public function show($id)
    {
        return response()->json(Size::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $size = Size::findOrFail($id);
        $size->update($request->all());
        return response()->json($size);
    }

    public function destroy($id)
    {
        Size::destroy($id);
        return response()->json(['message' => 'Size deleted']);
    }
}
