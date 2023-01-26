<?php

use App\Http\Controllers\ResponsaveisController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\ResponsaveisEventosRelationshipsController;
use App\Http\Controllers\ResponsaveisEventosRelatedController;
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

/* Rotas para Responsaveis */
Route::get('/responsaveis', [ResponsaveisController::class, 'index']);
Route::get('/responsaveis/{id}', [ResponsaveisController::class, 'show']);
Route::post('/responsaveis', [ResponsaveisController::class, 'store']);
Route::patch('/responsaveis/{id}', [ResponsaveisController::class, 'update']);

/* Rotas para Eventos */
Route::post('/eventos', [EventosController::class, 'store']);
Route::get('/eventos', [EventosController::class, 'index']);
Route::get('/eventos/{id}', [EventosController::class, 'show']);
// Rota que retorna o total de recursos na coleção
// Route::get('/eventos_getcount', [EventosController::class, 'getCount']);

/* Rotas para Horarios */
Route::post('/horarios', [HorariosController::class, 'store']);
Route::get('/horarios', [HorariosController::class, 'index']);
Route::get('/horarios/{id}', [HorariosController::class, 'show']);

// Relacionamentos de Responsavel com Evento
Route::get('/responsaveis/{id}/relationships/eventos', [ResponsaveisEventosRelationshipsController::class, 'index'])->name('responsaveis.relationships.eventos');
Route::get('/responsaveis/{id}/eventos', [ResponsaveisEventosRelatedController::class, 'index'])->name('responsaveis.eventos');

// Relacionamento de Evento com Responsavel
Route::get('/eventos/{id}/relationships/responsaveis', [EventosResponsaveisRelationshipsController::class, 'index'])->name('eventos.relationships.responsaveis');
Route::get('/eventos/{id}/responsaveis', [EventosResponsaveisRelatedController::class, 'index'])->name('eventos.responsaveis');

// Relacionamentos de Evento com Horario
Route::get('/eventos/{id}/relationships/horarios', [EventosHorariosRelationshipsController::class, 'index'])->name('eventos.relationships.horarios');
Route::get('/eventos/{id}/horarios', [EventosHorariosRelatedController::class, 'index'])->name('eventos.horarios');

