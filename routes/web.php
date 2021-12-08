<?php

use App\Http\Controllers\ConsolaProductoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionesController;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\ProductoController;
use App\Models\ConsolaProducto;
use App\Http\Controllers\AdminController;

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', [ConsolaProductoController::class, 'index'])->name('home.index');

//USUARIOS
Route::get('/login', [SessionesController::class, 'create'])->name('login.index');
Route::get('/registro', [UserController::class, 'create'])->name('registro.index');

Route::post('/login', [SessionesController::class, 'store'])->name('login.store');
Route::post('/registro', [UserController::class, 'store'])->name('registro.store');

Route::get('/logout', [SessionesController::class, 'destroy'])->name('login.destroy');

Route::get('/admin',[AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

//PRODUCTOS
Route::get('/producto', [ProductoController::class, 'create'])
->middleware('auth.admin')
->name('producto.create');

Route::post('/producto', [ProductoController::class, 'store'])
->middleware('auth.admin')
->name('producto.store');

//ALMACENAR
Route::get('/relacion', [ConsolaProductoController::class, 'create'])
->middleware('auth.admin')
->name('consolaProducto.index');

Route::post('/relacion', [ConsolaProductoController::class, 'store'])
->middleware('auth.admin')
->name('consolaProducto.store');

//ORDENAR
Route::get('/{categoria}', [ConsolaProductoController::class, 'consolas'])->name('consolaProducto.consola');
Route::get('/{categoria}/{producto}', [ProductoController::class, 'index'])->name('producto.index');

Route::post('/order', [ConsolaProductoController::class, 'ordene'])->name('consolaProducto.ordene');
Route::post('/nombre', [ConsolaProductoController::class, 'nombre'])->name('consolaProducto.nombre');