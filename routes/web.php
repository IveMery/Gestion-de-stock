<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\VentasController;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('layouts/master');
});

//Productos
Route::resource('/productos', ProductoController::class);

//Ventas
Route::resource('/ventas', VentasController::class);

//Detalles
Route::resource('/detalles', DetallesController::class);

//Sucursales
Route::resource('/sucursales', SucursalController::class);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
