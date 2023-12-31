<?php

use App\Http\Controllers\Cliente;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cadastrarCliente', [Cliente::class, 'cadastrarClienteView'])->middleware('auth')->name("cadastrarClientes");

Route::post('/cadastrarCliente', [Cliente::class, 'cadastrarCliente'])->middleware('auth');

Route::get('/listarClientes', [Cliente::class, 'listarClientes'])->middleware('auth')->name("listarClientes");

Route::get('/excluir/{id}', [Cliente::class, 'excluirCliente'])->middleware('auth');


Route::get('/atualizar/{id}', [Cliente::class, 'atualizarClienteView'])->middleware('auth');

Route::post('/atualizar/{id}', [Cliente::class, 'atualizarCliente'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
