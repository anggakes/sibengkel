<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/kategoriMotor', function(){
	//return KategoriMotor::all();
	return('ha');
});

Route::post('/kategoriMotorAdd',['uses'=>'KategoriMotorController@create']);

Route::post('/kategoriMotorEdit',['uses'=>'KategoriMotorController@update']);

Route::post('/kategoriMotorDelete',['uses'=>'KategoriMotorController@delete']);

Route::get('/kategoriSC', function(){
	//return KategoriMotor::all();
	return('ha');
});

Route::post('/kategoriSCAdd', ['uses'=>'KategoriSCController@create']);

Route::post('/kategoriSCEdit',['uses'=>'KategoriSCController@update']);

Route::post('/kategoriSCDelete',['uses'=>'KategoriSCController@delete']);