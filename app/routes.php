<?php


/* 
	definisi route untuk simple CRUD 
	gunakan huruf besar di awal kata dan tanpa spasi
*/
$crud = ['KategoriMotor','Motor'];

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

Route::get('/',function(){
	$kk = Motor::with('kategoriMotor')->get();
	foreach (Motor::with('kategoriMotor')->get() as $ka){
		echo $ka->kategori_motor->nama;
	}
});

