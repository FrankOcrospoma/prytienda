<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  
    return redirect()->route('login');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', function () {
        return view('admin::home'); // Reemplaza 'admin::home' con el nombre correcto de tu vista de administración
    })->name('admin.home');

    Route::redirect('/', '/admin')->name('home'); // Redirige la raíz a la ruta /admin después de iniciar sesión
});
// ->group(function () {
//     Route::get('/admin', function () {
//         return Inertia::render('admin::home');
//     })->name('home');
//     Route::redirect('/', '/admin')->name('home');
// });


