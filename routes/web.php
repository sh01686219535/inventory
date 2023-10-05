<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupplierController;


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
       Route::post('/update.supplier','updateSupplier')->name('update.supplier');
       Route::get('/delete.supplier/{id}','deleteSupplier')->name('delete.supplier');
    });
});


