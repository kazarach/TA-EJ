<?php

use App\Models\planning;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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




use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/dashboard', [HomeController::class, 'index'])->name('');
// });

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:admin'])->group(function () {
//     Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
// });

/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {
//     Route::get('/manager/dashboard', [HomeController::class, 'managerHome'])->name('manager.dashboard');
// });

// Route::middleware(['auth', 'permission:manage permissions'])->group(function () {
//     Route::get('/admin/manage-permissions', [AdminController::class, 'managePermissions'])->name('admin.manage-permissions');
//     Route::post('/admin/update-permissions', [AdminController::class, 'updatePermissions'])->name('admin.update-permissions');
// });

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
    // Route::get('/admin', [AdminController::class, 'index']);
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
    Route::get('/admin/selling', [SellingController::class, 'index']);
    Route::get('/admin/selling/transaction', [SellingTransactionController::class, 'index']);
    Route::get('/admin/selling/item', [SellingItemController::class, 'index']);
    Route::get('/admin/purchase', [PurchaseController::class, 'index']);
    Route::get('/admin/purchase/transaction', [PurchaseTransactionController::class, 'index']);
    Route::get('/admin/purchase/item', [PurchaseItemController::class, 'index']);
    Route::get('/admin/order', [OrderController::class, 'index']);
    Route::get('/admin/order/book', [OrderController::class, 'indexbook']);
    Route::get('/admin/order/archive', [OrderController::class, 'indexarchive']);
    Route::get('/admin/catalog', [CatalogController::class, 'index']);
    Route::get('/admin/production', [ProductionController::class, 'index']);
    Route::get('/admin/production/archive', [ProductionController::class, 'indexArchive']);
    Route::get('/admin/returncustomer', [ReturnCustomerController::class, 'index']);
    Route::get('/admin/returncustomer/archive', [ReturnCustomerController::class, 'indexArchive']);
    Route::get('/admin/returnproduction', [ReturnProductionController::class, 'index']);
    Route::get('/admin/returnproduction/archive', [ReturnProductionController::class, 'indexArchive']);
    Route::get('/admin/returnmaterial', [ReturnMaterialController::class, 'index']);
    Route::get('/admin/returnmaterial/archive', [ReturnMaterialController::class, 'indexArchive']);
    Route::get('/admin/rejectedproduct', [RejectedProductController::class, 'index']);

    // Route::post('/logout', function () {
    //     auth()->logout();
        
    //     return redirect('/login');
    // });
});

Route::middleware(['role:user'])->group(function () {
    // Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/dashboard', function () {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('user.dashboard');
    Route::get('/product', [ProductController::class, 'index'])->name('product');

});

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard', [
//             'title' => 'Dashboard'
//         ]);
//     })->name('dashboard');

//     Route::get('/schedule', function () {
//         return view('schedule', ['title' => 'Schedule Page']);
//     });

//     Route::get('/product', [ProductController::class, 'index'])->name('product');
//     Route::get('/material', [MaterialController::class, 'index']);
//     Route::get('/machine', [MachineController::class, 'index']);
//     Route::get('/workforce', [WorkforceController::class, 'index']);
//     Route::get('/project', [ProjectController::class, 'index']);
//     Route::get('/customer', [CustomerController::class, 'index']);
//     Route::get('/selling', [SellingController::class, 'index']);
//     Route::get('/selling/transaction', [SellingTransactionController::class, 'index']);
//     Route::get('/selling/item', [SellingItemController::class, 'index']);
//     Route::get('/purchase', [PurchaseController::class, 'index']);
//     Route::get('/purchase/transaction', [PurchaseTransactionController::class, 'index']);
//     Route::get('/purchase/item', [PurchaseItemController::class, 'index']);
//     Route::get('/order', [OrderController::class, 'index']);
//     Route::get('/order/book', [OrderController::class, 'indexbook']);
//     Route::get('/order/archive', [OrderController::class, 'indexarchive']);
//     Route::get('/catalog', [CatalogController::class, 'index']);
//     Route::get('/production', [ProductionController::class, 'index']);
//     Route::get('/production/archive', [ProductionController::class, 'indexArchive']);
//     Route::get('/returncustomer', [ReturnCustomerController::class, 'index']);
//     Route::get('/returncustomer/archive', [ReturnCustomerController::class, 'indexArchive']);
//     Route::get('/returnproduction', [ReturnProductionController::class, 'index']);
//     Route::get('/returnproduction/archive', [ReturnProductionController::class, 'indexArchive']);
//     Route::get('/returnmaterial', [ReturnMaterialController::class, 'index']);
//     Route::get('/returnmaterial/archive', [ReturnMaterialController::class, 'indexArchive']);
//     Route::get('/rejectedproduct', [RejectedProductController::class, 'index']);

//     Route::post('/logout', function () {
//         auth()->logout();
        
//         return redirect('/login');
//     });
// });

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard'
    ]);
})->name('dashboard');

Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page'
    ]);
})->name('home');

Route::get('/boot', function () {
    return view('bootstrap', [
        'title' => 'Production Page'
    ]);
});

Route::get('/juan', function () {
    return view('juan', [
        'title' => 'Schedule'
    ]);
});
// Route::post('/login', [LoginController::class, 'login'])->name('web.login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('web.logout');
// Route::post('/refresh', [LoginController::class, 'refresh'])->name('web.refresh');

Auth::routes();