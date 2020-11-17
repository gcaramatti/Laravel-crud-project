<?php

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

use App\ServicosReal;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('servicosAtribuidos', 'ServicosRealController@servicosAtribuidos')->name('servicosAtribuidos');
Route::post('register', 'Auth\RegisterController@create');
Route::resource('users', 'UsuarioController');
Route::resource('ServicosReal', 'ServicosRealController');
