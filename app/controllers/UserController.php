<?php
class UserController extends BaseController
{
	public function add(){
		$input = Input::all();
		$validated = Validator::make($input,User::add_rules(),User::messages());
		if($validated->fails()){
			return Redirect::to('/user/add')->withInput()->withErrors($validated);
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
		$add = User::create($input);
		if(!$add){
			return Redirect::to('/user/add')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/user')->with('alert.success','Data berhasil di tambahkan');
	}
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
			if($user->avatar !== 'default.png'){
				File::delete(public_path().'/avatar/'.$user->avatar);
			}
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
		if($input['type'] == 'admin'){
			return Redirect::to('/user');
		}else{
			return Redirect::to('/dashboard');
		}
	}

	public function deleteAvatar($id,$type){
		$user = User::find($id);
		if(!count($user)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		if($user->avatar !== 'default.png'){
			$delete = File::delete(public_path().'/avatar/'.$user->avatar);
			$user->avatar = 'default.png';
			$user->save();
			if(!$delete){
				return Redirect::to('/')->with('alert.error',ERR_DEV);
			}
			if($type == 'admin'){
				return Redirect::to('/user')->with('alert.success','Avatar berhasil di hapus');
			}
			return Redirect::to('/')->with('alert.success','Avatar berhasil di hapus');
		}

		return Redirect::to('/')->with('alert.error',ERR_DEV);
	}

	public function delete($id){
		$user = User::find($id);
		if(!count($user)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		if($user->avatar !== 'default.png'){
			File::delete(public_path().'/avatar/'.$user->avatar);
		}
		$delete = $user->delete();
		if(!$delete){
			return Redirect::to('/user')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/user')->with('alert.success','Data berhasil di hapus');
	}
}
?>