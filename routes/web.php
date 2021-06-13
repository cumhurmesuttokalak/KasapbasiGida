<?php

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

Route::get('/', function () {
    return view('welcome');

});
Route::get('master',function (){
    return view('admin.master');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('index');
})->name('dashboard');
/*Route::get('/cıkış',function (){
    Auth::logout();
    return redirect('mes/login');
})->name('cıkış');
*/
Route::get('/',[PanelController::class,'index'])->name('index');
