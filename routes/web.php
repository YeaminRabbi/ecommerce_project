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


Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('admin.dashboard');

    Route::get('/brands/create', 'App\Http\Controllers\BrandsPagesController@create')->name('admin.brands.create');
    Route::put('/brands/create', 'App\Http\Controllers\BrandsPagesController@store')->name('admin.brands.store');
    Route::get('/brands/list', 'App\Http\Controllers\BrandsPagesController@list')->name('admin.brands.list');
    Route::get('/brands/edit/{id}', 'App\Http\Controllers\BrandsPagesController@edit')->name('admin.brands.edit');
    Route::post('/brands/update/{id}', 'App\Http\Controllers\BrandsPagesController@update')->name('admin.brands.update');
    Route::delete('/brands/destroy/{id}', 'App\Http\Controllers\BrandsPagesController@destroy')->name('admin.brands.destroy');



    
    Route::get('/categories/create', 'App\Http\Controllers\CategoriesPagesController@create')->name('admin.categories.create');
    Route::put('/categories/create', 'App\Http\Controllers\CategoriesPagesController@store')->name('admin.categories.store');
    Route::get('/categories/list', 'App\Http\Controllers\CategoriesPagesController@list')->name('admin.categories.list');
    Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoriesPagesController@edit')->name('admin.categories.edit');
    Route::post('/categories/update/{id}', 'App\Http\Controllers\CategoriesPagesController@update')->name('admin.categories.update');
    Route::delete('/categories/destroy/{id}', 'App\Http\Controllers\CategoriesPagesController@destroy')->name('admin.categories.destroy');


    Route::get('/colors/create', 'App\Http\Controllers\ColorsPagesController@create')->name('admin.colors.create');
    Route::put('/colors/create', 'App\Http\Controllers\ColorsPagesController@store')->name('admin.colors.store');
    Route::get('/colors/list', 'App\Http\Controllers\ColorsPagesController@list')->name('admin.colors.list');
    Route::get('/colors/edit/{id}', 'App\Http\Controllers\ColorsPagesController@edit')->name('admin.colors.edit');
    Route::post('/colors/update/{id}', 'App\Http\Controllers\ColorsPagesController@update')->name('admin.colors.update');
    Route::delete('/colors/destroy/{id}', 'App\Http\Controllers\ColorsPagesController@destroy')->name('admin.colors.destroy');


    Route::get('/sizes/create', 'App\Http\Controllers\SizesPagesController@create')->name('admin.sizes.create');
    Route::put('/sizes/create', 'App\Http\Controllers\SizesPagesController@store')->name('admin.sizes.store');
    Route::get('/sizes/list', 'App\Http\Controllers\SizesPagesController@list')->name('admin.sizes.list');
    Route::get('/sizes/edit/{id}', 'App\Http\Controllers\SizesPagesController@edit')->name('admin.sizes.edit');
    Route::post('/sizes/update/{id}', 'App\Http\Controllers\SizesPagesController@update')->name('admin.sizes.update');
    Route::delete('/sizes/destroy/{id}', 'App\Http\Controllers\SizesPagesController@destroy')->name('admin.sizes.destroy');


    Route::get('/subcategories/create', 'App\Http\Controllers\SubCategoryPagesController@create')->name('admin.subcategories.create');
    Route::put('/subcategories/create', 'App\Http\Controllers\SubCategoryPagesController@store')->name('admin.subcategories.store');
    Route::get('/subcategories/list', 'App\Http\Controllers\SubCategoryPagesController@list')->name('admin.subcategories.list');
    Route::get('/subcategories/edit/{id}', 'App\Http\Controllers\SubCategoryPagesController@edit')->name('admin.subcategories.edit');
    Route::post('/subcategories/update/{id}', 'App\Http\Controllers\SubCategoryPagesController@update')->name('admin.subcategories.update');
    Route::delete('/subcategories/destroy/{id}', 'App\Http\Controllers\SubCategoryPagesController@destroy')->name('admin.subcategories.destroy');



    Route::get('/attributes/create', 'App\Http\Controllers\AttributePagesController@create')->name('admin.attributes.create');
    Route::put('/attributes/create', 'App\Http\Controllers\AttributePagesController@store')->name('admin.attributes.store');
    Route::get('/attributes/list', 'App\Http\Controllers\AttributePagesController@list')->name('admin.attributes.list');
    Route::get('/attributes/edit/{id}', 'App\Http\Controllers\AttributePagesController@edit')->name('admin.attributes.edit');
    Route::post('/attributes/update/{id}', 'App\Http\Controllers\AttributePagesController@update')->name('admin.attributes.update');
    Route::delete('/attributes/destroy/{id}', 'App\Http\Controllers\AttributePagesController@destroy')->name('admin.attributes.destroy');


    Route::get('/products/create', 'App\Http\Controllers\ProductPagesController@create')->name('admin.products.create');
    Route::put('/products/create', 'App\Http\Controllers\ProductPagesController@store')->name('admin.products.store');
    Route::get('/products/list', 'App\Http\Controllers\ProductPagesController@list')->name('admin.products.list');
    Route::get('/products/edit/{id}', 'App\Http\Controllers\ProductPagesController@edit')->name('admin.products.edit');
    Route::post('/products/update/{id}', 'App\Http\Controllers\ProductPagesController@update')->name('admin.products.update');
    Route::delete('/products/destroy/{id}', 'App\Http\Controllers\ProductPagesController@destroy')->name('admin.products.destroy');

});




// This is main Home page Route Url Start
Route::get('/', 'App\Http\Controllers\PagesController@index')->name('home');
// This is main Home page Route Url End


// This is about Route Url Start
Route::get('/about', 'App\Http\Controllers\PagesController@about')->name('about');
// This is about Route Url End

// This is about Route Url Start
Route::get('/cart', 'App\Http\Controllers\PagesController@cart')->name('cart');
// This is about Route Url End


// This is about Route Url Start
Route::get('/shop', 'App\Http\Controllers\PagesController@shop')->name('shop');
// This is about Route Url End

// This is Single Product Route Url Start
Route::get('/singleProduct', 'App\Http\Controllers\PagesController@singleProduct')->name('singleProduct');
// This is Single Product Route Url End

// This is order track Url Start
Route::get('/ordertrack', 'App\Http\Controllers\PagesController@ordertrack')->name('ordertrack');
// This is order track Route Url End


// This is FAQ Url Start
Route::get('/faq', 'App\Http\Controllers\PagesController@faq')->name('faq');
// This is FAQ Route Url End


// This is Terms & Conditions Url Start
Route::get('/terms', 'App\Http\Controllers\PagesController@terms')->name('terms');
// This is Terms & Conditions Route Url End




Route::get('/home',function(){
    return redirect('/admin/dashboard');
})->middleware(['auth','verified']);