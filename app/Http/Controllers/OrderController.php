<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catalog;
use App\Models\Customer;
use App\Models\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::with([
                'products' => function ($query) {
                    $query->with(['type', 'category', 'size', 'color', 'sign']);
                },
                'customers','catalogs'
            ])->get();

    
            return response()->json([
                'orders' => $orders,
            ]);
        }
        

        $data = Catalog::all();
        $data1 = Product::all();
        $data2 = Customer::all();


        return view('order',[
            'title' => 'Order Page',
            'catalogs' => $data,
            'products' => $data1,
            'customers' => $data2,
        ]);
    }
    public function indexbook(Request $request)
    {

        $data = Catalog::all();
        $data1 = Product::all();
        $data2 = Customer::all();


        return view('orderbook',[
            'title' => 'Order Book Page',
            'catalogs' => $data,
            'products' => $data1,
            'customers' => $data2,
        ]);
    }
    public function indexarchive(Request $request)
    {

        $data = Catalog::all();
        $data1 = Product::all();
        $data2 = Customer::all();


        return view('orderarchive',[
            'title' => 'Order Archive Page',
            'catalogs' => $data,
            'products' => $data1,
            'customers' => $data2,
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
            'catalog_id' => 'required|exists:catalogs,id',
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id', 
            'items.*.quantity' => 'required|integer', 
        ]);

        $catalogId = $validatedData['catalog_id'];
        $customerId = $validatedData['customer_id'];
        
        foreach ($validatedData['items'] as $item) {
            \App\Models\Order::create([
                'catalog_id' => $catalogId,
                'customer_id' => $customerId,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }
        return response()->json(['message' => 'Selling created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the order by ID
        $show = Order::find((int)$id);

    
        // Return the order with products and related details
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
        $order = Order::find($id);

        if ($order) {
            $validatedData = $request->validate([
                'catalog_id' => 'required|exists:catalogs,id',
                'customer_id' => 'required|exists:customers,id',
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer',
            ]);

            $order->catalog_id = $validatedData['catalog_id'];
            $order->customer_id = $validatedData['customer_id'];
            $order->product_id = $validatedData['product_id'];
            $order->quantity = $validatedData['quantity'];

            $order->save();

            return response()->json(['message' => 'Transaction updated successfully', 'product' => $order], 200);
        } else {
            return response()->json(['error' => 'Transaction not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return response()->json(['message' => 'Transaction deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Transaction not found'], 404);
        }
    }
    
    public function updateItem(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:archive_selling_orders,id',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:products,id', 
            'items.*.quantity' => 'required|integer|min:0', 
        ]);

        $orderId = $validatedData['order_id'];
        $items = $validatedData['items'];
        $order = Catalog::with('products')->find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Transaction not found'], Response::HTTP_NOT_FOUND);
        }

        $existingItems = $order->products->pluck('id')->toArray();
        $itemsToAttach = [];
        $itemsToUpdate = [];
        $itemsToDetach = [];

        foreach ($items as $item) {
            $itemId = $item['id'];
            $quantity = $item['quantity'];

            if (in_array($itemId, $existingItems)) {
                $itemsToUpdate[$itemId] = ['quantity' => $quantity];
            } else {
                $itemsToAttach[$itemId] = ['quantity' => $quantity];
            }
        }

        $itemsToDetach = array_diff($existingItems, array_column($items, 'id'));

        if (!empty($itemsToDetach)) {
            foreach ($itemsToDetach as $itemId) {
                $order->products()->detach($itemId);
            }
        }

        if (!empty($itemsToAttach)) {
            foreach ($itemsToAttach as $itemId => $data) {
                $order->products()->attach($itemId, $data);
            }
        }

        if (!empty($itemsToUpdate)) {
            foreach ($itemsToUpdate as $itemId => $data) {
                $order->products()->updateExistingPivot($itemId, $data);
            }
        }

        return response()->json(['message' => 'Transaction items updated successfully']);
    }
}
