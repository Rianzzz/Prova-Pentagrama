<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\RuaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
});


Route::get('relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');


Route::resource('ruas', RuaController::class);
Route::get('buscar-cep', [RuaController::class, 'buscarCep'])->name('buscar.cep');


Route::resource('bairros', BairroController::class);
Route::get('buscar-cep', [RuaController::class, 'buscarCep'])->name('buscar.cep');

Route::resource('cidades', CidadeController::class);
Route::get('buscar-cep', [RuaController::class, 'buscarCep'])->name('buscar.cep');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
