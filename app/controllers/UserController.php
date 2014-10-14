<?php
class UserController extends BaseController
{
	public function update(){
		$input = Input::all();
		$user = User::find($input['id']);
		if(!count($user)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$validated = Validator::make($input,User::rules(),User::messages());
		if($validated->fails()){
			return Redirect::to('/user/setting/'.$input['id'])->withInput()->withErrors($validated);
		}
		if(Input::hasFile('avatar')){
			$name = Str::random(32);
			$extension = Input::file('avatar')->getClientOriginalExtension();
			$name = $name.$extension;
		}else{
			unset($Input['avatar']);
		}
		$update = $user->update($input);
		if(!$update){
			return Redirect::to('/user/setting/'.$input['id'])->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/');
	}
}
?>