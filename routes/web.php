<?php

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout.get');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', 'HomeController@index')->name('home');

    //Cartorio
    Route::resource('cartorios', 'CartorioController');
    
    Route::get('read.me', 'HomeController@readme')->name('readme');  
});