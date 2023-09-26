<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('index');
    }


    // Category 
    public function category()
    {
        $url = url('/contact');
        return view('add-category', ['url' => $url]);
    }

    public function addcategory(Request $request)
    {
        $request->validate([
            'category' => "required|unique:categories,category"
        ], [
            'category.required' => "Category is required!",
            'category.unique' => "Category already exist!"
        ]);

        $category = new Category();

        $category->category = $request->category;

        $category->save();

        return redirect('/view-category');
    }
    public function viewcategory()
    {
        $categories = Category::paginate(5);

        $data = compact('categories');

        return view('category')->with($data);
    }


    // Product 
    public function product()
    {
        $categories = Category::all();

        $data = compact('categories');
        return view('add-product')->with($data);
    }
    public function addproduct(Request $request)
    {

        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,cat_id',
            'weight' => 'required|numeric',
            'unit' => 'required|integer|min:1',
            'file1' => 'required|image|mimes:jpeg,png,gif',
            'file2' => 'required|image|mimes:jpeg,png,gif',
            'file3' => 'required|image|mimes:jpeg,png,gif',
            'file4' => 'required|image|mimes:jpeg,png,gif',
            'description' => 'required|string',
            'code' => 'required|string|max:255',
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

        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->weight = $request->weight;
        $product->unit = $request->unit;
        $product->description = $request->description;
        $product->code = $request->code;
        $product->availability = $request->availability;
        $product->status = $request->status;
        $product->price = $request->price;


        // Upload and store the image files
        if ($request->hasFile('file1')) {
            $image1 = $request->file('file1');
            $image1Name = 'image1_' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->storeAs('public/upload', $image1Name);
            $product->file1 = $image1Name;
        }

        if ($request->hasFile('file2')) {
            $image2 = $request->file('file2');
            $image2Name = 'image2_' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->storeAs('public/upload', $image2Name);
            $product->file2 = $image2Name;
        }

        if ($request->hasFile('file3')) {
            $image3 = $request->file('file3');
            $image3Name = 'image3_' . time() . '.' . $image3->getClientOriginalExtension();
            $image3->storeAs('public/upload', $image3Name);
            $product->file3 = $image3Name;
        }

        if ($request->hasFile('file4')) {
            $image4 = $request->file('file4');
            $image4Name = 'image4_' . time() . '.' . $image4->getClientOriginalExtension();
            $image4->storeAs('public/upload', $image4Name);
            $product->file4 = $image4Name;
        }


        // save product 

        $product->save();

        // Flush a message 
        Session::flash('success', 'Product added successfully.');


        return redirect('/add-product');
    }

    public function viewproduct()
    {

        $products = Product::with('category')->get();

        $data = compact('products');
        return view('product')->with($data);
    }
}
