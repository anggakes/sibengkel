<?php


class KategoriMotor extends Eloquent {
	public $timestamps = false;
	protected $fillable = ["nama"];
	protected $table = "kategori_motor";
	protected $guarded = ['id'];

	public $name = "KategoriMotor";

	/* coloumn yang ditampilkan pada datatables */
	public $showColoumn = ["Nama Kategori","#"];

	/*
		rules untuk validation form
		menggunakan Validator laravel
	*/
	public $rules = [
		'nama'=>'required|unique:kategori_motor'
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
				"placeholder"=>"Nama Kategori Motor"
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
            return "<a id='showModal'  data-toggle='modal' data-target='#modal' href='".route($this->name.'.edit',$model->id)."'>edit</a>
            		<a href='".route($this->name.'.delete',$model->id)."' onClick=\"return confirm('yakin menghapus ?')\">hapus</a>
            		";
        })
        ->make();
	}
}
