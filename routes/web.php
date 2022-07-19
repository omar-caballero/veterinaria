<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\InternamientoController;
use App\Models\Internamiento;

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


Route::resource('/propietario', PropietarioController::class)->middleware('auth');
Route::resource('/mascota', MascotaController::class)->middleware('auth');
Route::resource('/raza', RazaController::class)->middleware('auth');
Route::resource('/internamiento', InternamientoController::class)->middleware('auth');



Auth::routes();

Route::get('/home', function(){return view('welcome');});

Route::get('/exportar', [InternamientoController::class,'exportar'])->name('exportar')->middleware('auth');
