<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
    return view('sucursales.index', );
    }

    public function create()
    {
        return view('sucursales.create', );
    }

    public function update()//id
    {
        

        return view('sucursales.update');
    }

    public function destroy()//id
    {
       
       //
    }
}
