<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\ProductosController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/shop', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');

/*------------------------ Rutas del Pagina de Presencia --------------------------*/
Route::resource('/', App\Http\Controllers\InicioController::class);
Route::resource('/inicio', App\Http\Controllers\InicioController::class);
//Route::name('inicio')->get('index', [LoginController::class, 'login']);

/*-------------------------------- Rutas del Login --------------------------------*/

Route::name('login')->get('login', [LoginController::class, 'login']);
Route::name('valida')->post('valida', [LoginController::class, 'valida']);
Route::name('logout')->get('logout', [LoginController::class, 'logout']);

/*-------------------------------- Rutas de Registros --------------------------------*/

Route::resource('/registros', App\Http\Controllers\RegistrosController::class);

/*-------------------------------- Rutas de Usuarios --------------------------------*/

//Route::name('usuarios')->get('index', [LoginController::class, 'usuarios']);
Route::resource('/usuarios', App\Http\Controllers\UsuariosController::class);
Route::name('modificarfile')->get('edit/{id}', [UsuariosController::class, 'edit']);
Route::name('modificar')->put('update/{id}', [UsuariosController::class, 'update']);

/*-------------------------------- Rutas de Productos --------------------------------*/

Route::resource('/productos', App\Http\Controllers\ProductosController::class);
Route::name('modificarfilep')->get('edit/{id}', [ProductosController::class, 'edit']);
Route::name('modificarp')->put('update/{id}', [ProductosController::class, 'update']);

Route::resource('/niveles', App\Http\Controllers\NivelesController::class);