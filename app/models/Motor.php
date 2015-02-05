<?php

class Motor extends Eloquent {
	public $timestamps = false;
	protected $fillable = ["nama","id_kategori_motor"];
	protected $table = "motor";
	protected $guarded = ['id'];

	public $name = "Motor";

/* relational */
	
	public function kategoriMotor(){
		return $this->belongsTo('KategoriMotor','id_kategori_motor');
	}

/* end relational */


/* coloumn yang ditampilkan pada datatables */
	public $showColoumn = ["Nama Motor","Kategori","#"];

/*
|	rules untuk validation form
|	menggunakan Validator laravel
*/	
	public $rules = [
		'nama'=>'required',
		'id_kategori_motor'=>'required'
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
				"placeholder"=>"Nama Motor"
				],
				[
				"label"=>"Kategori Motor",
				"name"=>"id_kategori_motor",
				"type"=>"select",
				"list"=>KategoriMotor::lists('nama','id')
				]
			];

		return $fields;
	}

/*
|	menghandle pembuatan column pada datatables
|	documentation : https://github.com/Chumper/Datatable
*/	

	public function datatables(){
		$data = $this->with('kategoriMotor')->get();
        return Datatable::collection($data)
        ->showColumns('nama')
        ->searchColumns('nama','kategori_motor')
        ->orderColumns('nama','kategori_motor')
        ->addColumn('kategori_motor',function($model){
        	return $model->kategori_motor->nama;
        })
         ->addColumn('name',function($model){
            return "<a id='showModal'  data-toggle='modal' data-target='#modal'  href='".route($this->name.'.edit',$model->id)."'>edit</a>
            		<a href='".route($this->name.'.delete',$model->id)."' onClick=\"return confirm('yakin menghapus ?')\">hapus</a>
            		";
        })
        ->make();
	}
}