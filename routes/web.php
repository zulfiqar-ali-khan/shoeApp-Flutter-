<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('admin',function(){
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

   Route::get('dashboard', 'Web\DashbaordController@index')->name('dashboard');
   Route::resource('dash', 'Web\DashbaordController');

    // Customers
    Route::resource('customer', 'Web\CustomerController');


    // Brand
    Route::resource('brand', 'Web\BrandController');


    // Order 
    Route::resource('order', 'Web\OrderController');
    Route::post('takeshoes', 'Web\OrderController@takeshoes')->name('takeshoes');
    Route::post('takestock', 'Web\OrderController@takestock')->name('takestock');


    // ShowDetails
    Route::resource('shoedetails', 'Web\ShowDetailsController');


    // // Stock
    // Route::resource('stock', 'Web\StockController');


    // Store 
    Route::resource('store', 'Web\StoreController');


    // Store 
    Route::resource('user', 'UserController');




});
