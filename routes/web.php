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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products/','ProductController@index'); //Listar los productos en una tabla
Route::get('/admin/products/create/','ProductController@create'); //Mostrar el form para crear nuevo producto
Route::post('/admin/products/','ProductController@store'); //Hacer el registro en la BD

Route::get('/admin/products/{id}/edit/','ProductController@edit'); //Muestra el producto a editar

Route::post('/admin/products/{id}/edit/','ProductController@update'); //Guarda los cambios

//Route::post('/admin/products/{id}/delete/','ProductController@destroy');

Route::delete('/admin/products/{id}','ProductController@destroy');

