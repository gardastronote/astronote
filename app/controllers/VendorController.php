<?php
class VendorController extends BaseController
{
	public function search(){
		$input = Input::all();
		if($input['jenis'] != 'pelatihan' && $input['jenis'] != 'hotel' && $input['jenis'] != 'catering'){
			return Redirect::to('/vendor')->with('alert.error','Halaman yang di minta salah');
		}
		$back = '/vendor'; 
		if(strstr(URL::previous(), '/pelatihan') || strstr(URL::previous(), '/catering') || strstr(URL::previous(), '/hotel') && strstr(URL::previous(), '/search')){
			Session::put('back',URL::previous());
		}
		$vendors = Vendor_data::where('jenis','=',$input['jenis'])->where('nama','LIKE','%'.$input['nama'].'%')->get();
		$view = View::make('monitoring.vendor.search_vendor_data',array(
			'choose'=>true,
			'back'=>Session::get('back'),
			'vendors'=>$vendors
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	}
	public function add(){
		$input = Input::all();
		$validated = Validator::make($input,Vendor_data::rules(),Vendor_data::messages());
		if($validated->fails()){
			return Redirect::to('/vendor/add')->withInput()->withErrors($validated);
		}
		$add = Vendor_data::create($input);
		if(!$add){
			return Redirect::to('/vendor/add')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/vendor/'.$input['jenis'])->with('alert.success','Data berhasil di tambahkan');
	}

	public function edit(){
		$input = Input::all();
		$edit = Vendor_data::find($input['id']);
		if(!count($edit)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$validated = Validator::make($input,Vendor_data::rules($input['id']),Vendor_data::messages());
		if($validated->fails()){
			return Redirect::to('/vendor/edit/'.$input['id'])->withInput()->withErrors($validated);
		}
		$edit = $edit->update($input);
		if(!$edit){
			return Redirect::to('/vendor/edit/',$input['id'])->with('alert-error',ERR_DEV);
		}
		return Redirect::to('/vendor/data/'.$input['id'])->with('alert.success','Data berhasil di ubah');
	}

	public function delete($id){
		$delete = Vendor_data::find($id);
		if(!count($delete)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$jenis = $delete->jenis;
		$delete = $delete->delete();
		if(!$delete){
			return Redirect::to('/vendor/data/'.$id)->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/vendor/'.$jenis)->with('alert.success','Data berhasil di hapus');
	}

	public function search_kegiatan($id){
		$input = Input::all();
		$vendor = Vendor_data::where('id','=',$id)->count();
		if(!($vendor > 0)){
			App::abort(404,'Halaman tidak di temukan');
		}
		if(strstr(URL::previous(), '/vendor/data') && !strstr(URL::previous(), '/search?')){
			Session::put('back',URL::previous());
		}
		$kegiatans = Vendor_kegiatan::where('kegiatan','LIKE','%'.$input['kegiatan'].'%')->where('id_vendor','=',$id)->paginate(17);
		$view = View::make('monitoring.vendor.search_kegiatan_data_vendor',array(
			'id'=>$id,
			'back'=>Session::get('back'),
			'kegiatans'=>$kegiatans
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	}
	public function add_kegiatan(){
		$input = Input::all();
		$validated = Validator::make($input,Vendor_kegiatan::rules(),Vendor_kegiatan::messages());
		if($validated->fails()){
			return Redirect::to('/vendor/data/'.$input['id_vendor'].'/add')->withInput()->withErrors($validated);
		}
		$add = Vendor_kegiatan::create($input);
		if(!$add){
			return Redirect::to('/vendor/data/'.$input['id_vendor'].'/add')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/vendor/data/'.$input['id_vendor'])->with('alert.success','Data berhasil di tambahkan');
	}

	public function edit_kegiatan(){
		$input = Input::all();
		$update = Vendor_kegiatan::find($input['id']);
		if(!count($update)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$validated = Validator::make($input,Vendor_kegiatan::rules(),Vendor_kegiatan::messages());
		if($validated->fails()){
			return Redirect::to('/vendor/data/'.$input['id_vendor'].'/edit/'.$input['id'])->withInput()->withErrors($validated);
		}
		$update = $update->update($input);
		if(!$update){
			return Redirect::to('/vendor/data/'.$input['id_vendor'].'/edit/'.$input['id'])->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/vendor/data/'.$input['id_vendor'])->with('alert.success','Data berhasil di ubah');
	}

	public function delete_kegiatan($id_vendor,$id){
		$vendor = Vendor_data::where('id','=',$id_vendor)->count();
		$delete = Vendor_kegiatan::find($id);
		if(!($vendor > 0) || !(count($delete)>0)){
			App::abort(404,'Halaman tidak di temukan');
		}
		if($id_vendor != $delete->id_vendor){
			App::abort(403,'Anda tidak memiliki hak mengakses ini');
		}
		$delete = $delete->delete();
		if(!$delete){
			return Redirect::to('/vendor/data/'.$id_vendor)->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/vendor/data/'.$id_vendor)->with('alert.success','Data berhasil di hapus');
	}
}
?>