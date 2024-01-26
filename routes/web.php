<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LiverController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
  return view('home');
})->name('home');

Route::resource('liver', LiverController::class);
Route::resource('auteur', AuteurController::class);
Route::resource('emprunt', EmpruntController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
