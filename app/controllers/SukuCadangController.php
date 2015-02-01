<?php

class SukuCadangController extends CRUDController {


	public function __construct (SukuCadang $model){
		$this->model = $model;
	}

	public function store(){
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
			DB::transaction(function(){
				# simpan sukucadang
				$this->model = $this->model->create(Input::all());
				
				#simpan suku_cadang_motor
				$motor=null;
				foreach (Input::get('motor') as $key=>$val){
					$motor[$key]['id_suku_cadang'] = $this->model->id;
					$motor[$key]['id_motor'] = $val;
				}

				#multiple insert
				DB::table('suku_cadang_motor')->insert($motor);
			});
			
			if (Request::ajax())
			{
				return Response::json([
						'success' => true,
					],201);			
			}
			else
			{
				return Redirect::route($this->model->name.'.create');
			}
		}	
	}


// Overide update function 
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

			#save
			DB::transaction(function()use($id){
				# simpan sukucadang
				$this->model = $this->model->find($id);
				$this->model->update(Input::all());
				
				#sinkronisasi tabel pivot
				$this->model->motor()->sync(Input::get('motor'));
				
			});
			
			

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
	

}