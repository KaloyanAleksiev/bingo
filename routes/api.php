<?php

use App\Http\Controllers\BingoController;
use App\Http\Controllers\PlayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/validate', [BingoController::class, 'validateNumber'])->name('validate.number');
Route::post('/score', [PlayerController::class, 'saveScore'])->name('save.score');
Route::get('/leaderboard', [PlayerController::class, 'getRanking'])->name('leadership.board');
