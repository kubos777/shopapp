<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    //
    public function index(){
    	//$productos = Product::all();
    	$productos = Product::paginate(10);
    	return view('admin.products.index')->with(compact('productos')); //Envía la vista con los productos
    }
    public function create(){
    	return view('admin.products.create');
    }

    public function store(Request $request){
    	//dd($request->all()); //Muestra los campos de los forms
    	$producto = new Product();
    	$producto->name = $request->input('name');
    	$producto->description = $request->input('description');
    	$producto->price = $request->input('price');
    	$producto->long_description = $request->input('long_description');

    	$producto->save(); // INSERT

    	return redirect('/admin/products');
    }

    public function edit($id){
    	$producto = Product::find($id);
    	return view('admin.products.edit')->with(compact('producto'));
    }
    public function update(Request $request,$id){
    	$producto = Product::find($id);
    	$producto->name = $request->input('name');
    	$producto->description = $request->input('description');
    	$producto->price = $request->input('price');
    	$producto->long_description = $request->input('long_description');

    	$producto->save(); // UPDATE

    	return redirect('/admin/products');
    }

public function destroy($id){
    	$producto = Product::find($id);
    	$producto->delete();

    	return back();

}

    
}
