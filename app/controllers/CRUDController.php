<?php

abstract class CRUDController extends BaseController {

/* inisialisasi model */

	public $model;

/*
|
|	Fungsi untuk menampilkan halaman index
*/
	public function index()
	{
		return View::make("crud.index")
			->with('showColoumn',$this->model->showColoumn)
			->with('name',$this->model->name);
	}


	public function create()
	{
		return View::make("crud.form")
			->with('type','create')
			->with('name',$this->model->name)
			->with('fields',$this->model->fields());
	}

/*
|
|	Fungsi untuk memproses tambah data
|	jika terbagi menjadi request ajax dan request url
*/
	public function store()
	{
		#Validation
		$validator = Validator::make(Input::all(),$this->model->rules);
		if($validator->fails()){
			if (Request::ajax())
			{
           
				return Response::json(
						[
							'success' => false, 
						 	'errors' => $validator->getMessageBag()->toArray()
						],200
					);
			}
			else
			{
				return Redirect::route($this->model->name.'.create')
				->withErrors($validator);
			}
			
		}else {

			#save
			$this->model->create(Input::all());

			if (Request::ajax())
			{
				return Response::json([
						'success' => true,
						'messages'=>'Data berhasil disimpan'
					],201);			
			}
			else
			{
				return Redirect::route($this->model->name.'.create');
			}
		}	
	}

/*
|
|	Halaman Edit data
|	
*/
	public function edit($id){
		return View::make("crud.form")
			->with('type','edit')
			->with('value',$this->model->find($id))
			->with('name',$this->model->name)
			->with('fields',$this->model->fields());
	}

	public function update($id){
		#Validation
		$validator = Validator::make(Input::all(),$this->model->rules);
		if($validator->fails()){
			if (Request::ajax())
			{
					return Response::json(
						[
							'success' => false, 
						 	'errors' => $validator->getMessageBag()->toArray()
						],200
					);
			}
			else
			{
				return Redirect::route($this->model->name.'.create')
				->withErrors($validator);
			}
			
		}else {

			#update
			$this->model->find($id)
				->update(Input::all());
			

			if (Request::ajax())
			{
				return Response::json([
						'success' => true,
						'messages'=>'Data berhasil disimpan'
					],201);
			}
			else
			{
				return Redirect::route($this->model->name.'.edit',$id);
			}
		}	
	}

/*
|
|	Fungsi untuk menghapus data
|	
*/
	public function delete($id){
		$this->model->find($id)->delete();

		return Redirect::route($this->model->name);
	}

/*
|
|	Fungsi untuk menghandle request datatables
|	fungsi secara keseluruhan terdapat di masing-masing model
*/
	public function datatables(){

		return $this->model->datatables();
	}

}
