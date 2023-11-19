<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'cliente_id';

    public $timestamps = true;

    //relacion con venta
    public function venta(){
        //relacion 1 a muchos con la clase venta
        return $this->hasMany(Venta::class,'cliente_id','cliente_id');
    }
}
