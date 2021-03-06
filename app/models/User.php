<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
 	* Ardent validation rules
 	*/
	public static $rules = array(
 	 'username' => 'required|between:4,16',
 	 'nama' => 'required|min:3',
 	 'password' => 'required|alpha_num|min:8|confirmed',
	 'password_confirmation' => 'required|alpha_num|min:8',
	);

	public $autoPurgeRedundantAttributes = true;


}
