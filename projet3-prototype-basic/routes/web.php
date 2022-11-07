<?php

use App\Http\Controllers\BrifeController;
use App\Http\Controllers\TacheController;
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
    return view('welcome');
});

Route::resource('gestionbrif',BrifeController::class);
route::get('/search',[BrifeController::class,'search']);
Route::resource('gestiontache',TacheController::class);
Route::get('mytache/createT/{id}',[TacheController::class,'create'])->name('mytache.createT');
// or Route::get('{id}',[TacheController::class,'create'])->name('mytache.createT');
Route::get('mytache/updateT/{id}',[TacheController::class,'edit'])->name('mytacheupdateT');
route::get('/searchT',[TacheController::class,'searchtache']);
