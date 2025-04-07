<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.show');

/* Route::get('/', function () {
    return view('welcome');
});
 */

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;

Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::patch('/carrito/actualizar/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');

// routes/web.php

// routes/web.php

use App\Http\Controllers\PerfilController;

// Ruta para mostrar el perfil
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');

// Ruta para editar el perfil
Route::get('/perfil/{id}/edit', [PerfilController::class, 'edit'])->name('perfil.edit');

// Ruta para actualizar el perfil
Route::put('/perfil/{id}', [PerfilController::class, 'update'])->name('perfil.update');

Route::get('/perfil/mis-pedidos', [PerfilController::class, 'misPedidos'])->name('perfil.misPedidos');
Route::get('/perfil/historial', [PerfilController::class, 'historial'])->name('perfil.historial');
Route::get('/perfil/pedido/{id}', [PerfilController::class, 'showPedido'])->name('perfil.showPedido');
// En web.php
Route::get('/producto/{id}', [PerfilController::class, 'showProducto'])->name('productos.show');

// Rutas para Mis Pedidos y Historial
Route::get('/perfil/{cliente}/mis-pedidos', [PerfilController::class, 'misPedidos'])->name('mis.pedidos');
Route::get('/perfil/{cliente}/historial-pedidos', [PerfilController::class, 'historialPedidos'])->name('historial.pedidos');






// Mostrar formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Procesar formulario de login
Route::post('/login', [AuthController::class, 'login']);

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta protegida: solo accesible si el usuario está autenticado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Redirección por defecto al login si no se está autenticado
Route::get('/', function () {
    return redirect('/login');
});