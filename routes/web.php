<?php

use App\Models\planning;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\WorkforceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\SellingTransactionController;
use App\Http\Controllers\SellingItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseTransactionController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ReturnCustomerController;
use App\Http\Controllers\ReturnProductionController;
use App\Http\Controllers\ReturnMaterialController;
use App\Http\Controllers\RejectedProductController;
use App\Http\Controllers\PartialController;


Route::get('/partials/sidebar-admin', function () {
    return view('partials.sidebar-admin');
});

Route::get('/partials/sidebar-user', function () {
    return view('partials.sidebar-user');
});

Route::get('/partials/sidebar-production', function () {
    return view('partials.sidebar-production');
});

Route::get('/partials/sidebar-inventory', function () {
    return view('partials.sidebar-inventory');
});

Route::get('/partials/sidebar-marketing', function () {
    return view('partials.sidebar-marketing');
});


Route::middleware(['auth:api','role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        \Log::info('Admin accessing dashboard');
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('admin.dashboard');

    Route::get('/admin/schedule', function () {
        return view('schedule', ['title' => 'Schedule Page']);
    });

    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::get('/admin/material', [MaterialController::class, 'index']);
    Route::get('/admin/machine', [MachineController::class, 'index']);
    Route::get('/admin/workforce', [WorkforceController::class, 'index']);
    Route::get('/admin/project', [ProjectController::class, 'index']);
    Route::get('/admin/customer', [CustomerController::class, 'index']);
    Route::get('/admin/catalog', [CatalogController::class, 'index']);
    Route::get('/admin/selling', [SellingController::class, 'index']);
    Route::get('/admin/selling/transaction', [SellingTransactionController::class, 'index']);
    Route::get('/admin/selling/item', [SellingItemController::class, 'index']);
    Route::get('/admin/purchase', [PurchaseController::class, 'index']);
    Route::get('/admin/purchase/transaction', [PurchaseTransactionController::class, 'index']);
    Route::get('/admin/purchase/item', [PurchaseItemController::class, 'index']);
    Route::get('/admin/order', [OrderController::class, 'index']);
    Route::get('/admin/order/book', [OrderController::class, 'indexbook']);
    Route::get('/admin/order/archive', [OrderController::class, 'indexarchive']);
    Route::get('/admin/production', [ProductionController::class, 'index']);
    Route::get('/admin/production/archive', [ProductionController::class, 'indexArchive']);
    Route::get('/admin/returncustomer', [ReturnCustomerController::class, 'index']);
    Route::get('/admin/returncustomer/archive', [ReturnCustomerController::class, 'indexArchive']);
    Route::get('/admin/returnproduction', [ReturnProductionController::class, 'index']);
    Route::get('/admin/returnproduction/archive', [ReturnProductionController::class, 'indexArchive']);
    Route::get('/admin/returnmaterial', [ReturnMaterialController::class, 'index']);
    Route::get('/admin/returnmaterial/archive', [ReturnMaterialController::class, 'indexArchive']);
    Route::get('/admin/rejectedproduct', [RejectedProductController::class, 'index']);
    Route::get('/admin/partialdropdown', function () {
        return view('partialdropdown', ['title' => 'Partial Page']);
    });
});

Route::middleware(['auth:api','role:inventory'])->group(function () {
    Route::get('/inventory/dashboard', function () {
        \Log::info('inventory accessing dashboard');
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('inventory.dashboard');

    Route::get('/inventory/product', [ProductController::class, 'index']);
    Route::get('/inventory/material', [MaterialController::class, 'index']);
    Route::get('/inventory/purchase', [PurchaseController::class, 'index']);
    Route::get('/inventory/purchase/transaction', [PurchaseTransactionController::class, 'index']);
    Route::get('/inventory/purchase/item', [PurchaseItemController::class, 'index']);
    Route::get('/inventory/returncustomer', [ReturnCustomerController::class, 'index']);
    Route::get('/inventory/returncustomer/archive', [ReturnCustomerController::class, 'indexArchive']);
    Route::get('/inventory/rejectedproduct', [RejectedProductController::class, 'index']);
});


Route::middleware(['auth:api','role:production'])->group(function () {
    Route::get('/production/dashboard', function () {
        \Log::info('production accessing dashboard');
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('production.dashboard');

    Route::get('/production/schedule', function () {
        return view('schedule', ['title' => 'Schedule Page']);
    });

    Route::get('/production/product', [ProductController::class, 'index']);
    Route::get('/production/material', [MaterialController::class, 'index']);
    Route::get('/production/machine', [MachineController::class, 'index']);
    Route::get('/production/workforce', [WorkforceController::class, 'index']);
    Route::get('/production/project', [ProjectController::class, 'index']);
    Route::get('/production/order/book', [OrderController::class, 'indexbook']);
    Route::get('/production/order/archive', [OrderController::class, 'indexarchive']);
    Route::get('/production/production', [ProductionController::class, 'index']);
    Route::get('/production/production/archive', [ProductionController::class, 'indexArchive']);
    Route::get('/production/rejectedproduct', [RejectedProductController::class, 'index']);
});

Route::middleware(['auth:api','role:marketing'])->group(function () {
    Route::get('/marketing/dashboard', function () {
        \Log::info('marketing accessing dashboard');
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('marketing.dashboard');

    Route::get('/marketing/customer', [CustomerController::class, 'index']);
    Route::get('/marketing/catalog', [CatalogController::class, 'index']);
    Route::get('/marketing/selling', [SellingController::class, 'index']);
    Route::get('/marketing/selling/transaction', [SellingTransactionController::class, 'index']);
    Route::get('/marketing/selling/item', [SellingItemController::class, 'index']);
    Route::get('/marketing/order', [OrderController::class, 'index']);
    Route::get('/marketing/order/book', [OrderController::class, 'indexbook']);
    Route::get('/marketing/order/archive', [OrderController::class, 'indexarchive']);
    Route::get('/marketing/returncustomer', [ReturnCustomerController::class, 'index']);
    Route::get('/marketing/returncustomer/archive', [ReturnCustomerController::class, 'indexArchive']);
    Route::get('/marketing/returnproduction', [ReturnProductionController::class, 'index']);
    Route::get('/marketing/returnproduction/archive', [ReturnProductionController::class, 'indexArchive']);
    Route::get('/marketing/returnmaterial', [ReturnMaterialController::class, 'index']);
    Route::get('/marketing/returnmaterial/archive', [ReturnMaterialController::class, 'indexArchive']);
    Route::get('/marketing/rejectedproduct', [RejectedProductController::class, 'index']);
});

Route::middleware(['role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('user.dashboard');
    Route::get('/product', [ProductController::class, 'index'])->name('product');
});

Route::get('/home', function () {
    \Log::info('Home 2 route accessed');
    return view('home', [
        'title' => 'Home Page'
    ]);
});
Route::get('/', function () {
    \Log::info('Home 2 route accessed');
    return view('home', [
        'title' => 'Home Page'
    ]);
});

Auth::routes();