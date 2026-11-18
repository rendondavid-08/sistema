<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table="productos";
    protected $primaryKey="codigo";
    protected $fillable =['codigo','descripcion','precio','categoria_codigo'];

}
