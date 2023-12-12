<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GoodDeliveryNoteController;
use App\Http\Controllers\Admin\GoodReceivedNoteController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AgentStoreController;

use App\Http\Controllers\SupplilerController;
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

    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{brand}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brand/update/{brand}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brand/{brand}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');

    Route::get('/goodDeliveryNote', [GoodDeliveryNoteController::class, 'index'])->name('goodDeliveryNote.index');
    Route::get('/goodDeliveryNote/create', [GoodDeliveryNoteController::class, 'create'])->name('goodDeliveryNote.create');
    Route::post('/goodDeliveryNote/store', [GoodDeliveryNoteController::class, 'store'])->name('goodDeliveryNote.store');
    Route::get('/goodDeliveryNote/edit/{goodDeliveryNote}', [GoodDeliveryNoteController::class, 'edit'])->name('goodDeliveryNote.edit');
    Route::put('/goodDeliveryNote/update/{goodDeliveryNote}', [GoodDeliveryNoteController::class, 'update'])->name('goodDeliveryNote.update');
    Route::delete('/goodDeliveryNote/{goodDeliveryNote}/destroy', [GoodDeliveryNoteController::class, 'destroy'])->name('goodDeliveryNote.destroy');

    Route::get('/goodReceivedNote', [GoodReceivedNoteController::class, 'index'])->name('goodReceivedNote.index');
    Route::get('/goodReceivedNote/create', [GoodReceivedNoteController::class, 'create'])->name('goodReceivedNote.create');
    Route::post('/goodReceivedNote/store', [GoodReceivedNoteController::class, 'store'])->name('goodReceivedNote.store');
    Route::get('/goodReceivedNote/edit/{goodReceivedNote}', [GoodReceivedNoteController::class, 'edit'])->name('goodReceivedNote.edit');
    Route::put('/goodReceivedNote/update/{goodReceivedNote}', [GoodReceivedNoteController::class, 'update'])->name('goodReceivedNote.update');
    Route::delete('/goodReceivedNote/{goodReceivedNote}/destroy', [GoodReceivedNoteController::class, 'destroy'])->name('goodReceivedNote.destroy');
});
Route::middleware('auth')->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/category',CategoryController::class);
    Route::resource('/suppliler',SupplilerController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/agentstore',AgentStoreController::class);
});

require __DIR__.'/auth.php';


//admin
    Route::resource('/category',CategoryController::class);
    Route::resource('/supplier',SupplierController::class);
    Route::resource('/brand',BrandController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/agentstore',AgentStoreController::class);
