<?php

use App\Http\Controllers\indexController;
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

Route::get('/', [indexController::class, 'create']);

Route::get('/login', [indexController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [indexController::class, 'create']);
    Route::get('/dashboard/mesa/{id}', function ($id){

    })->whereNumber('id');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard/caixa', [indexController::class, 'create']);
    Route::get('/dashboard/movimentacao', [indexController::class, 'create']);
});

require __DIR__.'/auth.php';
