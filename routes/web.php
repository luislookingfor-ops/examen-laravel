<?php

use Illuminate\Support\Facades\Route;
// ESTA LÍNEA ES LA QUE SOLUCIONA EL ERROR:
use App\Http\Controllers\CitaController;

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
    return redirect()->route('citas.index');
});

Route::resource('citas', CitaController::class);
