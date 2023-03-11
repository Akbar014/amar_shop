<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [BasicController::class, 'dashboard'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/brands', [BasicController::class, 'brand'])->name('brand');
Route::middleware(['auth:sanctum', 'verified'])->post('/store-brand',[BasicController::class, 'brandStore'])->name('store.brand');
Route::middleware(['auth:sanctum', 'verified'])->get('/brand-remove/{id}', [BasicController::class, 'brandDestroy']);
Route::middleware(['auth:sanctum', 'verified'])->resource('/products', ProductController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/stocks', StockController::class);

//customer add
Route::middleware(['auth:sanctum', 'verified'])->resource('/customers', CustomerController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/customer/data/{id}', [CustomerController::class,'details']);
// Route::get('/customer/data/{id}', CustomerController::class,'details');
Route::middleware(['auth:sanctum', 'verified'])->resource('/managers', ManagerController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/product/data/{id}', [ProductController::class,'details']);


Route::middleware(['auth:sanctum', 'verified'])->get('/show-sale', [BasicController::class, 'showSale'])->name('show.sale');
Route::middleware(['auth:sanctum', 'verified'])->get('/create-sale', [BasicController::class, 'createSale'])->name('create.sale');
Route::middleware(['auth:sanctum', 'verified'])->get('/create-sale-date', [BasicController::class, 'createSaleDate'])->name('create.sale.date');
Route::middleware(['auth:sanctum', 'verified'])->post('/sale-store', [BasicController::class, 'saveSale'])->name('sale.store');
Route::middleware(['auth:sanctum', 'verified'])->post('/sale-store-date', [BasicController::class, 'saveSaleDate'])->name('sale.store.date');
Route::middleware(['auth:sanctum', 'verified'])->get('/sale-print/{id}', [BasicController::class, 'salePrint'])->name('sale.print');
Route::middleware(['auth:sanctum', 'verified'])->get('/sale-remove/{id}', [BasicController::class, 'saleRemove']);
Route::middleware(['auth:sanctum', 'verified'])->get('/sale-edit/{id}', [BasicController::class, 'saleEdit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/sale-update/{id}', [BasicController::class, 'saleUpdate']);
Route::middleware(['auth:sanctum', 'verified'])->get('/sale_item_delete/{id}', [BasicController::class, 'saleItemDelete']);


Route::middleware(['auth:sanctum', 'verified'])->get('/show-challan', [BasicController::class, 'showChallan'])->name('show.challan');
Route::middleware(['auth:sanctum', 'verified'])->get('/create-challan', [BasicController::class, 'createChallan'])->name('create.challan');
Route::middleware(['auth:sanctum', 'verified'])->get('/create-challan-date', [BasicController::class, 'createChallanDate'])->name('create.challan.date');
Route::middleware(['auth:sanctum', 'verified'])->post('/challan-store', [BasicController::class, 'saveChallan'])->name('challan.store');
Route::middleware(['auth:sanctum', 'verified'])->post('/challan-store-date', [BasicController::class, 'saveChallanDate'])->name('challan.store.date');
Route::middleware(['auth:sanctum', 'verified'])->get('/challan-remove/{id}', [BasicController::class, 'challanRemove']);
Route::middleware(['auth:sanctum', 'verified'])->get('/challan-print/{id}', [BasicController::class, 'challanPrint'])->name('challan.print');
Route::middleware(['auth:sanctum', 'verified'])->get('/challan-edit/{id}', [BasicController::class, 'challanEdit'])->name('challan.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/challan-update/{id}', [BasicController::class, 'challanUpdate']);
Route::middleware(['auth:sanctum', 'verified'])->get('/challan_item_delete/{id}', [BasicController::class, 'challanItemDelete']);


