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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sample', 'HomeController@sample')->name('sample');
Route::get('/edit','ProfileController@edit')->name('profile.edit');
Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
Route::post('/change-name','ProfileController@changeName')->name('profile.changeName');
Route::post('/change-email','ProfileController@changeEmail')->name('profile.changeEmail');
Route::post('/change-photo','ProfileController@changePhoto')->name('profile.changePhoto');

Route::resource('/blog',"BlogController");
Route::resource('/blog_category',"BlogCategoryController");
Route::resource('/blog_photo',"BlogPhotoController");

Route::resource('/product_category',"ProductCategoryController");
Route::resource('/product',"ProductController");
Route::resource('/product_photo',"ProductPhotoController");

Route::resource('/gallery_photo',"GalleryPhotoController");
Route::resource('/gallery',"GalleryController");

Route::resource('/contact',"ContactController");

Route::resource('/team',"TeamController");

Route::resource('/partner',"PartnerController");
