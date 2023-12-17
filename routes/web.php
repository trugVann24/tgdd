<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AgentStoreController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductStoreController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InvoiceDetailController;

use App\Models\AgentStore;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'render'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::resource('/permissions', PermissionController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::get('/search-supplier', [SupplierController::class, 'search_supplier'])->name('search-supplier');
    Route::get('/search-staff', [StaffController::class, 'search_staff'])->name('search-staff');
    Route::get('/search-customer', [CustomerController::class, 'search_customer'])->name('search-customer');
    Route::get('/search-category', [CategoryController::class, 'search_category'])->name('search-category');
    
});
Route::middleware('auth')->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //admin
    Route::resource('/category',CategoryController::class);
    Route::resource('/supplier',SupplierController::class);
    Route::resource('/brand',BrandController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/agentstore',AgentStoreController::class);
    Route::resource('/invoicedetail',InvoiceDetailController::class);
    Route::resource('/bill',BillController::class);
    Route::resource('/staff',StaffController::class);
    Route::resource('/customer',CustomerController::class);
    Route::resource('/productstore',ProductStoreController::class);
    // Route::get('/search-suppliler', [SupplilerController::class, 'search_suppliler'])->name('search-suppliler');

});

require __DIR__.'/auth.php';



   
