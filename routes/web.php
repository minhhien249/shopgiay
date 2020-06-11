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
// Đăng nhập
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');
Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => ['CheckLogin']], function() {

    Route::get('/', 'AdminController@index')->name('dashboard');
    // Router cho category
    Route::resource('category', 'CategoryController');
    // Router cho Vendor
   	Route::resource('vendor','VendorController');
   	// Router cho Brand
   	Route::resource('image','ImageUploadController');
   	// Router cho Banner
   	Route::resource('banner','BannerController');
   	// Router cho Banner
   	Route::resource('brand','BrandController');
   	// Router cho Banner
   	Route::resource('product','ProductController');
   	// Router cho Banner
   	Route::resource('user','UserController');
   	// Router cho Banner
   	Route::resource('blog','BlogController');
   	// Router cho Banner
   	Route::resource('test','TestController');
   	Route::post('delete', 'ImageUploadController@delete');
   	// Router cho Image
});
    
