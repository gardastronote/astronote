<?php
class MonitoringController extends BaseController
{

	/*--------------------------------------------------------------------
	| Pengaturan Data pegawai
	|---------------------------------------------------------------------
	*/
	public function add_pengaturan_data_pegawai(){
		$input = Input::all();
		$validated = Validator::make($input,$input['obj']::rules(),$input['obj']::messages());
		if($validated->fails()){
			return Redirect::to('/add_pengaturan_data_pegawai/'.$input['obj'].'/'.$input['type'])->withInput()->withErrors($validated);
		}
		$insert = $input['obj']::create($input);
		if(!$insert){
			return Redirect::to('/add_pengaturan_data_pegawai/')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/pengaturan_data_pegawai/')->with('alert.success','Data berhasil di tambahkan');
	}

	public function post_edit_pengaturan_data_pegawai(){
		$input = Input::all();
		$data = $input['obj']::find($input['id']);
		if(!count($data)>0){
			App::abort(404,'Halaman Tidak di temukan');
		}
		$validated = Validator::make($input,$input['obj']::rules($input['id']),$input['obj']::messages());
		if($validated->fails()){
			return Redirect::to('/add_pengaturan_data_pegawai/'.$input['obj'].'/'.$input['type'])->withInput()->withErrors($validated);
		}
		$update = $data->update($input);
		if(!$update){
			Redirect::to('/pengaturan_data_pegawai')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/pengaturan_data_pegawai')->with('alert.success','Data berhasil di ubah');
	}

	public function delete_pengaturan_data_pegawai($type,$id){
		$delete = $type::find($id);
		if(!count($delete)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$delete = $delete->delete();
		if(!$delete){
			return Redirect::to('pengaturan_data_pegawai/')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('pengaturan_data_pegawai')->with('alert.success','Data berhasil di hapus');
	}
	/*--------------------------------------------------------------------
	| Merge Data pegawai
	|---------------------------------------------------------------------
	*/
	function add_data_pegawai(){
		$input = Input::all();
		$validated = Validator::make($input,Pegawai_data::rules(),Pegawai_data::messages());
		if($validated->fails()){
			return Redirect::to('/add_data_pegawai')->withInput()->withErrors($validated);
		}
		$input = Pegawai_data::create($input);
		if(!$input){
			return Redirect::back()->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/data_pegawai')->with('alert.success','Data berhasil di tambah');
	}
	function delete_data_pegawai($id){
		$data = Pegawai_data::find($id);
		if(!count($data)>0){
			App::abort(404,'Halaman halaman tidak di temukan');
		}
		$data = $data->delete();
		if(!$data){
			return Redirect::to('/data_pegawai')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/data_pegawai')->with('alert.success','Data berhasil di hapus');
	}

	public function edit_data_pegawai($id){
		$data = Pegawai_data::find($id);
		if(!count($data)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$grades = Pegawai_grade::orderBy('grade','ASC')->lists('grade','id');
		$titles = Pegawai_title::orderBy('title','ASC')->lists('title','id');
		$jobs = Pegawai_job::orderBy('job','ASC')->lists('job','id');
		$units = Pegawai_unit::orderBy('unit','ASC')->lists('unit','id');
		$penempatans = Pegawai_penempatan::orderBy('penempatan','ASC')->lists('penempatan','id');
		$jeniss = Pegawai_jenis::orderBy('jenis','ASC')->lists('jenis','id');
		$view = View::make('monitoring.merge_data_pegawai',array(
			'data'=>$data,
			'grades'=>$grades,
			'titles'=>$titles,
			'jobs'=>$jobs,
			'units'=>$units,
			'penempatans'=>$penempatans,
			'jeniss'=>$jeniss,
			'submit'=>'Tambah'
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
			}
		return $view;
	}

	public function post_edit_data_pegawai(){
		$input = Input::all();
		$data = Pegawai_data::find($input['id']);
		if(!count($data)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$validated = Validator::make($input,Pegawai_data::rules($input['id']),Pegawai_data::messages());
		if($validated->fails()){
			return Redirect::to('/edit_data_pegawai/'.$input['id'])->withInput()->withErrors($validated);
		}
		$update = $data->update($input);
		if(!$update){
			return Redirect::to('/edit_data_pegawai/'.$input['id'])->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/data_pegawai')->with('alert.success','Data berhasil di ubah');
	}

	public function search_data_pegawai(){
		$type = Input::get('type');
		if($type !== 'nip' && $type !== 'nama' && $type !== 'grade' && $type !== 'jenis' && $type !== 'job' && $type !== 'penempatan' && $type !== 'title' && $type !== 'unit'){
			App::abort(404,'Halaman tidak di temukan');
		}
		if($type == 'nip' || $type == 'nama'){
			$pegawai = Pegawai_data::where($type,'LIKE','%'.Input::get('q').'%')->orderBy('updated_at','DESC')->paginate(33);
		}else{
			$pegawai = Pegawai_data::whereHas($type,function($Q){
				$Q->where(Input::get('type'),'LIKE',"%".Input::get('q')."%");
			})->paginate(33);
		}
		$view = View::make('monitoring.data_pegawai',array(
			'pegawai'=>$pegawai
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
			}
		return $view;
	}
	/*--------------------------------------------------------------------
	| Pengaturan data pelatihan
	|---------------------------------------------------------------------
	*/

	public function pengaturan_data_pelatihan(){
		$input = Input::all();
		$validated = Validator::make($input,Pelatihan_pelatihan::rules(),Pelatihan_pelatihan::messages());
		if($validated->fails()){
			return Redirect::to('/add_pengaturan_data_pelatihan')->withInput()->withErrors($validated);
		}
		$input = Pelatihan_pelatihan::create($input);
		if(!$input){
			return Redirect::to('/pengaturan_data_pelatihan')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/pengaturan_data_pelatihan');
	}

	public function edit_pengaturan_data_pelatihan(){
		$input = Input::all();
		$validated = Validator::make($input,Pelatihan_pelatihan::rules(),Pelatihan_pelatihan::messages());
		if($validated->fails()){
			return Redirect::to('/edit_pengaturan_data_pelatihan/'.$input['id'])->withErrors($validated)->withInput();
		}
		$update = Pelatihan_pelatihan::find($input['id']);
		$update = $update->update($input);
		if(!$update){
			return Redirect::to('/pengaturan_data_pelatihan')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/pengaturan_data_pelatihan')->with('alert.success');
	}

	public function search_pengaturan_data_pelatihan(){
		$pelatihans = Pelatihan_pelatihan::where('pelatihan','LIKE','%'.Input::get('p').'%')->paginate(21);
		$view = View::make('monitoring.pengaturan_data_pelatihan',array(
			'pelatihans'=>$pelatihans
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
			}
		return $view;
	}

	/*--------------------------------------------------------------------
	| Merge data pelatihan
	|---------------------------------------------------------------------
	*/

	public function add_data_pelatihan(){
		$input = Input::all();
		$validated = Validator::make($input,Pelatihan_data::rules(),Pelatihan_data::messages());
		if($validated->fails()){
			if(isset($input['data_pelatihan'])){
				return Redirect::to('/add_data_pelatihan/'.$input['id_pegawai'].'?id_pelatihan='.$input['data_pelatihan'])->withInput()->withErrors($validated);
			}
			return Redirect::to('/add_data_pelatihan/'.$input['id_pegawai'])->withInput()->withErrors($validated);
		}
		$check = Pelatihan_data::where('id_pegawai','=',$input['id_pegawai'])->where('id_pelatihan','=',$input['id_pelatihan'])->count();
		if($check > 0){
			return Redirect::to('/data_pelatihan/'.$input['id_pegawai'])->with('alert.error','Pegawai sudah mengikuti pelatihan yg di Input');
		}
		$cek = Pelatihan_data::create($input);
		if(!$cek){
			return Redirect::to('/data_pelatihan/'.$input['id_pegawai'])->with('alert.error',ERR_DEV);
		}
		if(isset($input['data_pelatihan'])){
			return Redirect::to('/pelatihan/'.$input['data_pelatihan'])->with('alert.success','Data berhasil di tambahkan');
		}
		return Redirect::to('/data_pelatihan/'.$input['id_pegawai'])->with('alert.success','Data berhasil di tambahkan');		
	}

	public function edit_data_pelatihan(){
		$input = Input::all();
		$update = Pelatihan_data::find($input['id']);
		if(!count($update)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$validated = Validator::make($input,Pelatihan_data::rules(),Pelatihan_data::messages());
		if($validated->fails()){
			return Redirect::to('/edit_data_pelatihan/'.$input['id'])->withInput()->withErrors($validated);
		}
		$check = Pelatihan_data::where('id_pegawai','=',$input['id_pegawai'])->where('id_pelatihan','=',$input['id_pelatihan'])->count();
		if($check > 0 && $update->id_pelatihan != $input['id_pelatihan']){
			return Redirect::to('/data_pelatihan/'.$input['id_pegawai'])->with('alert.error','Pegawai sudah mengikuti pelatihan yg di Input');
		}
		$update = $update->update($input);
		if(!$update){
			return Redirect::back()->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/data_pelatihan/'.$input['id_pegawai'])->with('alert.success','Data berhasil di ubah');
	}

	public function search_data_pelatihan(){
		$input = Input::all();
		$pegawai = Pegawai_data::find($input['p']);
		if(!count($pegawai)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$pelatihans = Pelatihan_data::whereHas('pelatihan',function($Q){
			$Q->where('pelatihan','LIKE','%'.Input::get('pelatihan').'%')->where('id_pegawai','=',Input::get('p'));
		})->paginate(21);
		$view = View::make('monitoring.data_pelatihan',array(
			'id_pegawai'=>Input::get('p'),
			'pegawai'=>$pegawai,
			'pelatihans'=>$pelatihans
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
			}
		return $view;
	}

	public function search_pelatihan(){
		$pelatihans = Pelatihan_data::whereHas('pelatihan',function($q){
			$q->where('pelatihan','LIKE','%'.Input::get('p').'%');
		})->paginate(21);
		$view = View::make('monitoring.pelatihan',array(
			'pelatihans'=>$pelatihans
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
			}
		return $view;
	}
}
?>