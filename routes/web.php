<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GoodDeliveryNoteController;
use App\Http\Controllers\Admin\GoodReceivedNoteController;
use App\Http\Controllers\Admin\InvoiceDetailController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AgentStoreController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductStoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SupplilerController;
use App\Models\InvoiceDetail;
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

    //thương hiệu
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{brand}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brand/update/{brand}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brand/{brand}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');
    //sản phẩm
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    //danh mục
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [categoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [categoryController::class, 'store'])->name('category.store');


    Route::get('/category/edit/{category}', [categoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{category}', [categoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}/destroy', [categoryController::class, 'destroy'])->name('category.destroy');
    //nhà cung cấp
    Route::get('/suppliler', [SupplilerController::class, 'index'])->name('suppliler.index');
    Route::get('/suppliler/create', [SupplilerController::class, 'create'])->name('suppliler.create');
    Route::post('/suppliler/store', [SupplilerController::class, 'store'])->name('suppliler.store');
    Route::get('/suppliler/edit/{suppliler}', [SupplilerController::class, 'edit'])->name('suppliler.edit');
    Route::put('/suppliler/update/{suppliler}', [SupplilerController::class, 'update'])->name('suppliler.update');
    Route::delete('/suppliler/{suppliler}/destroy', [SupplilerController::class, 'destroy'])->name('suppliler.destroy');
    //đại lí
    Route::get('/agentstore', [AgentStoreController::class, 'index'])->name('agentstore.index');
    Route::get('/agentstore/create', [AgentStoreController::class, 'create'])->name('agentstore.create');
    Route::post('/agentstore/store', [AgentStoreController::class, 'store'])->name('agentstore.store');
    Route::get('/agentstore/edit/{agentstore}', [AgentStoreController::class, 'edit'])->name('agentstore.edit');
    Route::put('/agentstore/update/{agentstore}', [AgentStoreController::class, 'update'])->name('agentstore.update');
    Route::delete('/agentstore/{agentstore}/destroy', [AgentStoreController::class, 'destroy'])->name('agentstore.destroy');
    //phiếu nhập    
    Route::get('/goodDeliveryNote', [GoodDeliveryNoteController::class, 'index'])->name('goodDeliveryNote.index');
    Route::get('/goodDeliveryNote/create', [GoodDeliveryNoteController::class, 'create'])->name('goodDeliveryNote.create');
    Route::post('/goodDeliveryNote/store', [GoodDeliveryNoteController::class, 'store'])->name('goodDeliveryNote.store');
    Route::get('/goodDeliveryNote/edit/{goodDeliveryNote}', [GoodDeliveryNoteController::class, 'edit'])->name('goodDeliveryNote.edit');
    Route::put('/goodDeliveryNote/update/{goodDeliveryNote}', [GoodDeliveryNoteController::class, 'update'])->name('goodDeliveryNote.update');
    Route::delete('/goodDeliveryNote/{goodDeliveryNote}/destroy', [GoodDeliveryNoteController::class, 'destroy'])->name('goodDeliveryNote.destroy');
    //phiếu xuất
    Route::get('/goodReceivedNote', [GoodReceivedNoteController::class, 'index'])->name('goodReceivedNote.index');
    Route::get('/goodReceivedNote/create', [GoodReceivedNoteController::class, 'create'])->name('goodReceivedNote.create');
    Route::post('/goodReceivedNote/store', [GoodReceivedNoteController::class, 'store'])->name('goodReceivedNote.store');
    Route::get('/goodReceivedNote/edit/{goodReceivedNote}', [GoodReceivedNoteController::class, 'edit'])->name('goodReceivedNote.edit');
    Route::put('/goodReceivedNote/update/{goodReceivedNote}', [GoodReceivedNoteController::class, 'update'])->name('goodReceivedNote.update');
    Route::delete('/goodReceivedNote/{goodReceivedNote}/destroy', [GoodReceivedNoteController::class, 'destroy'])->name('goodReceivedNote.destroy');

    //Bán hàng - Nhân viên
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{staff}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/update/{staff}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/{staff_code}/destroy', [StaffController::class, 'destroy'])->name('staff.destroy');

    //Bán hàng - khách hàng
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/edit/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/update/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{customer_id}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');

    //Bán hàng - Sản phẩm cửa hàng
    Route::get('/productstore', [ProductStoreController::class, 'index'])->name('productstore.index');
    Route::get('/productstore/create', [ProductStoreController::class, 'create'])->name('productstore.create');
    Route::post('/productstore/store', [ProductStoreController::class, 'store'])->name('productstore.store');
    Route::get('/productstore/edit/{productstore}', [ProductStoreController::class, 'edit'])->name('productstore.edit');
    Route::put('/productstore/update/{productstore}', [ProductStoreController::class, 'update'])->name('productstore.update');
    Route::delete('/productstore/{productstore_id}/destroy', [ProductStoreController::class, 'destroy'])->name('productstore.destroy');

    //Bán hàng - hóa đơn
    Route::get('/bill', [BillController::class, 'index'])->name('bill.index');
    Route::get('/bill/create', [BillController::class, 'create'])->name('bill.create');
    Route::post('/bill/store', [BillController::class, 'store'])->name('bill.store');
    Route::get('/bill/edit/{bill}', [BillController::class, 'edit'])->name('bill.edit');
    Route::put('/bill/update/{bill}', [BillController::class, 'update'])->name('bill.update');
    Route::delete('/bill/{bill_code}/destroy', [BillController::class, 'destroy'])->name('bill.destroy');

    //Bán hàng -chi tiết hóa đơn
    Route::get('/invoicedetail', [InvoiceDetailController::class, 'index'])->name('invoicedetail.index');
    Route::get('/invoicedetail/create', [InvoiceDetailController::class, 'create'])->name('invoicedetail.create');
    Route::post('/invoicedetail/store', [InvoiceDetailController::class, 'store'])->name('invoicedetail.store');
    Route::get('/invoicedetail/edit/{invoicedetail}', [InvoiceDetailController::class, 'edit'])->name('invoicedetail.edit');
    Route::put('/invoicedetail/update/{invoicedetail}', [InvoiceDetailController::class, 'update'])->name('invoicedetail.update');
    Route::delete('/invoicedetail/{invoicedetail}/destroy', [InvoiceDetailController::class, 'destroy'])->name('invoicedetail.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


//admin
