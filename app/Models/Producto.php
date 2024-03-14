<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'abreviatura', 'categoria_id','marca_id','unidad_id','p_compra','p_venta' ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }
   
}
