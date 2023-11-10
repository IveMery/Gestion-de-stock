<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts/master');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/register', function () {
    return view('register_product');
});

Route::get('/update', function () {
    return view('update_product');
});

Route::get('/delete', function () {
    return view('delete_product');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
