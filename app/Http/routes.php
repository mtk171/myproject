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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::resource('/users','UsersController');
Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>'login'],function(){

    Route::get('/dash',['uses'=>'UsersDashController@index','as'=>'dash_index']);
    Route::get('/dash/books/{id}',['uses'=>'UsersDashController@create' ]);
    Route::get('/dash/books/',['uses'=>'UsersDashController@create' ,'as'=>'dash_create']);
    Route::post('/dash/books',['uses'=>'UsersDashController@store','as'=>'dash_store']);	
    Route::get('/dash/books/display/{id}',['uses'=>'UsersDashController@display']);


    Route::get('/dash/category',['uses'=>'UsersCategoryController@index','as'=>'ctg_index' ]);
    Route::post('/dash/category','UsersCategoryController@store');
});

