<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $primaryKey = 'venta_id';

    public $timestamps = true;
    protected $fillable = ['venta_fecha', 'venta_total', 'cliente_id'];


    //relacion con cliente muchos a 1

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    //relacion con detallventas
     public function detalleVenta(){
        //relacion 1 a muchos con la clase detalleventa
        return $this->hasMany(DetalleVenta::class,'venta_id','venta_id');
    }
}
