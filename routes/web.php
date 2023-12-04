<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\VentasController;
use App\Models\DetalleVenta;

Route::get('/', function () {
    return view('layouts/master');
});

//Productos
Route::resource('/productos', ProductoController::class);

//Ventas
Route::resource('/ventas', VentasController::class);

//Detalles
Route::resource('/detalles',DetallesController::class);

//Sucursales
Route::resource('/sucursales',SucursalController::class);

// Rutas de autenticación
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




