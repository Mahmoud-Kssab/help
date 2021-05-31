<?php

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
    $categories = \App\Models\Category::where('parent_id' ,  0)->with('children')->get();
    return view('dashboard.template', compact('categories'));
});

Route::get('/posts', function () {
    // $posts = \App\Models\Category::where('id' , 5)->first()->posts()->get();
    $arr = array();
    // $posts = products(1, $arr);
    $posts = products(1);
    return json_encode($posts);
});

Route::get('/cat', 'CategoryController@index');
Route::get('/parents', 'CategoryController@parents');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('comment', 'HomeController@saveComment')->name('comment.save');


################Begin paymentGateways Routes ########################

Route::group(['prefix' => 'offers', 'middleware' => 'auth','namespace' =>'Offers'], function () {
    Route::get('/', 'OfferController@index')->name('offers.all');
    Route::get('details/{offer_id}', 'OfferController@show')->name('offers.show');
});

Route::get('get-checkout-id', 'PaymentProviderController@getCheckOutId')->name('offers.checkout');
