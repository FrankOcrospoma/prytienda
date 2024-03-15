<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Barryvdh\DomPDF\Facade\PDF;


class ProductoController extends Controller
{
    
    public function pdf() {
        $productos=Producto::all();
        $pdf = PDF::loadView('pdf.productospdf', compact('productos'));
        return $pdf->stream();
    }
}


