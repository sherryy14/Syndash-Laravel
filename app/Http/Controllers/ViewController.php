<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('index');
    }


    // Category 
    public function category(){
        return view('add-category');
    }
    
    public function addcategory(Request $request){
        $request->validate([
            'category'=> "required|unique:categories,category"
        ],[
            'category.required'=> "Category is required!",
            'category.unique'=> "Category already exist!"
        ]);
        
        $category = new Category();
        
        $category->category = $request->category;
        
        $category->save();
        
        return redirect('/category');
    }
    public function viewcategory(){
         $categories = Category::paginate(5);

         $data = compact('categories');

        return view('category')->with($data);
    }


    // Product 
    public function product(){
        $categories = Category::all();

        $data = compact('categories');
        return view('add-product')->with($data);
    }
    public function addproduct(){

        return redirect('/product');
    }

    public function viewproduct(){
        return view('product');
    }
}
