<?php

use App\Http\Controllers\AdminBingoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AdminBingoController::class, 'index']);
Route::post('/bingo/call-next-number', [AdminBingoController::class, 'callNextNumber'])->name('bingo.callNextNumber');
Route::post('/bingo/reset', [AdminBingoController::class, 'resetBingo'])->name('bingo.reset');
