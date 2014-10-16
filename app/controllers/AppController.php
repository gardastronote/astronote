<?php
class AppController extends BaseController
{
	public function login(){
		return View::make('layout.login');
	}
	public function loginPost(){
		$input = Input::all();
		$validated = Validator::make($input,User::rules(),User::messages());
		if($validated->fails()){
			return Redirect::back()->withErrors($validated);
		}
		$data = array(
			'username'=>$input['username'],
			'password'=>$input['password']
			);
		if(Auth::attempt($data)){
			return Redirect::to('/dashboard');
		}
		return Redirect::back()->with('alert.error','Username atau Password Salah');
	}
	public function logout(){
		if(Auth::guest()){
			return Redirect::to('/login');
		}
		Auth::logout();
		return Redirect::to('/');
	}
}
?>