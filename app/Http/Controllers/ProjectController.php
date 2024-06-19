<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProjectStatus;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Fetch projects from the database with related products and their sizes and colors
            $projects = Project::with([
                'products' => function ($query) {
                    $query->with(['size', 'color'])
                          ->withPivot('quantity'); // Assuming 'quantity' is the quantity field in your pivot table
                },'projectstatus'
            ])->get();
        
            // Transform projects to include nested products with sizes and colors
            $projects = $projects->map(function ($project) {
                $project->products->each(function ($product) {
                    $product->sizes = $product->size;
                    $product->colors = $product->color;
                    unset($product->sizes, $product->colors);
                });
                return $project;
            });
        
            // Return the project data including pivot table data as JSON response
            return response()->json([
                'projects' => $projects,
            ]);
        }
    
        // For non-AJAX requests, fetch all related data
        $project = Project::all();
        $status = ProjectStatus::all();

    
        return view('project', [
            'title' => 'Project Page',
            'projects' => $project,
            'statuses' => $status,
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status_id' => 'required|exists:project_statuses,id',
            // Add validation rules for other fields as necessary
        ]);
    
        // Create a new Project instance and assign the validated data
        $project = new Project;
        $project->name = $validatedData['name'];
        $project->start_date = $validatedData['start_date'];
        $project->end_date = $validatedData['end_date'];
        $project->status_id = $validatedData['status_id'];
    
        // Save the project to the database
        $project->save();
    
        // Return a JSON response indicating success and including the created project
        return response()->json(['message' => 'Project created successfully', 'project' => $project], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Use eager loading to include the related status
        $project = Project::with('projectstatus')->find((int)$id);
    
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
    
        // Append the status_name to the project data
        $projectData = [
            'id' => $project->id,
            'name' => $project->name,
            'start_date' => $project->start_date,
            'end_date' => $project->end_date,
            'status_id' => $project->status_id,
            'status_name' => $project->projectstatus ? $project->projectstatus->name : null,
            'created_at' => $project->created_at,
            'updated_at' => $project->updated_at,
        ];

        return response()->json($projectData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $popupText = "This is a simple pop-up text.";

        // Returning a plain text response
        return response($popupText);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);

        if ($project) {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'status_id' => 'required|exists:project_statuses,id',
            ]);

            // Update the project with the validated data
            $project->name = $validatedData['name'];
            $project->start_date = $validatedData['start_date'];
            $project->end_date = $validatedData['end_date'];
            $project->status_id = $validatedData['status_id'];

            // Save the changes to the database
            $project->save();

            // Return a JSON response indicating success and including the updated project
            return response()->json(['message' => 'Project updated successfully', 'project' => $project], 200);
        } else {
            // Return a JSON response indicating that the project was not found
            return response()->json(['error' => 'Project not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        if ($project) { 
            $project->delete();
            return response()->json(['message' => 'Project deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Project not found'], 404);
        }
    }


    public function updateProjectProducts(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'projectId' => 'required|exists:projects,id', // Ensure projectId exists in projects table
            'products' => 'required|array', // Ensure products is an array
            'products.*.id' => 'required|exists:products,id', // Ensure productId exists in products table
            'products.*.name' => 'required|string', // Ensure name is a string
            'products.*.code' => 'required|string', // Ensure name is a string
            'products.*.color' => 'required|string', // Ensure name is a string
            'products.*.size' => 'required|string', // Ensure name is a string
            'products.*.quantity' => 'required|integer|min:0', // Ensure quantity is a non-negative integer

        ]);

        $projectId = $request->projectId;
        $products = $request->products;

        // Retrieve the project with its products
        $project = Project::with('products')->find($projectId);

        if (!$project) {
            return response()->json(['error' => 'Project not found'], Response::HTTP_NOT_FOUND);
        }

        // Get the existing products for the project
        $existingProducts = $project->products->pluck('id')->toArray();

        // Determine which products to attach, detach, and update
        $productsToAttach = [];
        $productsToUpdate = [];
        $productsToDetach = [];

        foreach ($products as $product) {
            $productId = $product['id'];
            $quantity = $product['quantity'];
        
            if (in_array($productId, $existingProducts)) {
                // Product exists, update quantity
                $productsToUpdate[$productId] = ['quantity' => $quantity];
            } else {
                // New product, add to attach list
                $productsToAttach[$productId] = ['quantity' => $quantity];
            }
        }
        
        // Find products to detach (existing products not present in the request)
        $productsToDetach = array_diff($existingProducts, array_column($products, 'id'));
        
        // Detach products not present in the request
        if (!empty($productsToDetach)) {
            foreach ($productsToDetach as $productId) {
                $project->products()->detach($productId);
            }
        }
        
        // Attach new products
        if (!empty($productsToAttach)) {
            foreach ($productsToAttach as $productId => $data) {
                $project->products()->attach($productId, $data);
            }
        }
        
        // Update existing products
        if (!empty($productsToUpdate)) {
            foreach ($productsToUpdate as $productId => $data) {
                $project->products()->updateExistingPivot($productId, $data);
            }
        }
        
        return response()->json(['message' => 'Project products updated successfully']);
    }

    public function createProjectProducts(Request $request)
    {
        // Validate the request data
        $request->validate([
            'projectId' => 'required|exists:projects,id', // Ensure projectId exists in projects table
            'products' => 'required|array', // Ensure products is an array
            'products.*.id' => 'required|exists:products,id', // Ensure productId exists in products table
            'products.*.name' => 'required|string', // Ensure name is a string
            'products.*.start_date' => 'required|date',
            'products.*.end_date' => 'required|date|after_or_equal:start_date',
            'products.*.status_id' => 'required|exists:project_statuses,id',
        ]);

        $projectId = $request->projectId;
        $products = $request->products;

        // Retrieve the project
        $project = Project::findOrFail($projectId);

        // Attach products to the project
        foreach ($products as $product) {
            $productId = $product['id'];
            $quantity = $product['quantity'];

            // Attach the product to the project with additional data
            $project->products()->attach($productId, [
                'quantity' => $quantity,
                // Additional data if needed
            ]);
        }

        return response()->json(['message' => 'Project products created successfully']);
    }

}
