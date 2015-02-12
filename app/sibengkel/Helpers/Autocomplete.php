<?php namespace Helpers;

class autocomplete{

	public $model;

	public function __construct($model){

		$this->model = $model;
	}

	public function make(){
	/*
	{
    "suggestions": [
        { "value": "United Arab Emirates", "kode": "AE", "harga":"12.000" },
    	]
	} */
		$data = $this->model->all();
		
		$i='';
		foreach ($data as $value) {
				$i .= "{ value: '".$value->nama."', kode: '".$value->kode_suku_cadang."', harga: '".$value->harga."' },";
			}
		$i=substr($i,0,-1);
		return $i; 
	}


}