<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        $variants = Variant::with(['product', 'sizes', 'images'])->get();
        return response()->json($variants);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
        ]);

        $variant = Variant::create($validatedData);

        return response()->json($variant, 201);
    }

    public function show($id)
    {
        $variant = Variant::with(['product', 'sizes', 'images'])->findOrFail($id);
        return response()->json($variant);
    }

    public function update(Request $request, $id)
    {
        $variant = Variant::findOrFail($id);

        $validatedData = $request->validate([
            'product_id' => 'sometimes|required|exists:products,id',
            'name' => 'sometimes|required|string|max:255',
        ]);

        $variant->update($validatedData);

        return response()->json($variant);
    }

    public function destroy($id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();

        return response()->json(null, 204);
    }
}
