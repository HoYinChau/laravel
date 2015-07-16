<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');


Route::resource('friend', 'FriendController');

Route::get('friendSearchByID', 'FriendController@searchID');


Route::get('/collection', 'ItemController@index'); 

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' =>'auth' ], function()  
{
  Route::get('/', 'AdminHomeController@index');
  Route::get('/logout', 'AdminHomeController@logout');
  Route::get('/item/showAll', 'AdminHomeController@showAll');
  Route::get('/event/showAll', 'AdminHomeController@showEvent');
  Route::get('/allEvent/showAll', 'AdminHomeController@showAllEvent');
  Route::resource('item', 'ItemController');
  Route::resource('event', 'EventContorller');
  Route::resource('allEvent', 'AllDayEventContorller');
  Route::resource('friend', 'FriendController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
