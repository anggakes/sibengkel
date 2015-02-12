<?php
use Helpers\BuatKode as BuatKode;

class PemesananController extends BaseController {



	public function add(){
		$nofaktur = new BuatKode(new Pemesanan);
		return View::make('pemesanan.baru')
			->with('nofaktur',$nofaktur->make());
	}

	public function create(){
		
	}

	public function item($kode_sc){
		return true;
	}
	
	public function history(){

	}
}