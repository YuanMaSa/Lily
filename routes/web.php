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
//回到welcome頁面
Route::get('/', function () {
    return view('welcome');
});
//回到upload頁面
Route::get('/s3-image-upload', function () {
    return view('upload');
});
//回到管理者頁面
Route::get('/admin', function () {
    return view('admin');
});
Route::post('modifyPhoto','S3ImageController@modifyPhoto');
//回到home頁面,查看所有圖片
Route::get('/home', 'HomeController@index');
//使用者相關登入
Auth::routes();
Route::resource('/home', 'HomeController');
Route::post('/home', 'HomeController@index');


Route::get('auth/google', ['as'=>'auth/google','uses'=>'Auth\LoginController@redirectToProvider']);
Route::get('auth/google/callback', ['as'=>'auth/google/callback','uses'=>'Auth\LoginController@handleProviderCallback']);
//Address 的增刪查改
Route::resource('address', 'AddressController');
//Role 的增刪查改
Route::resource('role', 'RoleController');
Route::get('s3-image-upload','S3ImageController@imageUpload');
//Route::resource('s3-image-upload','S3ImageController');

Route::post('s3-image-upload','S3ImageController@imageUploadPost');
Route::put('image-update/{id}', 'S3ImageController@updateimage');
Route::get('s3-image-upload', 'S3ImageController@index');

Route::delete('s3-image-upload/{id}', 'S3ImageController@destroy');

