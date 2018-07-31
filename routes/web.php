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

Route::group(['middleware' =>'rbac'], function() {
   // put your route here
   Route::get('/dashboard', function () {
      return view('dashboard');
   });
});


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::get('roles/destroy/{id}', 'RoleController@destroy');

Route::resource('permissions', 'PermissionController');
Route::get('permissions/destroy/{id}', 'PermissionController@destroy');

Route::resource('permissionRoles', 'PermissionRoleController');
Route::post('permissionRoles/destroy', 'PermissionRoleController@destroy');
