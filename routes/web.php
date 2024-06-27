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



use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;

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
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
});

/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/dashboard', [HomeController::class, 'managerHome'])->name('manager.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('dashboard');

    Route::get('/inventory', function () {
        return view('inventory', [
            'title' => 'Inventory Page'
        ]);
    });

    Route::get('/input-output', function () {
        return view('input', [
            'title' => 'Input-Output Item'
        ]);
    });

    Route::get('/distribution', function () {
        return view('distribution', [
            'title' => 'Distribution Page'
        ]);
    });

    Route::get('/planning', [PlanningController::class, 'index']);

    Route::get('/workforce', function () {
        return view('workforce', [
            'title' => 'Workforce Availability'
        ]);
    });

    Route::get('/schedule', function () {
        return view('schedule', [
            'title' => 'Schedule Page'
        ]);
    });

    Route::get('/machine', function () {
        return view('machine', [
            'title' => 'Machine Page'
        ]);
    });

    Route::get('/wintest', function () {
        return view('wintest', [
            'title' => 'Win Test'
        ]);
    });



    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/material', [MaterialController::class, 'index']);
    Route::get('/machine', [MachineController::class, 'index']);
    Route::get('/workforce', [WorkforceController::class, 'index']);
    Route::get('/project', [ProjectController::class, 'index']);
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/selling', [SellingController::class, 'index']);
    Route::get('/selling/transaction', [SellingTransactionController::class, 'index']);
    Route::get('/selling/item', [SellingItemController::class, 'index']);
    Route::get('/purchase', [PurchaseController::class, 'index']);
    Route::get('/purchase/transaction', [PurchaseTransactionController::class, 'index']);
    Route::get('/purchase/item', [PurchaseItemController::class, 'index']);
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order/book', [OrderController::class, 'indexbook']);
    Route::get('/order/archive', [OrderController::class, 'indexarchive']);
    Route::get('/catalog', [CatalogController::class, 'index']);
    Route::get('/production', [ProductionController::class, 'index']);
    Route::get('/production/archive', [ProductionController::class, 'indexArchive']);
    Route::get('/returncustomer', [ReturnCustomerController::class, 'index']);
    Route::get('/returncustomer/archive', [ReturnCustomerController::class, 'indexArchive']);
    Route::get('/returnproduction', [ReturnProductionController::class, 'index']);
    Route::get('/returnproduction/archive', [ReturnProductionController::class, 'indexArchive']);

    Route::get('/cash', function () {
        return view('cash', [
            'title' => 'Cash Page'
        ]);
    });

    Route::get('/report', function () {
        return view('report', [
            'title' => 'Report Page'
        ]);
    });

    Route::post('/logout', function () {
        auth()->logout();

        return redirect('/login');
    });
});

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

Route::get('/edit', function () {
    return view('insertproduction', [
        'title' => 'Edit Page'
    ]);
});

Route::get('/juan', function () {
    return view('juan', [
        'title' => 'Schedule'
    ]);
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Auth::routes();

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
