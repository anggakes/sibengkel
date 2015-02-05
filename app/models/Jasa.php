<?php

class Jasa extends Eloquent {
	public $timestamps = false;
	protected $fillable = ["nama", "harga"];
	protected $table = "jasa";
	protected $guarded = ['id'];

	public $name = "Jasa";

/* relational 
	
	public function Jasa(){
		return $this->belongsTo('KategoriSukuCadang','id_kategori_suku_cadang');
	}

	public function motor(){
		return $this->belongsToMany('Motor', 'suku_cadang_motor', 'id_suku_cadang', 'id_motor');
	}

/* end relational */


/* coloumn yang ditampilkan pada datatables */
	public $showColoumn = ["Nama","Harga","Aksi"];

/*
|	rules untuk validation form
|	menggunakan Validator laravel
*/	
	public $rules = [
		'nama'=>'required|unique:jasa',
		'harga'=>'required'
	];

/*
|	mendefinisikan field pada form
|	untuk text [name,type,placeholder]
*/	
	public function fields(){
		$fields =
			[
				[
				"label"=>"Nama",
				"name"=>"nama",//gunakan huruf kecil dan underscore
				"type"=>"text",
				"placeholder"=>"Nama Jasa"
				],
				[
				"label"=>"Harga",
				"name"=>"harga",//gunakan huruf kecil dan underscore
				"type"=>"number",
				"placeholder"=>"Harga Jasa",
				"step"=>"500"
				],
			];

		return $fields;
	}

/* 
|	menghandle pembuatan column pada datatables
|	documentation : https://github.com/Chumper/Datatable
*/	

	public function datatables(){
        return Datatable::collection( $this->all(array('id','nama', 'harga')))
        ->showColumns('nama','harga')
        ->searchColumns('nama','harga')
        ->orderColumns('nama','harga')
         ->addColumn('name',function($model){
            return "<a href='".route($this->name.'.edit',$model->id)."'>edit</a>
            		<a href='".route($this->name.'.delete',$model->id)."' onClick=\"return confirm('yakin menghapus ?')\">hapus</a>
            		";
        })
        ->make();
	}
       
}