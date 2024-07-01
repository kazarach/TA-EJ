<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\ArchiveSellingTransaction;
use App\Models\ArchiveSellingItem;
use Illuminate\Support\Facades\DB;



class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = Product::all();
        $data1 = Customer::all();
        $data2 = PaymentMethod::all();


        return view('selling',[
            'title' => 'Selling Page',
            'sellings' => $data,
            'customers' => $data1,
            'payments' => $data2,
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
    public function storeTransaction(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total' => 'required|integer',
            'paid' => 'required|integer',
            'payment_id' => 'required|exists:payment_methods,id',
        ]);

        $transaction = \App\Models\ArchiveSellingTransaction::create($validatedData);

        return response()->json([
            'message' => 'Selling created successfully',
            'id' => $transaction->id,
            'selling' => $transaction
        ], 201);
    }
    
    public function storeItem(Request $request)
    {
        $validatedData = $request->validate([
            'transaction_id' => 'required|exists:archive_selling_transactions,id',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:products,id', 
            'items.*.quantity' => 'required|integer', 
        ]);

        DB::beginTransaction();

        try {
            $transactionId = $request->input('transaction_id');
            $items = $request->input('items');

            foreach ($items as $item) {
                $product = Product::findOrFail($item['id']);
                $quantity = $item['quantity'];

                $product->stock -= $quantity;
                $product->save();

                // foreach ($product->materials as $material) {
                //     $requiredQuantity = $material->pivot->quantity * $quantity;

                //     $material->stock += $requiredQuantity;
                //     $material->save();
                // }

                ArchiveSellingItem::create([
                    'transaction_id' => $transactionId,
                    'product_id' => $item['id'],
                    'quantity' => $quantity,
                ]);
            }

            // Commit the transaction
            DB::commit();

            return response()->json(['message' => 'Selling items created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showTransaction(string $id)
    {
//
    }
    public function show(string $id)
    {
        $show = ArchiveSellingItem::find((int)$id);

        if (!$show) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        return response()->json($show);
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
//
    }

    public function readTransaction(Request $request)
    {
        if ($request->ajax()) {
            $transactions = ArchiveSellingTransaction::with([
                'products' => function ($query) {
                    $query->with(['type', 'category', 'size', 'color', 'sign'])
                          ->withPivot('quantity'); 
                },
                'customer', 'paymentmethod'
            ])->get();
        
            $transactions = $transactions->map(function ($transaction) {
                $transaction->products->each(function ($product) {
                    $product->type = $product->type;
                    $product->category = $product->category;
                    $product->size = $product->size;
                    $product->color = $product->color;
                    $product->sign = $product->sign;
                });
                return $transaction;
            });
        
            return response()->json([
                'transactions' => $transactions,
            ]);
        }
        return view('sellingtransaction', [
            'title' => 'Product Page',
        ]);
    }

}
