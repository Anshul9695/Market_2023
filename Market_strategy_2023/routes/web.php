<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');  // user id and password for admin admin@gmail.com  --> admin@123
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category',[CatagoryController::class,'index']);
    Route::get('admin/catagory/manage_category',[CatagoryController::class,'manage_category']); // for get form without data
    Route::get('admin/catagory/manage_category/{id}',[CatagoryController::class,'manage_category']);  //for edit catagory route . with get form data
    Route::post('admin/catagory/manage_category_process',[CatagoryController::class,'manage_category_process'])->name('catagory.insert');
    Route::get('admin/catagory/delete/{id}',[CatagoryController::class,'delete']);

    Route::get('admin/coupon/couponList',[CouponController::class,'couponList']); //for the all coupon list
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);// for getting manage coupon form
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process']); //for insert the coupon in database
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']); //with data is id found
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);
   
    Route::get('admin/passwordeupdate',[AdminController::class,'updatepassword']); // for creating the hash password incription
    Route::get('admin/logout', function () {
      session()->put('ADMIN_LOGIN');
        session()->put('ADMIN_ID');
        return view('admin');
        session()->flash('error','LogOut Successfully..!!');
    });
});
