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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/programador', function () {
    return view('static.programador');
});

Route::get('/versoes', function () {
    return view('static.versoes');
});

Route::get('/list/oms', 'OmController@listaSimples');


// confirma o serial para usuários se autenticarem
Route::post('/recebeserial', 'TokenAcessoController@getSerial');


// Authenticated application routes
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // controles de usuario
    Route::resource('/admin/usermanager', 'UserController');
    Route::get('/allusers/{tipo}', 'UserController@alluser');
    Route::get('/user/status/{id}', 'UserController@mudaStatus');
    Route::put('/updatepasswd/{id}', 'UserController@updatesenha')->name('updatepasswd.user');
    Route::get('/resetpasswd/{id}', 'UserController@resetsenha');

    // controles de OM
    Route::resource('ommanager', 'OmController');
    Route::get('/allOm', 'OmController@listaOms');
    Route::get('/myom', 'OmController@omDirecionada');
    Route::get('/mytypes/{id}', 'OmController@omTypes');

    // controles de tokens de acesso
    Route::resource('/token', 'TokenAcessoController');
    Route::get('/alltoken/{tipo}', 'TokenAcessoController@returnSeriais');
    Route::get('/renovatoken/{id}', 'TokenAcessoController@renewToken');

    // controles de tipos de relatórios
    Route::resource('reportsmanager', 'RelatorioTipoController');


    // controles de missão de emprego
    Route::resource('memanager', 'MissaoEmpregoController');

});
