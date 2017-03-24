<?php

//user
Route::group(['prefix'=>'users'], function(){
    Route::get('generate',[
        'uses' => 'UserController@getGenerateUser',
        'as' => 'user.generate'
    ]);
    
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