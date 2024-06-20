<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;


class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $catalogs = Catalog::all();

            return response()->json([
                'catalogs' => $catalogs,
            ]);
        }

        $catalogs = Catalog::all();

        return view('catalog',[
            'title' => 'Catalog Page',
            'catalogs' => $catalogs,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        $catalog = new Catalog;
        $catalog->name = $validatedData['name'];
        $catalog->due_date = $validatedData['due_date'];
        $catalog->save();

        return response()->json(['message' => 'Catalog created successfully', 'Catalog' => $catalog], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $catalogshow = Catalog::find((int)$id);

        if (!$catalogshow) {
            return response()->json(['error' => 'Catalog not found'], 404);
        }

        return response()->json($catalogshow);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $catalog = Catalog::find($id);

        if ($catalog) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'due_date' => 'required|date',
            ]);
    
            $catalog->name = $validatedData['name'];
            $catalog->due_date = $validatedData['due_date'];
            $catalog->save();

            return response()->json(['message' => 'Catalog updated successfully', 'Catalog' => $catalog], 200);
        } else {
            return response()->json(['error' => 'Catalog not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catalog = Catalog::find($id);
        if ($catalog) {
            $catalog->delete();
            return response()->json(['message' => 'Catalog deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Catalog not found'], 404);
        }
    }
}
