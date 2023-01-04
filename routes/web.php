<?php

use App\Http\Controllers\ResponsaveisController;
use Illuminate\Support\Facades\Route;

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

/* Rotas para Responsavel */
Route::get('/responsaveis', [ResponsaveisController::class, 'index']);
Route::get('/responsaveis/{id}', [ResponsaveisController::class, 'show']);
Route::post('/responsaveis', [ResponsaveisController::class, 'store']);
Route::patch('/responsaveis/{id}', [ResponsaveisController::class, 'update']);