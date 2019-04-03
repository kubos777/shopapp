<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function show(Category $category){
        $productos = $category->products()->paginate(5);
        return view('categories.show')->with(compact('category','productos'));

    }
}
