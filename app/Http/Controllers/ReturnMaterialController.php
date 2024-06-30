<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReturnMaterial;
use App\Models\ReturnMaterialCategory;
use App\Models\Material;


class ReturnMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $returns = ReturnMaterial::with([
                'materials' => function ($query) {
                    $query->with(['materialunit', 'materialcategory']);
                },
                'materialcategories'
            ])->get();

            return response()->json([
                'returns' => $returns,
            ]);
        }
        
        $returnmaterials = ReturnMaterial::all();
        $materials = Material::all();
        $returnmaterialcategories = ReturnMaterialCategory::all();
        return view('returnmaterial', [
            'title' => 'Material Page',
            'returnmaterials' => $returnmaterials,
            'materials' => $materials,
            'returnmaterialcategories' => $returnmaterialcategories,
        ]);
    }
    public function indexArchive(Request $request)
    {
        $returnmaterials = ReturnMaterial::all();
        $materials = Material::all();
        $returnmaterialcategories = ReturnMaterialCategory::all();
        return view('returnmaterialarchive', [
            'title' => 'Material Page',
            'returnmaterials' => $returnmaterials,
            'materials' => $materials,
            'returnmaterialcategories' => $returnmaterialcategories,
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
        $request->validate([
            '*.material_id' => 'required|exists:materials,id',
            '*.category_id' => 'required|exists:return_material_categories,id',
            '*.quantity' => 'required|integer',
            '*.information' => 'required|string',
            '*.return_date' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
            $returnRecords = [];

            foreach ($request->all() as $returnData) {
                $material = Material::findOrFail($returnData['material_id']);
                $quantity = $returnData['quantity'];

                $material->stock -= $quantity;
                $material->save();

                $return = ReturnMaterial::create([
                    'material_id' => $returnData['material_id'],
                    'quantity' => $quantity,
                    'information' => $returnData['information'],
                    'category_id' => $returnData['category_id'],
                    'return_date' => $returnData['return_date'],
                ]);

                $returnRecords[] = $return;
            }

            // Commit the transaction
            DB::commit();

            return response()->json($returnRecords, 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $return = ReturnMaterial::find($id);
        if ($return) {
            $return->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
