<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroAsistenciaController;

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


Route::group(['midlleware' => ['auth']], function () {
    Route::resource('registroasistencia',RegistroAsistenciaController::class);
    Route::resource('empleado', EmpleadoController::class);
    Route::resource('horarios', HorarioController::class);
    
});
