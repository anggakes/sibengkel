<?php
use Helpers\BuatKode as BuatKode;
use Helpers\Autocomplete as Autocomplete;

class PemesananController extends BaseController {



	public function add(){

		$nofaktur = new BuatKode(new Pemesanan);
		$autocomplete = new Autocomplete(new SukuCadang);
		
		return View::make('pemesanan.baru')
			->with('nofaktur',$nofaktur->make())
			->with('acSukucadang',$autocomplete->make());
	}

	public function create(){
		
	}

	public function item($kode_sc){
		return true;
	}
	
	public function history(){

	}
}