<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/pessoa', [PessoaController::class, 'getAllPessoa']);
Route::post('/pessoa', [PessoaController::class, 'create']);
Route::put('/pessoa', [PessoaController::class, 'update']);
Route::delete('/pessoa', [PessoaController::class, 'delete']);