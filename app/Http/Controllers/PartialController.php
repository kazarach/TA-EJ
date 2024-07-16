<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Models\Sign;
use App\Models\ItemGrade;
use App\Models\MaterialUnit;
use App\Models\MaterialCategory;
use App\Models\ProjectStatus;
use App\Models\MachineUse;
use App\Models\MachineStatus;
use App\Models\WorkforcePosition;
use App\Models\WorkforceStatus;
use App\Models\PaymentMethod;
use App\Models\CustomerClass;
use App\Models\ReturnCustomerCategory;
use App\Models\ReturnProductionCategory;
use App\Models\ReturnMaterialCategory;

class PartialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $type)
    {
        $model = $this->getModel($type);

        if (!$model) {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }

        return response()->json($model::all(), 200);
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
    public function store(Request $request, $type)
    {
        $model = $this->getModel($type);

        if (!$model) {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $record = new $model;
        $record->name = $validatedData['name'];
        $record->save();

        return response()->json(['message' => ucfirst($type) . ' created successfully', $type => $record], 201);
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
    public function update(Request $request, $type, $id)
    {
        $model = $this->getModel($type);

        if (!$model) {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }

        $record = $model::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $record->name = $validatedData['name'];
        $record->save();

        return response()->json(['message' => ucfirst($type) . ' updated successfully', $type => $record], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type, $id)
    {
        $model = $this->getModel($type);

        if (!$model) {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }

        $record = $model::findOrFail($id);
        $record->delete();

        return response()->json(['message' => ucfirst($type) . ' deleted successfully'], 200);
    }

    protected function getModel($type)
    {
        $models = [
            '1' => Type::class,
            '2' => Category::class,
            '3' => Size::class,
            '4' => Color::class,
            '5' => Sign::class,
            '6' => ItemGrade::class,
            '7' => MaterialUnit::class,
            '8' => MaterialCategory::class,
            '9' => ProjectStatus::class,
            '10' => MachineUse::class,
            '11' => MachineStatus::class,
            '12' => WorkforcePosition::class,
            '13' => WorkforceStatus::class,
            '14' => PaymentMethod::class,
            '15' => CustomerClass::class,
            '16' => ReturnCustomerCategory::class,
            '17' => ReturnProductionCategory::class,
            '18' => ReturnMaterialCategory::class,
        ];

        return $models[$type] ?? null;
    }
}
