<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class TestController extends Controller
{
    //
    public function welcome(){
    	//Sentencias o código o métodos de Eloquent
    	//$productos = Product::paginate(9);
    	$categories = Category::has('products')->get();
        //Envíamos la vista pero con la variable
    	return view('welcome')->with(compact('categories'));
    	//return view('welcome',$productos);
    }
}
