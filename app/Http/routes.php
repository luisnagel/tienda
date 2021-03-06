<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::bind('product', function($slug){
	return App\Product::where('slug', $slug)->first();
});

// Category dependency injection
Route::bind('category', function($category){
    return App\Category::find($category);
});

// User dependency injection
Route::bind('user', function($user){
    return App\User::find($user);
});


Route::get('/', [
	'as' => 'home',
	'uses' => 'Auth\StoreController@redirect'
]);
Route::get('home', [
	'as' => 'home',
	'uses' => 'Auth\StoreController@index'
]);

Route::get('product/{slug}', [
	
	'as' => 'product-detail',
	'uses' => 'Auth\StoreController@show'
]);

// Carrito -------------

Route::get('cart/show', [
	
	'as' => 'cart-show',
	'uses' => 'Auth\CartController@show'
]);

Route::get('cart/add/{product}', [
	
	'as' => 'cart-add',
	'uses' => 'Auth\CartController@add'
]);

Route::get('cart/delete/{product}',[
	
	'as' => 'cart-delete',
	'uses' => 'Auth\CartController@delete'
]);

Route::get('cart/trash', [
	
	'as' => 'cart-trash',
	'uses' => 'Auth\CartController@trash'
]);

Route::get('cart/update/{product}/{quantity}', [
	
	'as' => 'cart-update',
	'uses' => 'Auth\CartController@update'
]);

Route::get('order-detail', [
	'middleware' => 'auth:user',
	'as' => 'order-detail',
	'uses' => 'CartController@orderDetail'
]);


// Authentication routes...
Route::get('auth/login', [
	'as' => 'login-get',
	'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('auth/login', [
	'as' => 'login-post',
	'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('auth/logout', [
	'as' => 'logout',
	'uses' => 'Auth\AuthController@getLogout'
]);

// Registration routes...
Route::get('auth/register', [
	'as' => 'register-get',
	'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('auth/register', [
	'as' => 'register-post',
	'uses' => 'Auth\AuthController@postRegister'
]);

// Paypal

Route::resource('pedido', 'Auth\PedidoController');




// ADMIN -------------

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function()
{

	Route::get('home', function(){
		return view('admin.home');
	});

	Route::resource('category', 'CategoryController');

	Route::resource('product', 'ProductController');

	Route::resource('user', 'UserController');

	Route::get('orders', [
		'as' => 'admin.order.index',
		'uses' => 'OrderController@index'
	]);

	Route::post('order/get-items', [
	    'as' => 'admin.order.getItems',
	    'uses' => 'OrderController@getItems'
	]);

	Route::get('order/{id}', [
	    'as' => 'admin.order.destroy',
	    'uses' => 'OrderController@destroy'
	]);

});

