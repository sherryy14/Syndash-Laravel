<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ViewController::class, 'index']);


// Category 
Route::get('/add-category',[ViewController::class, 'category'])->name('addcategory');
Route::post('/add-category',[ViewController::class, 'addcategory'])->name('addcategoryname');

Route::get('/view-category',[ViewController::class, 'viewcategory'])->name('viewcategory');

Route::get('/edit-category/{id}',[ViewController::class, 'editcategory'])->name('editcategory');
Route::post('/update-category/{id}',[ViewController::class, 'updatecategory'])->name('updatecategory');



// Product 
Route::get('/add-product',[ViewController::class, 'product'])->name('addproduct');
Route::post('/add-product',[ViewController::class, 'addproduct'])->name('addproductname');

Route::get('/view-product',[ViewController::class, 'viewproduct'])->name('viewproduct');

Route::get('/edit-product/{id}',[ViewController::class, 'editproduct'])->name('editproduct');
Route::post('/update-product/{id}',[ViewController::class, 'updateproduct'])->name('updateproduct');
Route::get('/trash-product/{id}',[ViewController::class, 'trashproduct'])->name('trashproduct');

// Trash Product 
Route::get('/view-trash-product',[ViewController::class, 'viewtrashproduct'])->name('viewtrashproduct');
Route::get('/restore-product/{id}',[ViewController::class, 'restoreproduct'])->name('restoreproduct');