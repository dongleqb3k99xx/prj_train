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
    //return view('welcome');
    echo 'something';
});

//Route::get("/users", 'UserController@index');
// Route::controllers([
//     'auth' => 'Auth\AuthController',
//     'password' => 'Auth\PasswordController',

// ]);

//task
Route::group(['prefix' => 'tasks'], function () {
	Route::get('/{id?}', [
	    'uses' => 'TaskController@getAllTasks',
	    'as' => 'task.index'
	]);
 
	Route::post('store', [
	    'uses' => 'TaskController@postStoreTask',
	    'as' => 'task.store'
	]);
 
	Route::patch('{id}/update', [
	    'uses' => 'TaskController@postUpdateTask',
	    'as' => 'task.update'
	]);
 
	Route::delete('{id}/delete', [
	    'uses' => 'TaskController@postDeleteTask',
	    'as' => 'task.delete'
	]);
});

//user
Route::group(['prefix'=>'task'], function(){
	Route::get('/{id?}',[
		'uses' => 'UserController@getAllUsers',
		'as' => 'users.index'
	]);

	Route::post('store', [
		'uses' => 'UserController@postStoreUser',
		'as' => 'user.store'
	]);

	Route::patch('{id}/update', [
		'uses' => 'UserController@postUpdateUser',
		'as' => 'user.update'
	]);

	Route::delete('{id}/delete', [
		'uses' => 'UserController@postDeleteUser',
		'as' => 'user.delete'
	]);
});
