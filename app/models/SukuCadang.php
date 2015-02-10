<?php

class SukuCadang extends Eloquent {
	public $timestamps = false;
	protected $fillable = ["nama","id_kategori_suku_cadang", "kode_suku_cadang", 
							"lead_time", "biaya_pesan", "biaya_simpan", "safety_stock", 
							"eoq", "rop", "harga", "status"];
	protected $table = "suku_cadang";
	protected $guarded = ['id'];

	public $name = "SukuCadang";

/* relational */
	
	public function kategoriSukuCadang(){
		return $this->belongsTo('KategoriSukuCadang','id_kategori_suku_cadang');
	}

	public function motor(){
		return $this->belongsToMany('Motor', 'suku_cadang_motor', 'id_suku_cadang', 'id_motor');
	}

/* end relational */


/* coloumn yang ditampilkan pada datatables */
	public $showColoumn = ["Kode Suku Cadang","Nama Suku Cadang","Kategori","Motor","#"];

/*
|	rules untuk validation form
|	menggunakan Validator laravel
*/	
	public $rules = [
		'nama'=>'required',
		'id_kategori_suku_cadang'=>'required',
		'kode_suku_cadang'=>'required',

		'motor'=>'required'
	];

/*
|	mendefinisikan field pada form
|	untuk text [name,type,placeholder]
*/	
	public function fields(){
		$fields =
			[
				[
				"label"=>"Kode Suku Cadang",
				"name"=>"kode_suku_cadang",//gunakan huruf kecil dan underscore
				"type"=>"text",
				"placeholder"=>"Kode Suku Cadang"
				],
				[
				"label"=>"Nama",
				"name"=>"nama",//gunakan huruf kecil dan underscore
				"type"=>"text",
				"placeholder"=>"Nama Kategori Suku Cadang"
				],
				[
				"label"=>"Kategori Suku Cadang",
				"name"=>"id_kategori_suku_cadang",
				"type"=>"select",
				"list"=>KategoriSukuCadang::lists('nama','id')
				],
				[
				"label"=>"Motor",
				"name"=>"motor",
				"type"=>"multiselect",
				"list"=>Motor::lists('nama','id')
				],
				[
				"label"=>"Lead Time",
				"name"=>"lead_time",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"step"=>"1",
				"placeholder"=>"Lama Waktu"
				],
				[
				"label"=>"Biaya Pesan",
				"name"=>"biaya_pesan",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"step"=>"100",
				"placeholder"=>"Biaya Pesan"
				],
				[
				"label"=>"Biaya Simpan",
				"name"=>"biaya_simpan",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"step"=>"1",
				"placeholder"=>"Biaya Simpan"
				],
				[
				"label"=>"Safety Stock",
				"name"=>"safety_stock",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"step"=>"1",
				"placeholder"=>"Stok Pengaman"
				],
				[
				"label"=>"EOQ",
				"name"=>"eoq",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"step"=>"1",
				"placeholder"=>"Jumlah Order Ekonomis"
				],
				[
				"label"=>"ROP",
				"name"=>"rop",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"step"=>"1",
				"placeholder"=>"Titik Pemesanan Kembali"
				],
				[
				"label"=>"Harga",
				"name"=>"harga",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"step"=>"500",
				"placeholder"=>"Harga"
				],
				[
				"label"=>"Status",
				"name"=>"status",//gunakan huruf kecil dan underscore
				"type"=>"select",
				"list"=>["proses_pesan"=>"Proses Pesan", "Siap"=>"Siap"]
				],
			];

		return $fields;
	}

/* 
|	menghandle pembuatan column pada datatables
|	documentation : https://github.com/Chumper/Datatable
*/	

	public function datatables(){
		$data = $this->with('kategoriSukuCadang','motor')->get();

        return Datatable::collection($data)
        
        ->searchColumns('nama','kategori','motor')
        ->orderColumns('nama','kategori','motor')
        ->addColumn('kode_suku_cadang',function($model){

        	return "<a href='".route($this->name.'.detail',$model->id)."'>".$model->kode_suku_cadang."</a>";
        })
        ->addColumn('nama',function($model){

        	return "<a href='".route($this->name.'.detail',$model->id)."'>".$model->nama."</a>";
        })
        ->addColumn('kategori',function($model){
        	return $model->kategori_suku_cadang->nama;
        })
         
        ->addColumn('motor',function($model){
        	$return='';
        	foreach($model->motor as $key=>$val){
        		$return .= $val->nama.", ";
        	}
        	$return = substr($return,0,-2);
        	return $return;
        })
         ->addColumn('name',function($model){
            return "<a id='showModal'  data-toggle='modal' data-target='#modal'  href='".route($this->name.'.edit',$model->id)."'>edit</a>
            		<a href='".route($this->name.'.delete',$model->id)."' onClick=\"return confirm('yakin menghapus ?')\">hapus</a>
            		";
        })
        ->make();
	}
}