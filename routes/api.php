<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\WorkforceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\SellingTransactionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseTransactionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ReturnCustomerController;
use App\Http\Controllers\ReturnProductionController;
use App\Http\Controllers\ReturnMaterialController;
use App\Http\Controllers\RejectedProductController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
Route::post('/refresh', [AuthController::class, 'refresh'])->name('api.refresh');

// Public routes
Route::middleware(['auth:api'])->group(function () {

    Route::get('user/{id}', [UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'show']);
    
    Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::put('products/{id}/updateMaterials', [ProductController::class, 'updateProductMaterials']);

    Route::post('materials/', [MaterialController::class, 'store']);
    Route::get('materials/', [MaterialController::class, 'index']);
    Route::get('materials/{id}', [MaterialController::class, 'show']);
    Route::delete('materials/{id}', [MaterialController::class, 'destroy']);
    Route::put('materials/{id}', [MaterialController::class, 'update']);

    Route::post('machine/', [MachineController::class, 'store']);
    Route::get('machine/', [MachineController::class, 'index']);
    Route::get('machine/{id}', [MachineController::class, 'show']);
    Route::delete('machine/{id}', [MachineController::class, 'destroy']);
    Route::put('machine/{id}', [MachineController::class, 'update']);

    Route::post('workforce/', [WorkforceController::class, 'store']);
    Route::get('workforce/', [WorkforceController::class, 'index']);
    Route::get('workforce/{id}', [WorkforceController::class, 'show']);
    Route::delete('workforce/{id}', [WorkforceController::class, 'destroy']);
    Route::put('workforce/{id}', [WorkforceController::class, 'update']);

    Route::post('project/', [ProjectController::class, 'store']);
    Route::get('project/', [ProjectController::class, 'index']);
    Route::get('project/{id}', [ProjectController::class, 'show']);
    Route::delete('project/{id}', [ProjectController::class, 'destroy']);
    Route::put('project/{id}', [ProjectController::class, 'update']);
    Route::put('project/{id}/updateProducts', [ProjectController::class, 'updateProjectProducts']);
    Route::post('project/createProjectProducts', [ProjectController::class, 'createProjectProducts']);

    Route::get('customer/', [CustomerController::class, 'index']);
    Route::post('customer/', [CustomerController::class, 'store']);
    Route::get('customer/{id}', [CustomerController::class, 'show']);
    Route::put('customer/{id}', [CustomerController::class, 'update']);
    Route::delete('customer/{id}', [CustomerController::class, 'destroy']);

    // SELLING
    Route::get('selling/', [SellingController::class, 'index']);
    Route::post('selling/transaction/', [SellingController::class, 'storeTransaction']);
    Route::post('selling/item/', [SellingController::class, 'storeItem']);

    Route::get('/archive/selling/transaction', [SellingTransactionController::class, 'index']);
    Route::post('/archive/selling/transaction/', [SellingTransactionController::class, 'store']);
    Route::get('/archive/selling/transaction/{id}', [SellingTransactionController::class, 'show']);
    Route::put('/archive/selling/transaction/{id}', [SellingTransactionController::class, 'update']);
    Route::delete('/archive/selling/transaction/{id}', [SellingTransactionController::class, 'destroy']);
    Route::put('/archive/selling/{id}/updateItem', [SellingTransactionController::class, 'updateItem']);

    // PURCHASING
    Route::get('purchase/', [PurchaseController::class, 'index']);
    Route::post('purchase/transaction/', [PurchaseController::class, 'storeTransaction']);
    Route::post('purchase/item/', [PurchaseController::class, 'storeItem']);

    Route::get('/archive/purchase/transaction', [PurchaseTransactionController::class, 'index']);
    Route::post('/archive/purchase/transaction/', [PurchaseTransactionController::class, 'store']);
    Route::get('/archive/purchase/transaction/{id}', [PurchaseTransactionController::class, 'show']);
    Route::put('/archive/purchase/transaction/{id}', [PurchaseTransactionController::class, 'update']);
    Route::delete('/archive/purchase/transaction/{id}', [PurchaseTransactionController::class, 'destroy']);
    Route::put('/archive/purchase/{id}/updateItem', [PurchaseTransactionController::class, 'updateItem']);

    Route::get('order/', [OrderController::class, 'index']);
    Route::post('order/', [OrderController::class, 'store']);
    Route::get('order/{id}', [OrderController::class, 'show']);
    Route::put('order/{id}', [OrderController::class, 'update']);
    Route::delete('order/{id}', [OrderController::class, 'destroy']);

    Route::get('catalog/', [CatalogController::class, 'index']);
    Route::post('catalog/', [CatalogController::class, 'store']);
    Route::get('catalog/{id}', [CatalogController::class, 'show']);
    Route::put('catalog/{id}', [CatalogController::class, 'update']);
    Route::delete('catalog/{id}', [CatalogController::class, 'destroy']);

    Route::get('productions/', [ProductionController::class, 'index']);
    Route::post('productions/', [ProductionController::class, 'store']);
    // Route::get('productions/{id}', [ProductionController::class, 'show']);
    // Route::put('productions/{id}', [ProductionController::class, 'update']);
    Route::delete('productions/{id}', [ProductionController::class, 'destroy']);

    Route::get('returncustomer/', [ReturnCustomerController::class, 'index']);
    Route::post('returncustomer/', [ReturnCustomerController::class, 'store']);
    // Route::get('returncustomer/{id}', [ReturnCustomerController::class, 'show']);s
    Route::put('returncustomer/{id}', [ReturnCustomerController::class, 'update']);
    Route::delete('returncustomer/{id}', [ReturnCustomerController::class, 'destroy']);

    Route::get('returnproduction/', [ReturnProductionController::class, 'index']);
    Route::post('returnproduction/', [ReturnProductionController::class, 'store']);
    // Route::get('returnproduction/{id}', [ReturnProductionController::class, 'show']);
    // Route::put('returnproduction/{id}', [ReturnProductionController::class, 'update']);
    Route::delete('returnproduction/{id}', [ReturnProductionController::class, 'destroy']);

    Route::get('returnmaterial/', [ReturnMaterialController::class, 'index']);
    Route::post('returnmaterial/', [ReturnMaterialController::class, 'store']);
    // Route::get('returnmaterial/{id}', [ReturnMaterialController::class, 'show']);
    // Route::put('returnmaterial/{id}', [ReturnMaterialController::class, 'update']);
    Route::delete('returnmaterial/{id}', [ReturnMaterialController::class, 'destroy']);

    Route::get('rejectedproduct/', [RejectedProductController::class, 'index']);
    Route::post('rejectedproduct/', [RejectedProductController::class, 'store']);
    // Route::get('rejectedproduct/{id}', [RejectedProductController::class, 'show']);
    Route::put('rejectedproduct/{id}', [RejectedProductController::class, 'update']);
    Route::delete('rejectedproduct/{id}', [RejectedProductController::class, 'destroy']);

    // BETWEEN DATABASE
    // Route::post('/productions/{productId}/{quantity}', [ProductionController::class, 'produce']);
});
