<?php namespace Repositories;

use Validator;
use App; 
use NotFoundException;

abstract class EloquentCRUD {
 
    public function findById($id){

      $model = $this->model->find($id);
      if(!$model) throw new NotFoundException("id '".$id."' tidak ditemukan");
      return $model;
    }

    public function retrieve(){

    	return $this->model->all();
  	}

  	public function create($data){
  		$this->validate($data);
      return $this->model->create($data); 

  	}

  	public function update($id, $data){
  		
  		$model = $this->findById($id);
      $model->fill($data);
      $this->validate($model->toArray());
      $model->save();
      return $model;
  	}

  	public function delete($id){

  	$model = $this->findById($id);
    $model->delete();
    return true;
      
  	}

    public function validate($data)
  {
    $validator = Validator::make($data, Post::$rules);
    if($validator->fails()) throw new ValidationException($validator);
    return true;
  }
 

} // end of abstract EloquentCRUD