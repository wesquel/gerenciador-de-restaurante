<?php

use App\Http\Controllers\Admin\caixaController;
use App\Http\Controllers\Admin\movimentacoesController;
use App\Http\Controllers\authenticated\DashboardController;
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
Route::get('/dashboard', [DashboardController::class, 'create'])->name('dashboard');
Route::get('/dashboard/abrirMesa', [DashboardController::class, 'create'])->name('abrirMesa');
Route::put('/dashboard', [DashboardController::class, 'update'])->name('update.produtos');
Route::put('/dashboard/atualizarQntdPessoas', [DashboardController::class, 'atualizarQntdPessoas'])->name('update.pessoas');
Route::put('/dashboard/fecharConta', [DashboardController::class, 'fecharConta'])->name('fechar.conta');

Route::get('/dashboard/caixa', [caixaController::class, 'create'])->name('caixa');
Route::put('/dashboard/caixa', [caixaController::class, 'create'])->name('caixa.put');
Route::get('/dashboard/movimentacoes', [movimentacoesController::class, 'create'])->name('movimentacoes');


    Route::get('/dashboard/mesa/{id}', function ($id){
        $controller = new DashboardController();
        return $controller->mesaChanged($id);
    })->name('mesaChanged');
});

require __DIR__.'/auth.php';
