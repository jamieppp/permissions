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

//Register new user from Admin dashboard, show registration form and post routes
Route::get('/admin/registeruser', 'AdminController@registerform')->name('registeruserform');
Route::post('/admin/create', 'AdminController@registercreate')->name('registerusercreate');

//Show user list and edit user roles
Route::get('/admin/edituser', 'AdminController@userlist')->name('edituserlist');
Route::post('/admin/updateuser', 'AdminController@userupdate')->name('userupdate');
