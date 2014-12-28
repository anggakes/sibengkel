<?php

class KategoriMotorController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*
*/



	public function create()
	{	
		 $rules = array(
				'nama'     		 => 'required|unique:Jasa', // just a normal required validation			
				);

		 $validator = Validator::make(Input::all(), $rules);
		 if ($validator->fails()) {

			  // get the error messages from the validator
			  $messages = $validator->messages();

			  // redirect our user back to the form with the errors from the validator
			  return $messages;
			  //Redirect::to('ducks')
			   //->withErrors($validator);

		 } 
		 else {	
			DB::beginTransaction();

			$KategoriMotor = new KategoriMotor;
			$KategoriMotor->nama = Input::get('nama');
			$KategoriMotor->save();
		
			DB::commit();
		}
	}

	public function update()
	{
		 $rules = array(
				'id'             => 'required', 
				'nama'     		 => 'required', // just a normal required validation			
				);

		 $validator = Validator::make(Input::all(), $rules);
		 if ($validator->fails()) {

			  // get the error messages from the validator
			  $messages = $validator->messages();

			  // redirect our user back to the form with the errors from the validator
			  return $messages;
			  //Redirect::to('ducks')
			   //->withErrors($validator);

		 } 
		 else {
		 	DB::beginTransaction();

			$KategoriMotor = KategoriMotor::find(Input::get('id'));
			$KategoriMotor->nama=Input::get('nama');
			$KategoriMotor->save();
		 	return $KategoriMotor;

		 	DB::commit();
	 	}
	}

	public function delete()
	{	
		 $rules = array(
				'id'             => 'required',       // just a normal required validation			
				);

		 $validator = Validator::make(Input::all(), $rules);
		 if ($validator->fails()) {

			  // get the error messages from the validator
			  $messages = $validator->messages();

			  // redirect our user back to the form with the errors from the validator
			  return $messages;
			  //Redirect::to('ducks')
			   //->withErrors($validator);

		 } 
		 else {
		 	DB::beginTransaction();

			$KategoriMotor = KategoriMotor::find(Input::get('id'));
			$KategoriMotor->delete();
		 	return $KategoriMotor;

		 	DB::commit();
		 }
	}


	public function index(){

	}
}