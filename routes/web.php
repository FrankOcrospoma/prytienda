<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Inertia\Inertia;



Route::get('/', function () {
  
    return redirect()->route('login');

});

Route::get('/pdf', [ProductoController::class, 'pdf'] )->name('productos.pdf');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});



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
