<?php namespace Repositories;


use KategoriSukuCadang;

class KategoriSukuCadangEloquent extends EloquentCRUD implements KategoriSukuCadangInterface, EloquentCRUDInterface {	

	public function __construct(KategoriSukuCadang $KategoriSukuCadang){

		$this->model = $KategoriSukuCadang;
	}

	
} //end of KategoriSukuCadangEloquent