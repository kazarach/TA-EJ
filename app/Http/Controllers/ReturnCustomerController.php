<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReturnCustomer;
use App\Models\ReturnCustomerCategory;
use App\Models\Product;


class ReturnCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $returns = ReturnCustomer::with([
                'products' => function ($query) {
                    $query->with(['type', 'category', 'size', 'color', 'sign']);
                },
                'customercategories'
            ])->get();

            return response()->json([
                'returns' => $returns,
            ]);
        }
        
        $returncustomers = ReturnCustomer::all();
        $products = Product::all();
        $returncustomercategories = ReturnCustomerCategory::all();
        return view('returncustomer', [
            'title' => 'Production Page',
            'returncustomers' => $returncustomers,
            'products' => $products,
            'returncustomercategories' => $returncustomercategories,
        ]);
    }
    public function indexArchive(Request $request)
    {
        $returncustomers = ReturnCustomer::all();
        $products = Product::all();
        $returncustomercategories = ReturnCustomerCategory::all();
        return view('returncustomerarchive', [
            'title' => 'Production Page',
            'returncustomers' => $returncustomers,
            'products' => $products,
            'returncustomercategories' => $returncustomercategories,
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
            '*.category_id' => 'required|exists:return_customer_categories,id',
            '*.quantity' => 'required|integer',
            '*.information' => 'required|string',
            '*.return_date' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
            $returnRecords = [];

            foreach ($request->all() as $returnData) {
                $product = Product::findOrFail($returnData['product_id']);
                $quantity = $returnData['quantity'];

                $product->stock += $quantity;
                $product->save();

                $return = ReturnCustomer::create([
                    'product_id' => $returnData['product_id'],
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
        $return = ReturnCustomer::find($id);
        if ($return) {
            $return->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
