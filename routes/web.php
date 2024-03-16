<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\PDF;
use Inertia\Inertia;
use App\Models\Producto;
use App\Models\Categoria; // Importa el modelo de Categoría
use App\Models\Marca; // Importa el modelo de Categoría
use App\Models\Unidad; // Importa el modelo de Categoría



Route::get('/', function () {
  
    return redirect()->route('login');

});

Route::get('/productospdf', function () {
    // $pdf = App::make('dompdf.wrapper');
    $productos=Producto::all();
    $pdf = PDF::loadView('pdf.productospdf', compact('productos'));
    return $pdf->stream();
})->name('productos.pdf');
Route::get('/categoriaspdf', function () {
    // $pdf = App::make('dompdf.wrapper');
    $categorias=Categoria::all();
    $pdf = PDF::loadView('pdf.categoriaspdf', compact('categorias'));
    return $pdf->stream();
})->name('categorias.pdf');
Route::get('/unidadespdf', function () {
    // $pdf = App::make('dompdf.wrapper');
    $unidades=Unidad::all();
    $pdf = PDF::loadView('pdf.unidadespdf', compact('unidades'));
    return $pdf->stream();
})->name('unidades.pdf');
Route::get('/marcaspdf', function () {
    // $pdf = App::make('dompdf.wrapper');
    $marcas=Marca::all();
    $pdf = PDF::loadView('pdf.marcaspdf', compact('marcas'));
    return $pdf->stream();
})->name('marcas.pdf');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
//Route::get('/productos/exportar-pdf', [ProductoComponent::class, 'exportPdf'])->name('productos.export.pdf');



// ->group(function () {
//     Route::get('/admin', function () {
//         return view('admin::home'); // Reemplaza 'admin::home' con el nombre correcto de tu vista de administración
//     })->name('admin.home');

//     Route::redirect('/', '/admin')->name('home'); // Redirige la raíz a la ruta /admin después de iniciar sesión
// });


// ->group(function () {
//     Route::get('/admin', function () {
//         return Inertia::render('admin::home');
//     })->name('home');
//     Route::redirect('/', '/admin')->name('home');
// });
