<?php namespace Repositories;


use SukuCadang;

class SukuCadangEloquent extends EloquentCRUD implements KategoriSukuCadangInterface, EloquentCRUDInterface {	

	public function __construct(SukuCadang $SukuCadang){

		$this->model = $SukuCadang;
	}

} //end of SukuCadangEloquent