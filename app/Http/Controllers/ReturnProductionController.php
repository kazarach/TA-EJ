<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReturnProduction;
use App\Models\ReturnProductionCategory;
use App\Models\Material;


class ReturnProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $returns = ReturnProduction::with([
                'materials' => function ($query) {
                    $query->with(['materialunit', 'materialcategory']);
                },
                'productioncategories'
            ])->get();

            return response()->json([
                'returns' => $returns,
            ]);
        }
        
        $returnproductions = ReturnProduction::all();
        $materials = Material::all();
        $returnproductioncategories = ReturnProductionCategory::all();
        return view('returnproduction', [
            'title' => 'Production Page',
            'returnproductions' => $returnproductions,
            'materials' => $materials,
            'returnproductioncategories' => $returnproductioncategories,
        ]);
    }
    public function indexArchive(Request $request)
    {
        $returnproductions = ReturnProduction::all();
        $materials = Material::all();
        $returnproductioncategories = ReturnProductionCategory::all();
        return view('returnproductionarchive', [
            'title' => 'Production Page',
            'returnproductions' => $returnproductions,
            'materials' => $materials,
            'returnproductioncategories' => $returnproductioncategories,
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
            '*.category_id' => 'required|exists:return_production_categories,id',
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

                $material->stock += $quantity;
                $material->save();

                $return = ReturnProduction::create([
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
        $return = ReturnProduction::find($id);
        if ($return) {
            $request->validate([
                'material_id' => 'required|exists:materials,id',
                'category_id' => 'required|exists:return_production_categories,id',
                'quantity' => 'required|integer',
                'information' => 'required|string',
                'return_date' => 'required|date',
            ]);
            $return->material_id = $request['material_id'];
            $return->category_id = $request['category_id'];
            $return->quantity = $request['quantity'];
            $return->information = $request['information'];
            $return->return_date = $request['return_date'];

            $return->save();

            return response()->json(['message' => 'Product updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $return = ReturnProduction::find($id);
        if ($return) {
            $return->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
