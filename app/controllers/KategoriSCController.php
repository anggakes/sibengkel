<?php

class KategoriSCController extends BaseController {

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
				'nama'     		 => 'required|unique:Kategori_suku_cadang', // just a normal required validation			
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

			$KategoriSC = new KategoriSC;
			$KategoriSC->nama = Input::get('nama');
			$KategoriSC->save();
		
			DB::commit();
		}
	}

	public function search()
	{
		$user = DB::table('Kategori_suku_cadang')->where('id', Input::get('id'))->first();

		return($user->nama);
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

			$KategoriSC = KategoriSC::find(Input::get('id'));
			$KategoriSC->nama=Input::get('nama');
			$KategoriSC->save();

		 	DB::commit();

		 	return $KategoriSC;
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

			$KategoriSC = KategoriSC::find(Input::get('id'));
			$KategoriSC->delete();

		 	DB::commit();

		 	return $KategoriSC;
		 }
	}


	public function index(){

	}
}