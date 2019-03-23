<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class TestController extends Controller
{
    //
    public function welcome(){
    	//Sentencias o código o métodos de Eloquent
    	$productos = Product::all();
    	//Envíamos la vista pero con la variable
    	return view('welcome')->with(compact('productos',$productos));
    	//return view('welcome',$productos);
    }
}
