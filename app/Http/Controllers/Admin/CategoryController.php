<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index(){
        $categorias = Category::paginate(10);
        return view('admin.categories.index')->with(compact('categorias')); //Envía la vista con las categorías
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){

        $messages = [
            'name.required'=>'Es necesario ingresar un nombre para la categoría',
            'name.min'=> 'El nombre de la categoría debe tener al menos 2 caracteres',
            'description.required'=> 'La descripción es obligatoria',
            'description.max'=> 'La descripción solo admite 200 caracteres'
        ];

        $rules = [
            'name' => 'required|min:2',
            'description' => 'required|max:200'
        ];

        $this->validate($request,$rules,$messages);

        //Para registrar en la base de datos
        Category::create($request->all());  //Mass Assigment

        return redirect('/admin/categories');
    }

    public function edit(Category $categoria){
        return view('admin.categories.edit')->with(compact('categoria'));
    }
    public function update(Request $request,Category $categoria){

        $messages = [
            'name.required'=>'Es necesario ingresar un nombre para la categoría',
            'name.min'=> 'El nombre de la categoría debe tener al menos 2 caracteres',
            'description.required'=> 'La descripción es obligatoria',
            'description.max'=> 'La descripción solo admite 200 caracteres'
        ];

        $rules = [
            'name' => 'required|min:2',
            'description' => 'required|max:200'
        ];

        $this->validate($request,$rules,$messages);

        $categoria->update($request->all());

        return redirect('/admin/categories');
    }

    public function destroy(Category $categoria){
        $categoria->delete();

        return back();

    }

}
