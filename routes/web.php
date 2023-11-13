<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('layouts/master');
});

//Productos

Route::get('/register_product', [ProductoController::class, 'registerProduct'])->name('register.product');
Route::get('/update_product', [ProductoController::class, 'updateProduct'])->name('update.product');
Route::get('/delete_product', [ProductoController::class, 'deleteProduct'])->name('delete.product');
Route::get('/dashboard', [ProductoController::class, 'listProduct'])->name('list.product');

//Sucursales
Route::get('/sucursales', [SucursalController::class, 'index'])->name('sucursales.index');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




