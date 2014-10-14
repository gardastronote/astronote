<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before'=>'auth'),function(){
	Route::get('/', function(){
		return View::make('layout.main');
	});
});

/*
|-------------------------------------------------------------------------
| Logging
|-------------------------------------------------------------------------
*/
Route::get('/login',function(){
	return View::make('layout.login');
});
Route::post('/login','AppController@loginPost');
Route::get('/logout','AppController@logout');
Route::get('/feed',function(){
});

/*
|-------------------------------------------------------------------------
| Admin
|-------------------------------------------------------------------------
*/

/*
|-------------------------------------------------------------------------
| Monitoring
|-------------------------------------------------------------------------
*/
	/*--------------------------------------------------------------------
	| Data pegawai
	|---------------------------------------------------------------------
	*/
	Route::get('/pengaturan_data_pegawai',function(){
		$grades = Pegawai_grade::orderBy('id','DESC')->take(5)->get();
		$jeniss = Pegawai_jenis::orderBy('id','DESC')->take(5)->get();
		$jobs = Pegawai_job::orderBy('id','DESC')->take(5)->get();
		$penempatans = Pegawai_penempatan::orderBy('id','DESC')->take(5)->get();
		$titles = Pegawai_title::orderBy('id','DESC')->take(5)->get();
		$units = Pegawai_unit::orderBy('id','DESC')->take(5)->get();
		$view = View::make('monitoring.pengaturan_data_pegawai',array(
			'url'=>'/add_pengaturan_data_pegawai',
			'grades'=>$grades,
			'jeniss'=>$jeniss,
			'jobs'=>$jobs,
			'penempatans'=>$penempatans,
			'titles'=>$titles,
			'units'=>$units,
			'button'=>"Tambah"
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});

	// route grade
	Route::get('/pengaturan_data/{type}',function($type){
		if($type !== 'grade' && $type !== 'jenis' && $type !== 'job' && $type !== 'penempatan' && $type !== 'title' && $type !== 'unit'){
			App::abort(404,'Halaman tidak di temukan');
		}
		switch($type){
			case 'grade':
			$model = 'Pegawai_grade';
			$type = 'grade';
			break;

			case 'jenis':
			$model = 'Pegawai_jenis';
			$type = 'jenis';
			break;

			case 'job':
			$model = 'Pegawai_job';
			$type = 'job';
			break;

			case 'penempatan':
			$model = 'Pegawai_penempatan';
			$type = 'penempatan';
			break;

			case 'title':
			$model = 'Pegawai_title';
			break;

			case 'unit':
			$model = 'Pegawai_unit';
			break;
		}
		$datas = $model::orderBy('id','DESC')->paginate(10);
		$view = View::make('monitoring.pengaturan_data',array(
			'datas'=>$datas,
			'type'=>$type,
			'model'=>$model
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::get('/add_pengaturan_data_pegawai/{obj}/{type}',function($obj,$type){
		$view = View::make('monitoring.merge_pengaturan_data_pegawai',array(
			'url'=>'/add_pengaturan_data_pegawai',
			'obj'=>$obj,
			'type'=>$type,
			'button'=>'Tambah'
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::post('/add_pengaturan_data_pegawai','MonitoringController@add_pengaturan_data_pegawai');
	Route::get('/delete_pengaturan_data_pegawai/{type}/{id}/',array(
		'as'=>'delete_pengaturan_data_pegawai',
		'uses'=>'MonitoringController@delete_pengaturan_data_pegawai'
		));
	Route::get('/edit_pengaturan_data_pegawai/{obj}/{type}/{id}',array(
		'as'=>'edit_pengaturan_data_pegawai',
		function($obj,$type,$id){
			$data = $obj::find($id);
			if(!count($data)>0){
				App::abort(404,'Halaman Tidak di temukan');
			}
			$view = View::make('monitoring.merge_pengaturan_data_pegawai',array(
				'url'=>'/edit_pengaturan_data_pegawai',
				'data'=>$data,
				'type'=>$type,
				'obj'=>$obj 
				));
			if(Request::ajax()){
					$section = $view->renderSections();
					return $section['content'];
				}
			return $view;
			}
		));
	Route::post('/edit_pengaturan_data_pegawai','MonitoringController@post_edit_pengaturan_data_pegawai');
	Route::get('/data_pegawai',function(){
		$pegawai = Pegawai_data::orderBy('updated_at','DESC')->paginate(33);
		return View::make('monitoring.data_pegawai',array(
			'pegawai'=>$pegawai
			));
	});
	Route::get('/add_data_pegawai',function(){
		$grades = Pegawai_grade::lists('grade','id');
		$titles = Pegawai_title::lists('title','id');
		$jobs = Pegawai_job::lists('job','id');
		$units = Pegawai_unit::lists('unit','id');
		$penempatans = Pegawai_penempatan::lists('penempatan','id');
		$jeniss = Pegawai_jenis::lists('jenis','id');
		return View::make('monitoring.merge_data_pegawai',array(
			'url'=>'/add_data_pegawai',
			'grades'=>$grades,
			'titles'=>$titles,
			'jobs'=>$jobs,
			'units'=>$units,
			'penempatans'=>$penempatans,
			'jeniss'=>$jeniss,
			'submit'=>'Tambah'
			));
	});
	Route::post('/add_data_pegawai','MonitoringController@add_data_pegawai');
	Route::get('/edit_data_pegawai/{id}','MonitoringController@edit_data_pegawai');
	Route::post('/edit_data_pegawai','MonitoringController@post_edit_data_pegawai');
	Route::get('/delete_data_pegawai/{id}','MonitoringController@delete_data_pegawai');
	Route::get('/search_data_pegawai','MonitoringController@search_data_pegawai');

	/*--------------------------------------------------------------------
	| Data pelatihan
	|---------------------------------------------------------------------
	*/
	Route::get('/pelatihan',function(){
		$pelatihans = Pelatihan_data::orderBy('updated_at')->paginate(21);
		return View::make('monitoring.pelatihan',array(
			'pelatihans'=>$pelatihans
			));
	});
	Route::get('/pelatihan/{id}',function($id){
		$pelatihan = Pelatihan_pelatihan::find($id);
		$pelatihans = Pelatihan_data::where('id_pelatihan','=',$id)->paginate(21);
		return View::make('monitoring.pelatihan_data',array(
			'id'=>$id,
			'pelatihan'=>$pelatihan,
			'pelatihans'=>$pelatihans
			));
	});
	Route::get('/excel_pelatihan_data/{id_pelatihan}',function($id_pelatihan){
		$pelatihans = Pelatihan_data::where('id_pelatihan','=',$id_pelatihan)->get();
		$pelatihan = Pelatihan_pelatihan::find($id_pelatihan);
		return View::make('monitoring.excel_pelatihan_data',array(
			'id_pelatihan'=>$id_pelatihan,
			'pelatihan'=>$pelatihan,
			'pelatihans'=>$pelatihans
			));
	});
	Route::get('/search_pelatihan','MonitoringController@search_pelatihan');
	Route::get('/pengaturan_data_pelatihan',function(){
		$pelatihans = Pelatihan_pelatihan::orderBy('id','DESC')->paginate(21);
		return View::make('monitoring.pengaturan_data_pelatihan',array(
			'pelatihans'=>$pelatihans
			));
	});
	Route::get('/add_pengaturan_data_pelatihan',function(){
		return View::make('monitoring.merge_pengaturan_data_pelatihan',array(
			'url'=>'/add_pengaturan_data_pelatihan',
			'button'=>'Tambah'
			));
	});
	Route::post('/add_pengaturan_data_pelatihan','MonitoringController@pengaturan_data_pelatihan');
	Route::get('/edit_pengaturan_data_pelatihan/{id}',function($id){
		$data = Pelatihan_pelatihan::find($id);
		if(!count($data)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		return View::make('monitoring.merge_pengaturan_data_pelatihan',array(
			'data'=>$data,
			'url'=>'/edit_pengaturan_data_pelatihan',
			'button'=>'Ubah'
			));
	});
	Route::post('/edit_pengaturan_data_pelatihan','MonitoringController@edit_pengaturan_data_pelatihan');
	Route::get('/delete_pengaturan_data_pelatihan/{type}/{id}',function($type,$id){
		$delete = $type::find($id);
		if(!count($delete)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$delete = $delete->delete();
		if(!$delete){
			return Redirect::to('/pengaturan_data_pelatihan')->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/pengaturan_data_pelatihan')->with('alert.success','Data berhasil di hapus');
	});
	Route::get('/search_pengaturan_data_pelatihan','MonitoringController@search_pengaturan_data_pelatihan');
	Route::get('/data_pelatihan/{id_pegawai}',function($id_pegawai){
		$pegawai = Pegawai_data::find($id_pegawai);
		$pelatihans = Pelatihan_data::where('id_pegawai','=',$id_pegawai)->paginate(21);
		return View::make('monitoring.data_pelatihan',array(
			'id_pegawai'=>$id_pegawai,
			'pegawai'=>$pegawai,
			'pelatihans'=>$pelatihans
			));
	});
	Route::get('/add_data_pelatihan/{id_pegawai}',function($id_pegawai){
		if(!count(Pegawai_data::find($id_pegawai))>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$pelatihans = Pelatihan_pelatihan::lists('pelatihan','id');
		return View::make('monitoring.merge_data_pelatihan',array(
			'url'=>'/add_data_pelatihan',
			'id_pegawai'=>$id_pegawai,
			'pelatihans'=>$pelatihans,
			'button'=>'Tambah'
			));
	});
	Route::post('/add_data_pelatihan','MonitoringController@add_data_pelatihan');
	Route::get('/edit_data_pelatihan/{id}',function($id){
		$data = Pelatihan_data::find($id);
		if(!count($data)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$pelatihans = Pelatihan_pelatihan::lists('pelatihan','id');
		return View::make('monitoring.merge_data_pelatihan',array(
			'pelatihans'=>$pelatihans,
			'data'=>$data,
			'url'=>'/edit_data_pelatihan',
			'button'=>'ubah'
			));
	});
	Route::post('/edit_data_pelatihan','MonitoringController@edit_data_pelatihan');
	Route::get('/delete_data_pelatihan/{id_pegawai}/{id}',function($id_pegawai,$id){
		$delete = Pelatihan_data::find($id);
		if(!count($delete)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$delete = $delete->delete();
		if(!$delete){
			return Redirect::to('/data_pelatihan/'.$id_pegawai)->with('alert.error',ERR_DEV);
		}
		return Redirect::to('/data_pelatihan/'.$id_pegawai)->with('alert.success','Data berhasil di hapus');
	});
	Route::get('/excel_data_pelatihan/{id_pegawai}',function($id_pegawai){
		$pegawai = Pegawai_data::find($id_pegawai);
		$pelatihans = Pelatihan_data::where('id_pegawai','=',$id_pegawai)->orderBy('created_at','DESC')->get();
		return View::make('monitoring.excel_data_pelatihan',array(
			'pegawai'=>$pegawai,
			'pelatihans'=>$pelatihans
			));
	});
	Route::get('/search_data_pelatihan','MonitoringController@search_data_pelatihan');

	/*--------------------------------------------------------------------
	| Data Vendor
	|---------------------------------------------------------------------
	*/
	Route::get('/vendor/search','VendorController@search');
	Route::get('/vendor',function(){
		$average = Vendor_kegiatan::avg('nilai');
		$vendors = Vendor_data::all();
		//line chart
		$dates = Vendor_kegiatan::select(DB::raw('MONTHNAME(tanggal) bulan,YEAR(tanggal)tahun,AVG(nilai) as average'))->where('tanggal', '>=',(DB::raw('CURDATE() - INTERVAL 1 YEAR')))->groupBy('bulan')->groupBy('tahun')->orderBy('tanggal','ASC')->get();
		//donut chart
		$pelatihan = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','pelatihan');
		})->avg('nilai');
		$catering = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','catering');
		})->avg('nilai');
		$hotel = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','hotel');
		})->avg('nilai');
		$view = View::make('monitoring.vendor.data_vendor',array(
			'title'=>'Divisi Pendidikan dan Pelatihan BJB',
			'strokeColor'=>'rgba(0,0,0,1)',
			'choose'=>true,
			//donut chart
			'pelatihan'=>$pelatihan,
			'catering'=>$catering,
			'hotel'=>$hotel,
			//line chart
			'vendors'=>$vendors,
			'average'=>$average,
			'dates'=>$dates
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::get('/vendor/chart',function(){
		//line chart
		$dates = Vendor_kegiatan::select(DB::raw('MONTHNAME(tanggal) bulan,YEAR(tanggal)tahun,AVG(nilai) as average'))->where('tanggal', '>=',(DB::raw('CURDATE() - INTERVAL 1 YEAR')))->groupBy('bulan')->groupBy('tahun')->orderBy('tanggal','ASC')->get();
		//donut chart
		$pelatihan = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','pelatihan');
		})->avg('nilai');
		$catering = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','catering');
		})->avg('nilai');
		$hotel = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','hotel');
		})->avg('nilai');
		$view = View::make('monitoring.vendor.chart_vendor',array(
			//line
			'dates'=>$dates,
			//donut
			'pelatihan'=>round($pelatihan,2),
			'catering'=>round($catering,2),
			'hotel'=>round($hotel,2),
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::get('/vendor/add',function(){
		$back = '/vendor'; 
		if(strstr(URL::previous(), '/pelatihan') || strstr(URL::previous(), '/catering') || strstr(URL::previous(), '/hotel') || strstr(URL::previous(), '/search')){
			Session::put('back',URL::previous());
			$back = Session::get('back');
		}
		$view = View::make('monitoring.vendor.merge_data_vendor',array(
			'url'=>'/vendor/add',
			'back'=>$back,
			'button'=>'Tambah'
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::post('/vendor/add','VendorController@add');
	Route::get('/vendor/edit/{id}',function($id){
		if(strstr(URL::previous(), '/pelatihan') || strstr(URL::previous(), '/catering') || strstr(URL::previous(), '/hotel') || strstr(URL::previous(), '/search')){
			Session::put('back',URL::previous());
		}
		$data = Vendor_data::find($id);
		if(!count($data)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$view = View::make('monitoring.vendor.merge_data_vendor',array(
			'url'=>'/vendor/edit',
			'back'=>Session::get('back'),
			'data'=>$data,
			'button'=>'Ubah'
			));
		if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
		return $view;
	});
	Route::post('/vendor/edit','VendorController@edit');
	Route::get('/vendor/delete/{id}','VendorController@delete');
		/*--------------------------------------------------------------------
		| Vendor Pelatihan
		|---------------------------------------------------------------------
		*/
		Route::get('/vendor/pelatihan',function(){
			$dates = Vendor_kegiatan::select(DB::raw('MONTHNAME(tanggal) bulan,YEAR(tanggal)tahun,AVG(nilai) as average'))->whereHas('Vendor_data',function($q){
				$q->where('jenis','=','pelatihan');
			})->where('tanggal', '>=',(DB::raw('CURDATE() - INTERVAL 1 YEAR')))->groupBy('bulan')->groupBy('tahun')->orderBy('tanggal','ASC')->get();
			$average = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=','pelatihan');
				})->avg('nilai');
			$vendors = Vendor_data::where('jenis','=','pelatihan')->get();
			$view = View::make('monitoring.vendor.jenis_data_vendor',array(
				'title'=>'Vendor Pelatihan',
				'strokeColor'=>'rgba(0,255,0,1)',
				'choose'=>false,
				'jenis'=>'pelatihan',
				'average'=>$average,
				'dates'=>$dates,
				'vendors'=>$vendors
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});
		/*--------------------------------------------------------------------
		| Vendor Catering
		|---------------------------------------------------------------------
		*/
		Route::get('/vendor/catering',function(){
			$dates = Vendor_kegiatan::select(DB::raw('MONTHNAME(tanggal) bulan,YEAR(tanggal)tahun,AVG(nilai) as average'))->whereHas('Vendor_data',function($q){
				$q->where('jenis','=','catering');
			})->where('tanggal', '>=',(DB::raw('CURDATE() - INTERVAL 1 YEAR')))->groupBy('bulan')->groupBy('tahun')->orderBy('tanggal','ASC')->get();
			$average = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=','catering');
				})->avg('nilai');
			$vendors = Vendor_data::where('jenis','=','catering')->get();
			$view = View::make('monitoring.vendor.jenis_data_vendor',array(
				'title'=>'Vendor Catering',
				'strokeColor'=>'rgba(255,0,0,1)',
				'choose'=>false,
				'jenis'=>'catering',
				'average'=>$average,
				'dates'=>$dates,
				'vendors'=>$vendors
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});
		/*--------------------------------------------------------------------
		| Vendor Hotel
		|---------------------------------------------------------------------
		*/
		Route::get('/vendor/hotel',function(){
			$dates = Vendor_kegiatan::select(DB::raw('MONTHNAME(tanggal) bulan,YEAR(tanggal)tahun,AVG(nilai) as average'))->whereHas('Vendor_data',function($q){
				$q->where('jenis','=','hotel');
			})->where('tanggal', '>=',(DB::raw('CURDATE() - INTERVAL 1 YEAR')))->groupBy('bulan')->groupBy('tahun')->orderBy('tanggal','ASC')->get();
			$average = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=','hotel');
				})->avg('nilai');
			$vendors = Vendor_data::where('jenis','=','hotel')->get();
			$view = View::make('monitoring.vendor.jenis_data_vendor',array(
				'title'=>'Vendor Hotel',
				'strokeColor'=>'rgba(255,128,0,1)',
				'choose'=>false,
				'jenis'=>'hotel',
				'average'=>$average,
				'dates'=>$dates,
				'vendors'=>$vendors
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});

	Route::get('/vendor/data/{id}/search','VendorController@search_kegiatan');
	Route::get('/vendor/data/{id}',function($id){
		$vendor = Vendor_data::find($id);
		if(!count($vendor)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		if(strstr(URL::previous(), '/pelatihan') || strstr(URL::previous(), '/catering') || strstr(URL::previous(), '/hotel') || strstr(URL::previous(), '/search')){
			Session::put('back',URL::previous());
		}
		$average = Vendor_kegiatan::where('id_vendor','=',$id)->avg('nilai');
		$kegiatans = Vendor_kegiatan::where('id_vendor','=',$id)->paginate(10);
		$view = View::make('monitoring.vendor.data_vendor_kegiatan',array(
			'id'=>$id,
			'back'=>Session::get('back'),
			'vendor'=>$vendor,
			'average'=>$average,
			'kegiatans'=>$kegiatans
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::get('/vendor/data/{id_vendor}/add',function($id_vendor){
		$vendor = Vendor_data::where('id','=',$id_vendor)->count();
		if(!($vendor > 0)){
			App::abort(404,'Halaman tidak di temukan');
		}
		$view = View::make('monitoring.vendor.merge_data_vendor_kegiatan',array(
			'url'=>'/vendor/data/add',
			'id_vendor'=>$id_vendor,
			'button'=>'Tambah'
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::post('/vendor/data/add','VendorController@add_kegiatan');
	Route::get('/vendor/data/{id_vendor}/edit/{id}',function($id_vendor,$id){
		$vendor = Vendor_data::where('id','=',$id_vendor)->count();
		$kegiatan = Vendor_kegiatan::find($id);
		if(!($vendor > 0) || !(count($kegiatan) > 0)){
			App::abort(404,'Halaman tidak di temukan');
		}
		if(strstr(URL::previous(),'/data')){
			$back = URL::previous();
		}else{
			$back = '/vendor/data/'.$id_vendor;
		}
		$view = View::make('monitoring.vendor.merge_data_vendor_kegiatan',array(
			'url'=>'/vendor/data/edit',
			'id_vendor'=>$id_vendor,
			'back'=>$back,
			'data'=>$kegiatan,
			'button'=>'Ubah'
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;

	});
	Route::post('/vendor/data/edit','VendorController@edit_kegiatan');
	Route::get('/vendor/data/{id_vendor}/delete/{id}','VendorController@delete_kegiatan');


	Route::get('/feed',function(){
	});

	Route::get('/ajax',function(){
		return View::make('ajax.index');
	});
	Route::get('/test',function(){
		//line chart
		$dates = Vendor_kegiatan::select(DB::raw('MONTHNAME(tanggal) bulan,YEAR(tanggal)tahun,AVG(nilai) as average'))->where('tanggal', '>=',(DB::raw('CURDATE() - INTERVAL 1 YEAR')))->groupBy('bulan')->groupBy('tahun')->orderBy('tanggal','ASC')->get();
		//donut chart
		$pelatihan = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','pelatihan');
		})->avg('nilai');
		$catering = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','catering');
		})->avg('nilai');
		$hotel = Vendor_kegiatan::whereHas('vendor_data',function($q){
			$q->where('jenis','=','hotel');
		})->avg('nilai');
		return View::make('monitoring.vendor.chart_vendor',array(
			//line
			'dates'=>$dates,
			//donut
			'pelatihan'=>round($pelatihan,2),
			'catering'=>round($catering,2),
			'hotel'=>round($hotel,2),
			));
	});