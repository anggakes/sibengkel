<?php namespace Repositories;

interface EloquentCRUDInterface {

	public function findById($id);
	public function retrieve();
	public function create($data);
	public function update($id, $data);
	public function delete ($id);
	public function validate($data);
}