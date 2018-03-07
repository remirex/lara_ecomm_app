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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomePageController@index')->name('home');

Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/{product}', 'ShopController@show')->name('show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/saveForLater/{product}', 'CartController@saveForLater')->name('cart.saveForLater');
Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/moveToCart{product}', 'SaveForLaterController@moveToCart')->name('saveForLater.moveToCart');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

// testing cart !!!
Route::get('empty', function(){
   Cart::instance('saveForLater')->destroy();
});

Route::get('/contact','ContactController@index')->name('contact');
Route::post('/contact','ContactController@sendMail')->name('send.mail');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');




Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Admin panel
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/', 'AdminController@saveCoupon')->name('admin.save_coupon');
    // section products
    Route::get('/add_product', 'AdminController@addProduct')->name('admin.add');
    Route::post('/add_product', 'AdminController@saveProduct')->name('admin.save');
    Route::get('/edit_product/{pro_id}', function($pro_id){
        $data = \App\Product::where('id', $pro_id)->get();
        return view('admin.partials.editProduct', compact('data'));
    })->name('admin.edit_pro');
    Route::post('/edit_product/{pro_id}', 'AdminController@editProduct')->name('admin.update');
    // section categories
    Route::get('/add_category', 'AdminController@addCategory')->name('admin.add_cat');
    Route::post('/add_category', 'AdminController@saveCategory')->name('admin.save_cat');
    Route::get('/edit_category/{cat_id}', function($cat_id){
        $data = \App\Category::where('id', $cat_id)->get();
        return view('admin.partials.editCategory', compact('data'));
    })->name('admin.edit_cat');
    Route::post('/edit_category/{cat_id}', 'AdminController@editCategory')->name('admin.update_cat');
});


