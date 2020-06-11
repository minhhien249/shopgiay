<?php
//font-end

// Trang chủ
Route::get('/', 'ShopController@index');
// the loai
Route::get('category/{id}', 'ShopController@getProductsByCategory')->name('shop.getProductsByCategory');

//backend
Route::group(['prefix' => 'admin','as' => 'admin.'], function() {

    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    // QL Banner
    Route::resource('banner', 'BannerController');
    // QL Thương Hiệu
    Route::resource('brand', 'BrandController');
    // QL Nhà Cung Cấp
    Route::resource('vendor', 'VendorController');
    // Ql Người dùng
    Route::resource('user', 'UserController');
     // Ql blog
     Route::resource('blog', 'BlogController');

     Route::resource('multi', 'ImageController');
});

Route::get('upload', 'ImageUploadController@upload');
Route::post('upload/store', 'ProductController@store');
Route::post('delete', 'ImageUploadController@delete');


