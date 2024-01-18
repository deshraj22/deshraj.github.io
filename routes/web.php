<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Myorderscontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[Homecontroller::class,'index'])->name('home');
Route::post('/searched_item',[Homecontroller::class,'searched_item']);
Route::get('/admin', [Admincontroller::class,'index'])->name('admin.index');
Route::get('/login', [Homecontroller::class,'index'])->name('login');
Route::post('adminAUTH',[Admincontroller::class,'adminAUTH']);
Route::get('category/{category}',[Homecontroller::class,'category'])->name('category.products');
Route::get('addtocart/{id}',[Homecontroller::class,'addtocart']);
Route::post('/userlogin',[Homecontroller::class,'userlogin']);
Route::get('/userlogin',[Homecontroller::class,'userlogin']);
Route::post('/userlogin2',[Homecontroller::class,'userlogin2']);
Route::get('/logoutuser',[Homecontroller::class,'logout']);
Route::post('/usersignup',[Homecontroller::class,'usersignup']);
Route::post('/usersignup2',[Homecontroller::class,'usersignup2']);
Route::get('/showcart',[Homecontroller::class,'showcart']);
Route::post('removeProduct/{productID}',[Homecontroller::class,'removeProduct'])->name('removeProduct');
Route::post('minusProduct/{productID}',[Homecontroller::class,'minusProduct'])->name('minusProduct');
Route::post('addProduct/{productID}',[Homecontroller::class,'addProduct'])->name('addProduct');
Route::get('/buynow/{productID}',[Homecontroller::class,'buynow'])->name('buynow');
Route::get('/userdetails',[Homecontroller::class,'userdetails'])->name('userdetails');
Route::post('/userdetailsform',[Homecontroller::class,'userdetailsform'])->name('userdetailsform');
Route::get('/payment/{total_cost}/{id}',[Homecontroller::class,'payment'])->name('payment');
Route::post('/pay/{amount}',[Homecontroller::class,'pay'])->name('pay');
Route::get('/myorders',[Myorderscontroller::class,'index'])->name('myorders');
Route::get('/returnproduct/{productID}',[Myorderscontroller::class,'returnproduct'])->name('returnproduct');
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('login');
});

// Admin routes
Route::group(['middleware' => 'CheckAdmin', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/addproduct',[Admincontroller::class,'addproducts'])->name('addproduct');
    Route::get('/logoutadmin',[Admincontroller::class,'logout']);
    Route::post('/productdata',[Admincontroller::class,'productdata']);
    Route::get('/orders',[Admincontroller::class,'orders']);
    Route::get('/orderdata',[Admincontroller::class,'orderdata']);
    Route::get('/orderdetails',[Admincontroller::class,'orderdetails']);
    Route::get('/acceptorder/{userid}/{productid}',[Admincontroller::class,'acceptorder']);
    Route::get('/orderdelivered/{userid}/{productid}',[Admincontroller::class,'orderdelivered']);


    
   });





