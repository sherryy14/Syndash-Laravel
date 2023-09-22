<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

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
    public function addproduct(Request $request){

        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,cat_id',
            'weight' => 'required|numeric',
            'unit' => 'required|integer|min:1',
            'file1' => 'required|image|mimes:jpeg,png,gif',
            'file2' => 'required|image|mimes:jpeg,png,gif',
            'file3' => 'required|image|mimes:jpeg,png,gif',
            'file4' => 'required|image|mimes:jpeg,png,gif',
            'desc' => 'required|string',
            'availability' => 'boolean',
            'code' => 'required|string|max:255',
            'status' => 'required|in:Active,Disable',
            'price' => 'required|numeric',
        ];
    
        // Define custom error messages
        $messages = [
            'category.exists' => 'Selected category does not exist.',
            'file1.*' => 'File 1 must be a valid image (jpeg, png, gif).',
            'file2.*' => 'File 2 must be a valid image (jpeg, png, gif).',
            'file3.*' => 'File 3 must be a valid image (jpeg, png, gif).',
            'file4.*' => 'File 4 must be a valid image (jpeg, png, gif).',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        return redirect('/product');
    }

    public function viewproduct(){
        return view('product');
    }
}
