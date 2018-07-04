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

Route::get('/', 'MainController@index')->name('index');
Route::get('/search', 'MainController@search')->name('search');
Route::get('/categories/{id}', 'CategoryController@index')->name('categories.index');
Route::get('/products/{id}', 'ProductController@index')->name('products.index');

Route::get('/purchase/{product_id}', 'OrderController@store')->name('orders.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/orders', 'OrderController@index')->name('orders.index');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::get('/categories', 'CategoryController@index')->name('admin.categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create');
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
    Route::get('/categories/delete/{id}', 'CategoryController@delete')->name('admin.categories.delete');
    Route::post('/categories/store', 'CategoryController@store')->name('admin.categories.store');
    Route::post('/categories/update/{id}', 'CategoryController@update')->name('admin.categories.update');

    Route::get('/products', 'ProductController@index')->name('admin.products.index');
    Route::get('/products/create', 'ProductController@create')->name('admin.products.create');
    Route::get('/products/edit/{id}', 'ProductController@edit')->name('admin.products.edit');
    Route::get('/products/delete/{id}', 'ProductController@delete')->name('admin.products.delete');
    Route::post('/products/store', 'ProductController@store')->name('admin.products.store');
    Route::post('/products/update/{id}', 'ProductController@update')->name('admin.products.update');

    Route::get('/mails', 'MailController@index')->name('admin.mails.index');
    Route::get('/mails/create', 'MailController@create')->name('admin.mails.create');
    Route::get('/mails/edit/{id}', 'MailController@edit')->name('admin.mails.edit');
    Route::get('/mails/delete/{id}', 'MailController@delete')->name('admin.mails.delete');
    Route::post('/mails/store', 'MailController@store')->name('admin.mails.store');
    Route::post('/mails/update/{id}', 'MailController@update')->name('admin.mails.update');

    Route::get('/orders', 'OrderController@index')->name('admin.orders.index');

    Route::get('/listing/{category_id}', 'ProductController@listing')->name('admin.products.listing');
});
