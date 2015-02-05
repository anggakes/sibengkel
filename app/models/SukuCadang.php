<?php

class SukuCadang extends Eloquent {
	public $timestamps = false;
	protected $fillable = ["nama","id_kategori_suku_cadang"];
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
	public $showColoumn = ["Nama Motor","Kategori","Motor","#"];

/*
|	rules untuk validation form
|	menggunakan Validator laravel
*/	
	public $rules = [
		'nama'=>'required',
		'id_kategori_suku_cadang'=>'required',
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
				"label"=>"Nama",
				"name"=>"nama",//gunakan huruf kecil dan underscore
				"type"=>"text",
				"placeholder"=>"Nama Suku Cadang"
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
				]
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
        ->showColumns('nama')
        ->searchColumns('nama','kategori','motor')
        ->orderColumns('nama','kategori','motor')
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
            return "<a  href='".route($this->name.'.edit',$model->id)."'>edit</a>
            		<a href='".route($this->name.'.delete',$model->id)."' onClick=\"return confirm('yakin menghapus ?')\">hapus</a>
            		";
        })
        ->make();
	}
}