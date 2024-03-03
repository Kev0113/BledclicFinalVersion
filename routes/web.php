<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

Route::get('/', [\App\Http\Controllers\MainController::class, "index"])
    ->name('index');

Route::get('/competition/{id}', [\App\Http\Controllers\MainController::class, "competition"])
    ->name("ChooseCompe");

Route::get('/match/{id}', [\App\Http\Controllers\MainController::class, "Match"])
    ->name('match');

Route::get('/rank', [\App\Http\Controllers\MainController::class, "rank"])
    ->name('rank');

Route::get('/paris', [\App\Http\Controllers\MainController::class, "paris"])
    ->name('paris');

Route::post('/parier', [\App\Http\Controllers\MainController::class, "parier"])
    ->name('parier');

Route::get('/reward/{id}', [\App\Http\Controllers\MainController::class, "reward"])
    ->name('reward');

Route::get('/team/{id}', [\App\Http\Controllers\MainController::class, "team"])
    ->name('team');

Route::get('/previous/{id}', [\App\Http\Controllers\MainController::class, "previous"])
    ->name('previous');

Route::get('/player/{id}', [\App\Http\Controllers\MainController::class, "player"])
    ->name('player');

Route::get('/profil', function (){
    return view('profil');
})
    ->middleware('auth')
    ->name('profil');

//USER
Route::post('/editProfil', [\App\Http\Controllers\UserController::class, "editProfil"])
    ->middleware('auth')
    ->name('deleteAccount');









