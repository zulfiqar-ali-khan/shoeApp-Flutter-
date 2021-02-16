<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ShoeDetailsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register',[UserController::class,'store']);

Route::post('/login',[UserController::class,'login']);



// user Proile
    Route::get('/userProfile',[UserController::class,'index']);


    // Customers Api Route _______________________________________

    Route:: post('/createCustomer',[CustomerController::class,'store']);  //Create customers
    Route:: get('/customers',[CustomerController::class,'index']);        // show Customer



    // ++++++++++++++++++++

     // Store Api Route_________________________________________
     Route::post('/createStore',[StoreController::class,'store']);
     Route::get('/stores',[StoreController::class,'index']);

    // +++++++++++++++++++++

     // Brand Api Route_________________________________________
     Route::post('/createBrands',[BrandController::class,'store']);
     Route::get('/brands',[BrandController::class,'index']);

    //  +++++++++++++++++++

     // Shoe Details Api Route__________________________________
     Route::post('/shoeCreate',[ShoeDetailsController::class,'store']);
     Route::get('/shoeDetails',[ShoeDetailsController::class,'index']);
     Route::get('/getShoesQuantity',[ShoeDetailsController::class,'getShoesQuantity']);

    // ++++++++++++++++++++


     // Orders Api Rooute_______________________________________
     Route::get('orders',[OrderController::class,'index']);
     Route::post('createOrder',[OrderController::class,'store']);

     


