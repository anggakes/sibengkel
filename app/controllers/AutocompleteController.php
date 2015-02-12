<?php

class AutocompleteController extends CRUDController {


	public function sukucadang(){
		$sc = SukuCadang::all();

		return $this->make($sc);
	}
	
	public function make($data){
	/*
	{
    "suggestions": [
        { "value": "United Arab Emirates", "kode": "AE", "harga":"12.000" },
    	]
	} */

		$return['sugestion']=null;
		$i=0;
		foreach ($data as $value) {

			$return['sugestion'][$i]['value']=$value->nama;
			$return['sugestion'][$i]['kode']=$value->kode_suku_cadang;
			$return['sugestion'][$i]['harga']=$value->harga;
			$i++;
			
			}

		return $return; 
	}


}