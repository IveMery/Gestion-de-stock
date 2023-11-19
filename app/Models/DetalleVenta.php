<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalleventas';
    protected $primaryKey = 'detalleventa_id';

    public $timestamps = true;

    //relacion con productos muchos a 1
    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }

    //relacion con venta muchos a 1
    public function venta(){
        return $this->belongsTo(Venta::class,'venta_id');
    }

}
