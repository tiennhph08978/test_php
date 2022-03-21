<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//danh mục
Route::get('/danh-muc',[CategoryController::class,'index'])->name('cate');
Route::get('/thêm-danhmuc',[CategoryController::class,'create'])->name('addCate');
Route::post('/thêm-danhmuc',[CategoryController::class,'store'])->name('postAddCate');
Route::get('/sửa-danhmuc/{id}',[CategoryController::class,'edit'])->name('editCate');
Route::post('/sửa-danhmuc/{id}',[CategoryController::class,'update'])->name('postEditCate');
Route::get('/xóa-danhmuc/{id}',[CategoryController::class,'destroy'])->name('deleCate');
Route::get('/kichhoat/{id}',[CategoryController::class,'active'])->name('active');
Route::get('/xoakichhoat/{id}',[CategoryController::class,'unactive'])->name('unactive');

//sản phẩm
Route::get('/san-pham',[ProductController::class,'index'])->name('product');
Route::get('/thêm-san-pham',[ProductController::class,'create'])->name('addPro');
Route::post('/thêm-san-pham',[ProductController::class,'store'])->name('postAddPro');
Route::get('/sửa-sản-phẩm/{id}',[ProductController::class,'edit'])->name('editPro');
Route::post('/sửa-sản-phẩm/{id}',[ProductController::class,'update'])->name('postEditPro');
Route::get('/xóa-sản-phẩm/{id}',[ProductController::class,'destroy'])->name('delePro');
Route::get('/kichhoat/{id}',[ProductController::class,'active'])->name('active');
Route::get('/xoakichhoat/{id}',[ProductController::class,'unactive'])->name('unactive');
//home
Route::get('/danh-muc/{id}',[Homecontroller::class,'index'])->name('catePro');