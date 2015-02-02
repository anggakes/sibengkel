<?php


class KategoriSukuCadang extends Eloquent {
	public $timestamps = false;
	protected $fillable = ["nama"];
	protected $table = "kategori_suku_cadang";
	protected $guarded = ['id'];

	public $name = "KategoriSukuCadang";

	/* coloumn yang ditampilkan pada datatables */
	public $showColoumn = ["Nama Kategori","#"];

	/*
		rules untuk validation form
		menggunakan Validator laravel
	*/
	public $rules = [
		'nama'=>'required|unique:kategori_suku_cadang'
	];

	/*
		mendefinisikan field pada form
		untuk text [name,type,placeholder]
		untuk select [name,type,list]
	*/	

	public function fields(){
		$fields =
			[
				[
				"label"=>"Nama",
				"name"=>"nama",//gunakan huruf kecil dan underscore
				"type"=>"text",
				"placeholder"=>"Nama Kategori Suku Cadang"
				]
			];

		return $fields;
	}

	public function datatables(){
        return Datatable::collection( $this->all(array('id','nama')))
        ->showColumns('nama')
        ->searchColumns('nama')
        ->orderColumns('nama')
         ->addColumn('name',function($model){
            return "<a href='".route($this->name.'.edit',$model->id)."'>edit</a>
            		<a href='".route($this->name.'.delete',$model->id)."' onClick=\"return confirm('yakin menghapus ?')\">hapus</a>
            		";
        })
        ->make();
	}
}
