<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\VentasController;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'checklogin'], function () {
    Route::resource('/productos', ProductoController::class);
    Route::resource('/ventas', VentasController::class);
    Route::resource('/detalles', DetallesController::class);
    Route::resource('/sucursales', SucursalController::class);

});   


// ruta principal
Route::get('/', function () {
    return view('layouts/welcome');
})->middleware('guest'); 

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
