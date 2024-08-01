<?php

namespace App\Http\Controllers;

use App\Models\ImagesVariant;
use Illuminate\Http\Request;

class ImagesVariantController extends Controller
{
    public function index()
    {
        $imagesVariants = ImagesVariant::with(['image', 'variant'])->get();
        return response()->json($imagesVariants);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_id' => 'required|exists:images,id',
            'variant_id' => 'required|exists:variants,id',
        ]);

        $imagesVariant = ImagesVariant::create($validatedData);

        return response()->json($imagesVariant, 201);
    }

    public function show($id)
    {
        $imagesVariant = ImagesVariant::with(['image', 'variant'])->findOrFail($id);
        return response()->json($imagesVariant);
    }

    public function update(Request $request, $id)
    {
        $imagesVariant = ImagesVariant::findOrFail($id);

        $validatedData = $request->validate([
            'image_id' => 'sometimes|required|exists:images,id',
            'variant_id' => 'sometimes|required|exists:variants,id',
        ]);

        $imagesVariant->update($validatedData);

        return response()->json($imagesVariant);
    }

    public function destroy($id)
    {
        $imagesVariant = ImagesVariant::findOrFail($id);
        $imagesVariant->delete();

        return response()->json(null, 204);
    }
}
