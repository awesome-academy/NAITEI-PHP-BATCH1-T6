<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'url' => 'required|string|max:255',
        ]);

        $image = Image::create($validatedData);

        return response()->json($image, 201);
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return response()->json($image);
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $validatedData = $request->validate([
            'url' => 'sometimes|required|string|max:255',
        ]);

        $image->update($validatedData);

        return response()->json($image);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return response()->json(null, 204);
    }
}
