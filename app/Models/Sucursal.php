<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursales'; 
    protected $primaryKey = 'sucursal_id'; 
    public $timestamps = true;
    
    //relacion con productosucursal
    public function productoSucursal(){
        //relacion 1 a muchos con la clase productosucursal
        return $this->hasMany(ProductoSucursal::class,'sucursal_id','sucursal_id');
    }
}
