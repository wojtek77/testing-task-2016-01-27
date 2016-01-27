<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    
    $cart = new App\Library\Cart();
    
    $cart->set(1, 'test', 123, 23, 2);
    $cart->set(2, 'test', 123, 23, 2);
    $cart->set(3, 'test', 246, 23, 2);
    
    $cart->delete(1);
    $cart->delete(1);
    
    var_dump($cart->get(1));
    var_dump($cart->total());
    var_dump($cart->count(true));
    var_dump($cart->count());
    
    $cart->show();
    
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
