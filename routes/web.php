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
    Route::prefix('cartorios')->group(function(){
        Route::post('/{cartorio}/ativar', 'CartorioController@ativar')->name('cartorios.ativar');
        Route::post('/{cartorio}/desativar', 'CartorioController@desativar')->name('cartorios.desativar');
        Route::post('/importar-xml', 'CartorioController@importarXML')->name('cartorios.importarxml');
        Route::get('/datatables/json', 'CartorioController@datatables')->name('cartorios.dt');
    });
    
    Route::get('read.me', 'ReadmeController@show')->name('readme');
});