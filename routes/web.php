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

Route::get('/products/{id}','ProductController@show'); 

Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');


Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){

		Route::get('/products/','ProductController@index'); //Listar los productos en una tabla
		Route::get('/products/create/','ProductController@create'); //Mostrar el form para crear nuevo producto
		Route::post('/products/','ProductController@store'); //Hacer el registro en la BD

		Route::get('/products/{id}/edit/','ProductController@edit'); //Muestra el producto a editar

		Route::post('/products/{id}/edit/','ProductController@update'); //Guarda los cambios

		//Route::post('/products/{id}/delete/','ProductController@destroy');

		Route::delete('/products/{id}','ProductController@destroy');

		Route::get('/products/{id}/images','ImageController@index'); //Ver imágenes
		Route::post('/products/{id}/images','ImageController@store'); //Subir imágenes
		Route::delete('/products/{id}/images','ImageController@destroy'); //Delete

		Route::get('/products/{id}/images/select/{image}','ImageController@select');
		

});



