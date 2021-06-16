<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;


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

Route::get('/' , function (){
    return view('panel.kullanicilar');

});

Route::get('/cıkış',function (){
    Auth::logout();
    return redirect('aktar/login');
})->name('cıkış');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('index');
})->name('dashboard');

Route::get('/cıkış',function (){
    Auth::logout();
    return redirect('aktar/login');
})->name('cıkıs');

Route::group(['prefix'=>'yonetim','middleware'=>'admin'] , function () {
    Route::get('/', [PanelController::class, 'index'])->name('index');
});

Route::get('/urunlist', function (){
    return view('panel.product.urunlistele');



});
Route::group(['prefix'=>'category'] , function () {
    Route::get('/', [CategoryController::class, 'CategoryEkle'])->name('create');
    Route::get('/ekle', [CategoryController::class, 'create'])->name('categorycreate');
    Route::get('/list', [CategoryController::class, 'list'])->name('categorylist');
    Route::post('/olustur',[CategoryController::class,'CategoryEkle'])->name('categoryolustur');
    Route::get('/update/{id}',[CategoryController::class,'CategoryUpdate'])->name('categoryupdate');
    Route::post('/update/{id}',[CategoryController::class,'CategoryUpdated'])->name('categoryupdated');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('categorydelete');

});
Route::group(['prefix'=>'product'] , function () {
    Route::get('/', [ProductController::class, 'productEkle'])->name('create');
    Route::get('/ekle', [ProductController::class, 'create'])->name('productcreate');
    Route::get('/list', [ProductController::class, 'list'])->name('productlist');
    Route::post('/olustur',[ProductController::class,'ProductEkle'])->name('olustur');
    Route::get('/update/{id}',[ProductController::class,'ProductUpdate'])->name('productupdate');
    Route::post('/update/{id}',[ProductController::class,'ProductUpdated'])->name('productupdated');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->name('productdelete');

});

