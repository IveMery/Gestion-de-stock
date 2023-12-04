<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productosucursal extends Model
{
    use HasFactory;

    protected $table = 'productosucursales';
    protected $primaryKey = 'productosucursal_id';
    protected $fillable = ['producto_id', 'sucursal_id'];

    public $timestamps = true;

    //relacion con productos muchos a 1
    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }

    //relacion con sucursal muchos a 1
    public function sucursal(){
        return $this->belongsTo(Sucursal::class,'sucursal_id');
    }

    
}
