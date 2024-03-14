<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['codigo','nombre'];
    public function __toString()
    {
        return $this->nombre; // Devuelve el nombre de la categoría al convertir a cadena
    }
}
