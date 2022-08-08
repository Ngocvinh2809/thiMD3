<?php

use App\Http\Controllers\Products;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::group(['prefix' => 'product'], function () {
    Route::get('/', [Products::class, 'index'])->name('product.index');
    Route::get('/create', [Products::class, 'create'])->name('product.create');
    Route::post('/create', [Products::class, 'store'])->name('product.store');
    Route::get('/{id}/edit', [Products::class, 'edit'])->name('product.edit');
    Route::post('/{id}/edit', [Products::class, 'update'])->name('product.update');
    Route::get('/{id}/destroy', [Products::class, 'destroy'])->name('product.destroy');
// });