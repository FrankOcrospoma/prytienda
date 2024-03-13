<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['nombre'];

}
