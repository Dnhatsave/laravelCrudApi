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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('/Cadastro/index');
});

Route::get('/produtos','ControladorProduto@indexView');
Route::get('/categorias','ControladorCategoria@index');
Route::get('/categorias/novo','ControladorCategoria@create');
Route::post('/categorias','ControladorCategoria@store');
Route::get('/categorias/apagar/{id}','ControladorCategoria@destroy');
Route::get('/categorias/editar/{id}','ControladorCategoria@edit');
Route::post('/categorias/{id}','ControladorCategoria@update');

Route::get('/produtos/novo','ControladorProduto@create');
Route::post('/produtos','ControladorProduto@store');
Route::get('/produtos/apagar/{id}','ControladorProduto@destroy');
Route::get('/produtos/editar/{id}','ControladorProduto@edit');
Route::post('/produtos/{id}','ControladorProduto@update');







/*

// Routas com parametros opcionais no laravel 
Route::get('/teste/{nome?}', function ($nome=null) {
    if (isset($nome))
        echo "ola $nome !";
    else
        echo "Nome nao defenido";
});
// Routas com regras laravel 
Route::get('/regras/{nome}/{n}', function ($nome,$n) {
    for ($i=0; $i < $n; $i++) { 
        echo "ola $nome ! <br>" ;
    }        
})->where('nome','[A-Za-z]+')->where('n','[0-9]+');

//Agrupamento de rotas
Route::prefix('/app')->group(function () {

    Route::get('/', function () {
        return view('App/index');
    })->name('app.home');
    Route::get('/user', function () {
        return view('App/user');
    })->name('app.user');
    Route::get('/profile', function () {
        return view('App/profile');
    })->name('app.profile');   
    
});

Route::get('/produtoss', function () {
    echo "<h1> Produtos </h1>";
    echo "<ol>";
    echo "<li> Tomate </li>";
    echo "<li> Tomate </li>";
    echo "<li> Tomate </li>";
    echo "<ol>";

})->name('meusprodutos');


//Redirecionamento de rotas

Route::redirect('todosProdutos', 'produtos', 301);

Route::get('todosProdutos2', function () {
    return redirect()->route('meusprodutos');
});


///////////////////////////

Route::post('/requisicoes', function (Request $request) {
    return 'Hello POST';
});

Route::delete('/requisicoes', function (Request $request) {
    return 'Hello DELETE';
});
Route::put('/requisicoes', function (Request $request) {
    return 'Hello PUT';
});
Route::patch('/requisicoes', function (Request $request) {
    return 'Hello PATCH';
});
Route::get('/requisicoes', function (Request $request) {
    return 'Hello GET';
});
 */


Route::get('bootstrap', function () {
    return view('layouts.outras.exemplo');
});