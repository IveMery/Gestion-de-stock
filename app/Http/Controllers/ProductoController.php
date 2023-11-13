<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function registerProduct() {
        return view("register_product");
   }

   public function updateProduct() {
        return view("update_product");
    }   

    public function deleteProduct() {
        return view("delete_product");
    }   

    public function listProduct() {
        return view("dashboard");
    }

}