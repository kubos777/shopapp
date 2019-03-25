<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(Product::class,100)->create();
        //factory(Category::class,10)->create();
        //factory(ProductImage::class,200)->create();

        $categories = factory(Category::class,5)->create(); //create, genera y guarda
        $categories->each(function($category){
            $products = factory(Product::class,20)->make(); //Genera productos pero no los guarda en la base
            $category->products()->saveMany($products); //Guarda en la base

            $products->each(function($p){
                $images = factory(ProductImage::class,5)->make();
                $p->images()->saveMany($images);
            });           

        });


    }
}
