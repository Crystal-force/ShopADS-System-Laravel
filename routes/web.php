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

Route::get('/', 'UserController@index');


Route::get('/login', 'Auth\NewAuthController@index');
Route::get('/admin-register', 'Auth\NewAuthController@admin_register');

Route::post('/admin-login', 'Auth\NewAuthController@login')->name('login');
Route::post('/admin-register', 'Auth\NewAuthController@register')->name('admin-register');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/logout', 'Auth\NewAuthController@logout')->name('logout');

Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/screens', 'ImageController@index')->name('screen');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/publish', 'PublishController@index')->name('publish');
Route::get('/setting', 'SettingController@index')->name('setting');

Route::post('/add-category', 'CategoryController@addcategory')->name('addcategory');
Route::post('/remove-category', 'CategoryController@removecategory')->name('removecategory');
Route::post('/edit-category','CategoryController@editcategory')->name('editcategory');

Route::post('/add-news', 'NewsController@addnews')->name('addnews');
Route::post('/news-remove', 'NewsController@removenews')->name('removenews');
Route::post('/edit-news', 'NewsController@editnews')->name('editnews');

Route::post('/reset-password', 'SettingController@resetinfo')->name('resetinformation');

Route::post('/publish-page', 'PublishController@publishpage')->name('publishpage');
Route::post('/publish-img', 'PublishController@selectedimages')->name('selectedimages');

Route::post('/screens_upload', 'ImageController@screensupload')->name('screensupload');
Route::post('/screens-save', 'ImageController@screenssave')->name('screenssave');
Route::post('/remove-image', 'ImageController@screensremove')->name('screensremove');

Route::get('/test-statu', 'UserController@teststatu')->name('teststatu');