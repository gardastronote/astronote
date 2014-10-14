<?php
class UserController extends BaseController
{
	public function update(){
		$input = Input::all();
		$user = User::find($input['id']);
		if(!count($user)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		if(!empty($input['password'])){
			$pass = true;
		}else{
			unset($input['password']);
			$pass = false;
		}
		$validated = Validator::make($input,User::update_rules($input['id'],$pass),User::messages());
		if($validated->fails()){
			return Redirect::to('/user/setting/'.$input['id'])->withInput()->withErrors($validated);
		}
		if(!empty($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}
		if(Input::hasFile('avatar')){
				$avatar = Input::file('avatar');
				$name = Str::random(32);
				$path = public_path().'/avatar/';
				$extension = $avatar->guessClientExtension();
				$name = $name.'.'.$extension;
				$avatar->move($path,$name);
				$input['avatar'] = $name;
		}else{
			unset($input['avatar']);
		}
		$update = $user->update($input);
		if(!$update){
			return Redirect::to('/user/setting/'.$input['id'])->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/');
	}
}
?>