<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/productos',[\App\Http\Controllers\ProductoController::class, 'productos'])->name('menu.productos');
Route::post('/productos',[\App\Http\Controllers\ProductoController::class, 'productos'])->name('menu.productos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->name('producto.')->group(function() {
    Route::get('/producto', [\App\Http\Controllers\ProductoController::class, 'index'])->name('index');
    Route::post('/producto/guardar', [\App\Http\Controllers\ProductoController::class, 'guardar'])->name('guardar');
    Route::put('/producto/modificar', [\App\Http\Controllers\ProductoController::class, 'modificar'])->name('modificar');
    Route::patch('/producto/eliminar', [\App\Http\Controllers\ProductoController::class, 'eliminar'])->name('eliminar');
    Route::patch('/producto/activarInactivar', [\App\Http\Controllers\ProductoController::class, 'activarInactivar'])->name('activarInactivar');
    Route::get('/crear', [\App\Http\Controllers\ProductoController::class, 'crear'])->name('crear');
    Route::get('/editar/{id}', [\App\Http\Controllers\ProductoController::class, 'editar'])->name('editar');
    Route::get('/{slug}', [\App\Http\Controllers\ProductoController::class, 'detalle'])->name('detalle');

});

Route::post('/cambio', [\App\Http\Controllers\ProductoController::class, 'cambio'])->name('producto.cambio');
Route::post('/cambio_a_Dolar', [\App\Http\Controllers\ProductoController::class, 'cambioADolar'])->name('producto.cambioAdolar');


Route::get('lang/change', [\App\Http\Controllers\LangController::class, 'cambiar'])->name('cambiar.idioma');

require __DIR__.'/auth.php';

Route::get('/{slug}', [\App\Http\Controllers\ProductoController::class, 'detallePublico'])->name('detalle');
