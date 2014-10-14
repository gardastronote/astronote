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
	protected $fillable = array('username','full_name','password','email','avatar');

	public static function rules(){
		return array(
			'username'=>'required',
			'password'=>'required'
			);
	}

	public static function update_rules($id = null,$pass){
		if($pass == true){
			$re = 'required';
		}else{
			$re = null;
		}
		return array(
			'username'=>'required|max:12|unique:users,username,'.$id,
			'full_name'=>'required|max:18',
			'email'=>'unique:users,email,'.$id,
			'password'=>'min:3|max:32',
			're_password'=>$re.'|same:password',
			'avatar'=>'avatar'
			);
	}

	public static function add_rules(){
		return array(
			'username'=>'required|max:12|unique:users,username',
			'full_name'=>'required|max:18',
			'email'=>'email|unique:users,email',
			'password'=>'required|max:32',
			're_password'=>'same:password',
			'avatar'=>'image'
			);
	}

	public static function messages(){
		return array(
			'required'=>':attribute Harus di isi',
			'required'=>':attribute Harus di isi',
			're_password.required'=>'pengulangan password harus di isi',
			'max'=>':attribute terlalu panjang',
			'unique'=>':attribute sudah di gunakan',
			'email'=>':attribute harus berupa email',
			'same'=>'password yang di masukan tidak sama'
			);
	}

}
