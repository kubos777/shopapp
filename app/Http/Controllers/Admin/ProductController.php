<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;

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
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request){

        $messages = [
            'name.required'=>'Es necesario ingresar un nombre para el producto',
            'name.min'=> 'El nombre del producto debe tener al menos 2 caracteres',
            'description.required'=> 'La descripción corta es obligatoria',
            'description.max'=> 'La descripción corta solo admite 200 caracteres',
            'price.required'=> 'Es obligatorio definir un precio para el producto',
            'price.numeric'=>'Ingrese un precio válido',
            'price.min'=>'No se admiten negativos',
            'long_description.required'=> 'Se requiere la descripción detallada'
        ];


        $rules = [
            'name' => 'required|min:2',
            'description' => 'required|max:200',
            'price'=> 'required|numeric|min:0',
            'long_description'=>'required'

        ];

        $this->validate($request,$rules,$messages);

    	//dd($request->all()); //Muestra los campos de los forms
    	$producto = new Product();
    	$producto->name = $request->input('name');
    	$producto->description = $request->input('description');
    	$producto->price = $request->input('price');
    	$producto->long_description = $request->input('long_description');
    	$producto->category_id = $request->category_id;

    	$producto->save(); // INSERT

    	return redirect('/admin/products');
    }

    public function edit($id){
        $categories = Category::orderBy('name')->get();
    	$producto = Product::find($id);
    	return view('admin.products.edit')->with(compact('producto','categories'));
    }
    public function update(Request $request,$id){

    $messages = [
    'name.required'=>'Es necesario ingresar un nombre para el producto',
    'name.min'=> 'El nombre del producto debe tener al menos 2 caracteres',
    'description.required'=> 'La descripción corta es obligatoria',
    'description.max'=> 'La descripción corta solo admite 200 caracteres',
    'price.required'=> 'Es obligatorio definir un precio para el producto',
    'price.numeric'=>'Ingrese un precio válido',
    'price.min'=>'No se admiten negativos',
    'long_description.required'=> 'Se requiere la descripción detallada'
        ];


        $rules = [
            'name' => 'required|min:2',
            'description' => 'required|max:200',
            'price'=> 'required|numeric|min:0',
            'long_description'=>'required'

        ];

        $this->validate($request,$rules,$messages);

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
