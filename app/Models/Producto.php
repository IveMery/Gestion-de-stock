<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'producto_id';

    public $timestamps = true;

    //relacion con detalle ventas
    public function detalleventa(){
        //relacion 1 a muchos con la clase detalleventa
        return $this->hasMany(DetalleVenta::class,'producto_id','producto_id');
    }
}
