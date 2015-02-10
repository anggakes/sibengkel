<?php

class PemesananController extends BaseController {



	public function add(){

		return View::make('pemesanan.baru');
	}

	public function create(){
		
	}

	public function item($kode_sc){
		return true;
	}
	public function history(){

	}
}