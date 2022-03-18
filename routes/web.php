<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\EmailController;

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
    return view('login');
})->middleware('guest')->name('login');

Route::get('/cadastro', function () {
    return view('cadastro');
})->middleware('guest');

Route::get('/principal', [HomeController::class, 'principal'])->middleware('auth');

Route::get('/email', function () {
    return view('email');
})->middleware('auth');

Route::get('/config', [HomeController::class, 'config'])->middleware('auth');

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::post('cadastrar', [UserController::class, 'cadastrar'])->middleware('guest');

Route::post('logar', [UserController::class, 'logar'])->middleware('guest');

Route::post('enviar-config', [ConfigController::class, 'enviarConfig'])->middleware('auth');

Route::post('enviar-email', [EmailController::class, 'enviarEmail'])->middleware('auth');

Route::post('/excluirEmail/{id}', [EmailController::class, 'excluirEmail'])->middleware('auth');

Route::post('/lerEmail/{id}', [EmailController::class, 'lerEmail'])->middleware('auth');

Route::get('/principal/{id}', [HomeController::class, 'mensagem'])->middleware('auth');
