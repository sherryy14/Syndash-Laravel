<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ViewController::class, 'index']);


// Category 
Route::get('/add-category',[ViewController::class, 'category'])->name('addcategory');
Route::post('/add-category',[ViewController::class, 'addcategory'])->name('addcategoryname');

Route::get('/view-category',[ViewController::class, 'viewcategory'])->name('viewcategory');



// Product 
Route::get('/add-product',[ViewController::class, 'product'])->name('addproduct');
Route::post('/add-product',[ViewController::class, 'addproduct'])->name('addproductname');

Route::get('/view-product',[ViewController::class, 'viewproduct'])->name('viewproduct');