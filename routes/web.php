<?php

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

Route::get('/', 'Controller@index');
Route::get('/product/{id}', 'Controller@show');
Route::get('/cart', 'Controller@cart');
Route::get('/add-to-cart/{id}', 'Controller@addToCart')->name('add-to-cart');
Route::put('/update-cart/{id}', 'Controller@update')->name('update-cart');
Route::delete('/remove_cart/{id}', 'Controller@destroy')->name('remove_cart');
Route::get('/account', function() {
   	return view('account');
})->name('account');

Route::get('/user_login', 'Controller@getLogin')->middleware('guest');
Route::post('/user_login', 'Controller@postLogin')->name('user_login');
Route::get('/user_logout', 'Controller@userLogout')->middleware('auth')->name('user_logout');
Route::get('/checkout', 'Controller@getCheckout');
Route::post('/checkout_fill/{id}', 'Controller@postCheckout')->name('checkout_fill');
Route::get('/address', 'Controller@getAddress');
Route::post('/address_fill/{id}', 'Controller@postAddress')->name('address_fill');
Route::get('/register', 'AdminController@getRegister');
Route::post('/register', 'AdminController@postRegister')->name('register');
Route::get('/login', 'AdminController@getLogin')->middleware('guest');
Route::post('/login', 'AdminController@postLogin')->name('login');


Route::get('/logout', 'AdminController@logout')->middleware('auth')->name('logout');
Route::get('/admin', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'checkLevel:1'])->name('admin');



Route::get('/fruits', function () {
    return view('admin/fruits');
});

Route::get('/vegetables', function () {
    return view('admin/vegetables');
});

Route::resource('fruits', 'FruitsController');

Route::resource('vegetables', 'VegetablesController');
