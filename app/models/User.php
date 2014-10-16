<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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

	public static function rules(){
		return array(
			'username'=>'required',
			'password'=>'required'
			);
	}

	public static function update_rules($id = null){
		return array(
			'username'=>'required|max:8|unique:users,username,'.$id,
			'full_name'=>'required|max:18',
			'email'=>'unique:users,email,'.$id,
			'password'=>'max:32',
			're_password'=>'same:password'
			);
	}

	public static function add_rules(){
		return array(
			'username'=>'required|max:12|unique:users,username',
			'full_name'=>'required|max:18',
			'email'=>'email|unique:users,email',
			'password'=>'required|max:32',
			're_password'=>'same:password'
			);
	}

	public static function messages(){
		return array(
			'username.required'=>'Username Harus di isi',
			'password.required'=>'Password Harus di isi',
			'max'=>':attribute terlalu panjang',
			'unique'=>':attribute sudah di gunakan',
			'email'=>':attribute harus berupa email',
			'same'=>'password yang di masukan tidak sama'
			);
	}

}
