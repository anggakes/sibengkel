<?php


/* 
	definisi route untuk simple CRUD 
	gunakan huruf besar di awal kata dan tanpa spasi
*/
$crud = ['KategoriMotor','Motor','KategoriSukuCadang','SukuCadang','Jasa'];

foreach ($crud as $v){
	Route::get(strtolower($v),
		['as'=>$v,'uses'=>$v."Controller@index"]);
	Route::get(strtolower($v)."/datatables",
		['as'=>$v.'.datatables','uses'=>$v."Controller@datatables"]);
	Route::get(strtolower($v)."/tambah",
		['as'=>$v.'.create','uses'=>$v."Controller@create"]);
	Route::post(strtolower($v),
		['as'=>$v.'.store','uses'=>$v."Controller@store"]);
	Route::get(strtolower($v)."/{id}/edit",
		['as'=>$v.'.edit','uses'=>$v."Controller@edit"]);
	Route::post(strtolower($v)."/{id}",
		['as'=>$v.'.update','uses'=>$v."Controller@update"]);
	Route::get(strtolower($v)."/{id}/hapus",
		['as'=>$v.'.delete','uses'=>$v."Controller@delete"]);
};

Route::get('sukucadang/{id}/detail',
		['as'=>'SukuCadang.detail','uses'=>"SukuCadangController@detail"]);


/* Route Pemesanan */

Route::get('pemesanan',['as'=>'pemesanan','uses'=>"PemesananController@add"]);
Route::post('pemesanan',['as'=>'pemesanan.create','uses'=>"PemesananController@create"]);
Route::get('pemesanan/item/{kode_sc}',['as'=>'pemesanan.item','uses'=>"PemesananController@item"]);