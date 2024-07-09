<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Production;
use App\Models\Product;
use App\Models\Project;
use App\Models\Machine;
use App\Models\Workforce;


class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $productions = Production::with([
                'products' => function ($query) {
                    $query->with(['type', 'category', 'size', 'color', 'sign']);
                },
                'projects' => function ($query) {
                    $query->with(['projectstatus']);
                },
                'machines' => function ($query) {
                    $query->with(['machineuse', 'machinestatus']);
                },
                'workforces' => function ($query) {
                    $query->with(['workforceposition', 'workforcestatus']);
                },
            ])->get();

            return response()->json([
                'productions' => $productions,
            ]);
        }
        
        $productions = Production::all();
        $products = Product::all();
        $projects = Project::all();
        $machines = Machine::all();
        $workforces = Workforce::all();
        return view('production', [
            'productions' => $productions,
            'title' => 'Production Page',
            'productions' => $productions,
            'products' => $products,
            'projects' => $projects,
            'machines' => $machines,
            'workforces' => $workforces
        ]);
    }
    public function indexArchive(Request $request)
    {
        $productions = Production::all();
        $products = Product::all();
        $projects = Project::all();
        $machines = Machine::all();
        $workforces = Workforce::all();
        return view('productionarchive', [
            'productions' => $productions,
            'title' => 'Production Page',
            'productions' => $productions,
            'products' => $products,
            'projects' => $projects,
            'machines' => $machines,
            'workforces' => $workforces
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
            '*.quantity' => 'required|integer',
            '*.production_date' => 'required|date',
            '*.project_id' => 'required|exists:projects,id',
            '*.machines' => 'required|array',
            '*.machines.*.id' => 'required|exists:machines,id',
            '*.machines.*.status_id' => 'required|exists:machine_statuses,id',
            '*.machines.*.use_id' => 'required|exists:machine_uses,id',
            '*.workforces' => 'required|array',
            '*.workforces.*.id' => 'required|exists:workforces,id',
            '*.workforces.*.status_id' => 'required|exists:workforce_statuses,id',
            '*.workforces.*.position_id' => 'required|exists:workforce_positions,id',
        ]);

        // Start a transaction
        DB::beginTransaction();

        try {
            $productionRecords = [];

            foreach ($request->all() as $productionData) {
                $product = Product::findOrFail($productionData['product_id']);
                $quantity = $productionData['quantity'];
                $projectId = $productionData['project_id'];


                // Update product quantity
                $product->stock += $quantity;
                $product->save();

                // Deduct materials
                foreach ($product->materials as $material) {
                    $requiredQuantity = $material->pivot->quantity * $quantity;

                    $material->stock -= $requiredQuantity;
                    $material->save();
                }

                $projectProduct = DB::table('project_products')
                    ->where('project_id', $projectId)
                    ->where('product_id', $product->id)
                    ->first();
            
                if ($projectProduct) {
                    $newQuantity = $projectProduct->producted + $quantity;
            
                    DB::table('project_products')
                        ->where('project_id', $projectId)
                        ->where('product_id', $product->id)
                        ->update(['producted' => $newQuantity]);
                }

                $production = Production::create([
                    'product_id' => $productionData['product_id'],
                    'quantity' => $quantity,
                    'production_date' => $productionData['production_date'],
                    'project_id' => $productionData['project_id'],
                ]);

                foreach ($productionData['machines'] as $machineData) {
                    $production->machines()->attach($machineData['id']);
                }
        
                // Attach workforces to the production
                foreach ($productionData['workforces'] as $workforceData) {
                    $production->workforces()->attach($workforceData['id']);
                }
        

                $productionRecords[] = $production;
            }

            // Commit the transaction
            DB::commit();

            return response()->json($productionRecords, 200);
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function storeMachine(Request $request)
    {
        $request->validate([
            '*.product_id' => 'required|exists:products,id',
            '*.project_id' => 'required|exists:projects,id',
            '*.quantity' => 'required|integer',
            '*.production_date' => 'required|date',
        ]);
    
        $productions = [];
        foreach ($request->all() as $productionData) {
            $production = new Production;
            $production->product_id = $productionData['product_id'];
            $production->project_id = $productionData['project_id'];
            $production->save();
            $productions[] = $production;
        }
    
        return response()->json(['message' => 'Productions created successfully', 'productions' => $productions], 201);
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
        $production = Production::find($id);
        if ($production) {
            $production->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    // public function produce(Request $request)
    // {
    //     $request->validate([
    //         '*.product_id' => 'required|exists:products,id',
    //         '*.quantity' => 'required|integer',
    //         '*.production_date' => 'required|date',
    //         '*.project_id' => 'required|exists:projects,id',
    //     ]);

    //     // Start a transaction
    //     DB::beginTransaction();

    //     try {
    //         $productionRecords = [];

    //         foreach ($request->all() as $productionData) {
    //             $product = Product::findOrFail($productionData['product_id']);
    //             $quantity = $productionData['quantity'];

    //             // Update product quantity
    //             $product->stock += $quantity;
    //             $product->save();

    //             // Deduct materials
    //             foreach ($product->materials as $material) {
    //                 $requiredQuantity = $material->pivot->quantity * $quantity;

    //                 if ($material->stock < $requiredQuantity) {
    //                     throw new \Exception("Not enough material: {$material->name}");
    //                 }

    //                 $material->stock -= $requiredQuantity;
    //                 $material->save();
    //             }

    //             // Record the production
    //             $production = Production::create([
    //                 'product_id' => $productionData['product_id'],
    //                 'quantity' => $quantity,
    //                 'production_date' => $productionData['production_date'],
    //                 'project_id' => $productionData['project_id'],
    //             ]);

    //             $productionRecords[] = $production;
    //         }

    //         // Commit the transaction
    //         DB::commit();

    //         return response()->json($productionRecords, 200);
    //     } catch (\Exception $e) {
    //         // Rollback the transaction
    //         DB::rollBack();

    //         return response()->json(['message' => $e->getMessage()], 400);
    //     }
    // }
}
