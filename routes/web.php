<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
Route::get('/empleado/create', [EmpleadoController::class, 'create'])->name('empleado.create');
Route::post('/empleado', [EmpleadoController::class, 'store'])->name('empleado.store');
Route::get('/empleado/{empleado}', [EmpleadoController::class, 'show'])->name('empleado.show');
Route::get('/empleado/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleado.edit');
Route::put('/empleado/{empleado}', [EmpleadoController::class, 'update'])->name('empleado.update');
Route::delete('/empleado/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');


Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
Route::get('/horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
Route::get('/horarios/{horario}', [HorarioController::class, 'show'])->name('horarios.show');
Route::get('/horarios/{horario}/edit', [HorarioController::class, 'edit'])->name('horarios.edit');
Route::put('/horarios/{horario}', [HorarioController::class, 'update'])->name('horarios.update');
Route::delete('/horarios/{horario}', [HorarioController::class, 'destroy'])->name('horarios.destroy');



Route::group(['midlleware' => ['auth']], function () {
   

});
