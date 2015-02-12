<?php namespace Helpers;

class BuatKode{

	public $tgl ;
	public $model;

	/* Membuat kode pemesanan */
	public function __construct($model){
		$this->tgl = date("Ymd");
		$this->model=$model;
	}

	public function make(){
		
		$retur = $this->tgl.str_pad($this->getLastId(),4,"0",STR_PAD_LEFT);
	
		return $retur;
	}


	private function getLastId(){

		$id = 1;

		$last = $this->model
			->where('tgl','=',date("Y-m-d"))->orderBy('id', 'desc')->first();
		if(count($last)>0){
			$id = (int)substr($last->no_faktur, -1,4);
		}

		return $id;
	}
}