<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notebook', [\App\Http\Controllers\Notebook\Notebook::class, 'index'])->name('notebook');
Route::post('/create/notebook', [\App\Http\Controllers\Notebook\Notebook::class, 'create'])->name('create.notebook');
Route::post('/update/notebook/{id}', [\App\Http\Controllers\Notebook\Notebook::class, 'update'])->name('update.notebook');
Route::delete('/delete/notebook/{id}', [\App\Http\Controllers\Notebook\Notebook::class, 'destroy'])->name('destroy.notebook');
Route::get('/show/notebook/{id}', [\App\Http\Controllers\Notebook\Notebook::class, 'show'])->name('show.notebook');
