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
	return kategoriMotor::all();
});

Route::post('/kategoriMotorAdd',['uses'=>'KategoriMotorController@create']);

Route::post('/kategoriMotorEdit',['uses'=>'KategoriMotorController@update']);

Route::post('/kategoriMotorDelete',['uses'=>'KategoriMotorController@delete']);

Route::post('/kategoriMotorSearch',['uses'=>'KategoriMotorController@search']);

Route::get('/tambah_kategori', function()
{
	return View::make('km-add');
});


Route::get('/kategoriSC', function(){
	//return KategoriMotor::all();
	return kategoriSC::all();
});

Route::post('/kategoriSCAdd', ['uses'=>'KategoriSCController@create']);

Route::post('/kategoriSCEdit',['uses'=>'KategoriSCController@update']);

Route::post('/kategoriSCDelete',['uses'=>'KategoriSCController@delete']);