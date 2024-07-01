<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ItemGrade;
use App\Models\RejectedProduct;

class RejectedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $returns = RejectedProduct::with([
                'products' => function ($query) {
                    $query->with(['type', 'category', 'size', 'color', 'sign']);
                },
                'itemgrades'
            ])->get();

            return response()->json([
                'returns' => $returns,
            ]);
        }
        
        $rejectedproducts = RejectedProduct::all();
        $products = Product::all();
        $grades = ItemGrade::all();
        return view('rejectedproduct', [
            'title' => 'Production Page',
            'rejectedproducts' => $rejectedproducts,
            'products' => $products,
            'grades' => $grades,
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
            '*.product_id' => 'required|exists:products,id',
            '*.grade_id' => 'required|exists:item_grades,id',
            '*.quantity' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $returnRecords = [];

            foreach ($request->all() as $returnData) {

                $return = RejectedProduct::create([
                    'product_id' => $returnData['product_id'],
                    'grade_id' => $returnData['grade_id'],
                    'quantity' => $returnData['quantity'],
                ]);

                $returnRecords[] = $return;
            }

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
        $rejected = RejectedProduct::find($id);
        if ($rejected) {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'grade_id' => 'required|exists:item_grades,id',
                'quantity' => 'required|integer',
            ]);
            $rejected->product_id = $request['product_id'];
            $rejected->grade_id = $request['grade_id'];
            $rejected->quantity = $request['quantity'];

            $rejected->save();

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
        //
    }
}
