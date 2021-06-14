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

// layout test
Route::get('/',function(){
    return view('auth.login');
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
    Route::get('customerdelete/{id}', 'Web\CustomerController@destroy')->name('customerdelete');



    // Brand
    Route::resource('brand', 'Web\BrandController');
    Route::get('branddelete/{id}', 'Web\BrandController@destroy')->name('branddelete');


    // Order 
    Route::resource('order', 'Web\OrderController');
    Route::get('orderdelete/{id}', 'Web\OrderController@destroy')->name('orderdelete');
    Route::post('datebetween', 'Web\OrderController@datebetween')->name('datebetween');

    Route::post('takeshoes', 'Web\OrderController@takeshoes')->name('takeshoes');

    // Route::post('takestock', 'Web\OrderController@takestock')->name('takestock');


    // ShowDetails
    Route::resource('shoedetails', 'Web\ShowDetailsController');
    Route::get('shoedelete/{id}', 'Web\ShowDetailsController@destroy')->name('shoedelete');



    // Stock
    Route::resource('stock', 'Web\StockController');
    Route::get('stockdelete/{id}', 'Web\StockController@destroy')->name('stockdelete');
    Route::post('datebetweenstock', 'Web\StockController@datebetweenstock')->name('datebetweenstock');

    Route::post('takeshoesstock', 'Web\StockController@takeshoesstock')->name('takeshoesstock');


    // Store 
    Route::resource('store', 'Web\StoreController');
    Route::get('storedelete/{id}', 'Web\StoreController@destroy')->name('storedelete');
    Route::get('articalstock/{store}/{brand}', 'Web\StoreController@articalstock')->name('articalstock');



    // Store 
    Route::resource('user', 'UserController');
    Route::get('userdelete/{id}', 'UserController@destroy')->name('userdelete');


    Route::resource('orderinv', 'OrderInvController');
    Route::get('orderinvdelete/{id}', 'OrderInvController@destroy');





});
