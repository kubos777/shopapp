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

Route::get('/products/json','SearchController@data');
Route::get('/search/','SearchController@show');
Route::get('/products/{id}','ProductController@show');
Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');
Route::post('/order','CartController@update');
Route::get('/categories/{category}','CategoryController@show');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){

    //CRUD Para productos
		Route::get('/products/','ProductController@index'); //Listar los productos en una tabla
		Route::get('/products/create/','ProductController@create'); //Mostrar el form para crear nuevo producto
		Route::post('/products/','ProductController@store'); //Hacer el registro en la BD
		Route::get('/products/{id}/edit/','ProductController@edit'); //Muestra el producto a editar
		Route::post('/products/{id}/edit/','ProductController@update'); //Guarda los cambios
		//Route::post('/products/{id}/delete/','ProductController@destroy');
		Route::delete('/products/{id}','ProductController@destroy');
    //CRUD Para Imágenes
		Route::get('/products/{id}/images','ImageController@index'); //Ver imágenes
		Route::post('/products/{id}/images','ImageController@store'); //Subir imágenes
		Route::delete('/products/{id}/images','ImageController@destroy'); //Delete

		Route::get('/products/{id}/images/select/{image}','ImageController@select');
    //CRUD Para categorías
        Route::get('/categories/','CategoryController@index'); //Listar las categorías en una tabla
        Route::get('/categories/create/','CategoryController@create'); //Mostrar el form para crear nueva categoría
        Route::post('/categories/','CategoryController@store'); //Hacer el registro en la BD
        Route::get('/categories/{categoria}/edit/','CategoryController@edit'); //Muestra la categoría a editar
        Route::post('/categories/{categoria}/edit/','CategoryController@update'); //Guarda los cambios
        Route::delete('/categories/{categoria}','CategoryController@destroy'); //Elimina categoría


});



