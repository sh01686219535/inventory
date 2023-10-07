<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\backEnd\UnitController;
use App\Http\Controllers\backEnd\CustomerController;
use App\Http\Controllers\backEnd\CategoryController;
use App\Http\Controllers\backEnd\ProductController;
use App\Http\Controllers\backEnd\PurchaseController;
use App\Http\Controllers\backEnd\DefaultController;




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

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/','/login');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/profile',[AdminController::class,'profile'])->name('profile');
    Route::get('/edit-profile',[AdminController::class,'editProfile'])->name('edit.profile');
    Route::post('/store-profile',[AdminController::class,'storeProfile'])->name('store.profile');
    Route::get('/password',[AdminController::class,'password'])->name('password');
    Route::post('/update-password',[AdminController::class,'updatePassword'])->name('update.password');
    //supplier
    Route::controller(SupplierController::class)->group(function(){
       Route::get('/supplier','supplier')->name('supplier');
       Route::get('/add-supplier','addSupplier')->name('add.supplier');
       Route::post('/save-supplier','saveSupplier')->name('save.supplier');
       Route::get('/edit-supplier/{id}','editSupplier')->name('edit.supplier');
       Route::post('/update-supplier','updateSupplier')->name('update.supplier');
       Route::get('/delete-supplier/{id}','deleteSupplier')->name('delete.supplier');
    });
    //customer
    Route::controller(CustomerController::class)->group(function(){
       Route::get('/customer','customer')->name('customer');
       Route::get('/add-customer','addCustomer')->name('add.customer');
       Route::post('/save-customer','saveCustomer')->name('save.customer');
       Route::get('/edit-customer/{id}','editCustomer')->name('edit.customer');
       Route::post('/update-customer','updateCustomer')->name('update.customer');
       Route::get('/delete-customer/{id}','deleteCustomer')->name('delete.customer');
    });
    //Unit
    Route::controller(UnitController::class)->group(function(){
      Route::get('/unit','Unit')->name('unit');
      Route::get('/add-unit','addUnit')->name('add.unit');
      Route::post('/save-unit','saveUnit')->name('save.unit');
      Route::get('/edit-unit/{id}','editUnit')->name('edit.unit');
      Route::post('/update-unit','updateUnit')->name('update.unit');
      Route::get('/delete-unit/{id}','deleteUnit')->name('delete.unit');
    });
    //category
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category','category')->name('category');
        Route::get('/add-category','addCategory')->name('add.category');
        Route::post('/save-category','savecategory')->name('save.category');
        Route::get('/edit-category/{id}','editCategory')->name('edit.category');
        Route::post('/update-category','updateCategory')->name('update.category');
        Route::get('/delete-category/{id}','deletecategory')->name('delete.category');
    });
    //product
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product','product')->name('product');
        Route::get('/add-product','addProduct')->name('add.product');
        Route::post('/save-product','saveProduct')->name('save.product');
        Route::get('/edit-product/{id}','editProduct')->name('edit.product');
        Route::post('/update-product','updateProduct')->name('update.product');
        Route::get('/delete-product/{id}','deleteProduct')->name('delete.product');
    });
     //Purchase
     Route::controller(PurchaseController::class)->group(function(){
        Route::get('/purchase','purchase')->name('purchase');
        Route::get('/add.purchase','addPurchase')->name('add.purchase');
        Route::post('/save-purchase','savePurchase')->name('save.purchase');
        Route::get('/delete-purchase/{id}','deletePurchase')->name('delete.purchase');
        Route::get('/pending-purchase','pendingPurchase')->name('pending.purchase');
        Route::get('/approve-purchase/{id}','approvePurchase')->name('approve.purchase');
    });
    //Purchase
    Route::controller(DefaultController::class)->group(function(){
        Route::get('/get-category','getCategory')->name('get-category');
        Route::get('/get-product','getProduct')->name('get-product');
        // Route::post('/save-product','saveProduct')->name('save.product');
        // Route::get('/edit.product/{id}','editProduct')->name('edit.product');
        // Route::post('/update-product','updateProduct')->name('update.product');
        // Route::get('/delete-product/{id}','deleteProduct')->name('delete.product');
    });
});




