<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\KanbanController;
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

Route::get('/', [KanbanController::class, 'index']);
Route::get('card/{id}', [CardController::class, 'getCardById']);
Route::post('cards', [CardController::class, 'getCards']);
Route::post('prosseguir', [CardController::class, 'prosseguir']);
Route::post('voltar', [CardController::class, 'voltar']);
