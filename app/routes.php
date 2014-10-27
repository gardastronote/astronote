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

	/*--------------------------------------------------------------------
	| User
	|---------------------------------------------------------------------
	*/
	Route::get('/user',array(
		'before'=>'admin',
		function(){
			$users = User::orderBy('updated_at','DESC')->paginate(10);
			$view = View::make('user.users',array(
				'users'=>$users
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;

			}
		));
	Route::get('/user/add',array(
		'before'=>'admin',
		function(){
			$view = View::make('user.merge_user',array(
				'update'=>false,
				'type'=>'admin',
				'url'=>'/user/add',
				'button'=>'Tambah'
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
			}
		));
	Route::post('/user/add',array(
		'before'=>'admin',
		'uses'=>'UserController@add'
		));
	Route::get('/user/setting',function(){
		$user = User::find(Auth::user()->id);
		if(!count($user)>0){
			App::abort(404,'Halaman tidak di temukan');
		}
		$view = View::make('user.merge_user',array(
			'update'=>true,
			'type'=>'user',
			'url'=>'/user/setting',
			'user'=>$user,
			'button'=>'Ubah'
			));
		if(Request::ajax()){
			$section = $view->renderSections();
			return $section['content'];
		}
		return $view;
	});
	Route::get('/user/setting/{id}',array(
		'before'=>'admin',
		function($id){
			$user = User::find($id);
			if(!count($user)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			$view = View::make('user.merge_user',array(
				'update'=>true,
				'type'=>'admin',
				'url'=>'/user/setting',
				'user'=>$user,
				'button'=>'Ubah'
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
			}
		));

	Route::post('/user/setting','UserController@update');

	Route::get('/user/deleteAvatar/{id}/{type}','UserController@deleteAvatar');
	Route::get('/user/delete/{id}',array(
		'before'=>'admin',
		'uses'=>'UserController@delete'
		));
	/*
	|-------------------------------------------------------------------------
	| Admin
	|-------------------------------------------------------------------------
	*/
	/*
	|-------------------------------------------------------------------------
	| Dashboard
	|-------------------------------------------------------------------------
	*/
	Route::get('/dashboard',function(){
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
		//count pelatihan
		$count_pelatihan = Vendor_data::where('jenis','=','pelatihan')->count();
		//count catering
		$count_catering = Vendor_data::where('jenis','=','catering')->count();
		//count hotel
		$count_hotel = Vendor_data::where('jenis','=','hotel')->count();

		// top vendor
		$top_pelatihan = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=','pelatihan');	
				})
				->where(DB::raw('MONTH(tanggal)'),'=',date('n'))
				->where(DB::raw('YEAR(tanggal)'),'=',date('Y'))
				->orderBy('nilai','DESC')
				->with('vendor_data')
				->take(5)
				->get();
		$top_catering = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=','catering');	
				})
				->where(DB::raw('MONTH(tanggal)'),'=',date('n'))
				->where(DB::raw('YEAR(tanggal)'),'=',date('Y'))
				->orderBy('nilai','DESC')
				->with('vendor_data')
				->take(5)
				->get();
		$top_hotel = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=','hotel');	
				})
				->where(DB::raw('MONTH(tanggal)'),'=',date('n'))
				->where(DB::raw('YEAR(tanggal)'),'=',date('Y'))
				->orderBy('nilai','DESC')
				->with('vendor_data')
				->take(5)
				->get();
		$view = View::make('dashboard',array(
			//donut chart
			'pelatihan'=>$pelatihan,
			'catering'=>$catering,
			'hotel'=>$hotel,
			//count
			'count_pelatihan'=>$count_pelatihan,
			'count_catering'=>$count_catering,
			'count_hotel'=>$count_hotel,
			//top vendor
			'top_pelatihan'=>$top_pelatihan,
			'top_catering'=>$top_catering,
			'top_hotel'=>$top_hotel
			));

		if(Request::ajax()){
		$section = $view->renderSections();
		return $section['content'];
	}
	return $view;
	});




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
			$datas = $model::orderBy($type,'ASC')->paginate(33);
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
			$view = View::make('monitoring.data_pegawai',array(
				'pegawai'=>$pegawai
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
				}
			return $view;
		});
		Route::get('/add_data_pegawai',function(){
			$grades = Pegawai_grade::lists('grade','id');
			$titles = Pegawai_title::lists('title','id');
			$jobs = Pegawai_job::lists('job','id');
			$units = Pegawai_unit::lists('unit','id');
			$penempatans = Pegawai_penempatan::lists('penempatan','id');
			$jeniss = Pegawai_jenis::lists('jenis','id');
			$view = View::make('monitoring.merge_data_pegawai',array(
				'url'=>'/add_data_pegawai',
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
			$pelatihans = Pelatihan_data::orderBy('updated_at','DESC')->paginate(21);
			$view = View::make('monitoring.pelatihan',array(
				'pelatihans'=>$pelatihans
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});
		Route::get('/pelatihan/{id}',function($id){
			$pelatihan = Pelatihan_pelatihan::find($id);
			$count = Pelatihan_data::where('id_pelatihan','=',$id)->count();
			$pelatihans = Pelatihan_data::where('id_pelatihan','=',$id)->orderBy('updated_at','DESC')->paginate(21);
			$view = View::make('monitoring.pelatihan_data',array(
				'count'=>$count,
				'id'=>$id,
				'pelatihan'=>$pelatihan,
				'pelatihans'=>$pelatihans
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});
		Route::get('/excel_pelatihan_data/{id_pelatihan}',function($id_pelatihan){
			$pelatihans = Pelatihan_data::where('id_pelatihan','=',$id_pelatihan)->orderBy('updated_at','DESC')->get();
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
			$view = View::make('monitoring.pengaturan_data_pelatihan',array(
				'pelatihans'=>$pelatihans
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
				}
			return $view;
		});
		Route::get('/add_pengaturan_data_pelatihan',function(){
			$view = View::make('monitoring.merge_pengaturan_data_pelatihan',array(
				'url'=>'/add_pengaturan_data_pelatihan',
				'button'=>'Tambah'
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
				}
			return $view;
		});
		Route::post('/add_pengaturan_data_pelatihan','MonitoringController@pengaturan_data_pelatihan');
		Route::get('/edit_pengaturan_data_pelatihan/{id}',function($id){
			$data = Pelatihan_pelatihan::find($id);
			if(!count($data)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			$view = View::make('monitoring.merge_pengaturan_data_pelatihan',array(
				'data'=>$data,
				'url'=>'/edit_pengaturan_data_pelatihan',
				'button'=>'Ubah'
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
				}
			return $view;
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
			$pelatihans = Pelatihan_data::where('id_pegawai','=',$id_pegawai)->orderBy('updated_at','DESC')->paginate(21);
			$view = View::make('monitoring.data_pelatihan',array(
				'id_pegawai'=>$id_pegawai,
				'pegawai'=>$pegawai,
				'pelatihans'=>$pelatihans
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});
		Route::get('/add_data_pelatihan/{id_pegawai}',function($id_pegawai){
			$pegawai = Pegawai_data::find($id_pegawai);
			if(!count($pegawai)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			$pelatihans = Pelatihan_pelatihan::lists('pelatihan','id');
			$view = View::make('monitoring.merge_data_pelatihan',array(
				'url'=>'/add_data_pelatihan',
				'id_pegawai'=>$id_pegawai,
				'pegawai'=>$pegawai,
				'pelatihans'=>$pelatihans,
				'button'=>'Tambah'
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
				}
			return $view;
		});
		Route::post('/add_data_pelatihan','MonitoringController@add_data_pelatihan');
		Route::get('/edit_data_pelatihan/{id}',function($id){
			$data = Pelatihan_data::find($id);
			if(!count($data)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			$pegawai = Pegawai_data::find($data->id_pegawai);
			$pelatihans = Pelatihan_pelatihan::lists('pelatihan','id');
			$view = View::make('monitoring.merge_data_pelatihan',array(
				'pelatihans'=>$pelatihans,
				'data'=>$data,
				'pegawai'=>$pegawai,
				'url'=>'/edit_data_pelatihan',
				'button'=>'ubah'
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
				}
			return $view;
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
		| Data pelatihan belum mengikuti
		|---------------------------------------------------------------------
		*/
		Route::get('/belum_pelatihan/{id_pelatihan}/data',function($id_pelatihan){
			$pelatihan = Pelatihan_pelatihan::find($id_pelatihan);
			$GLOBALS['pelatihan'] = $pelatihan;
			if(!count($pelatihan)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			$pegawais = Pegawai_data::whereHas('pelatihans',function($q){
				$q->where('id_pelatihan','=',659)->where('id','=',14758);
			})->paginate(10);
			$view = View::make('pelatihan.belum',array(
				'pelatihan'=>$pelatihan,
				'pegawais'=>$pegawais
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});
		Route::get('/belum_pelatihan/{id_pelatihan}/search',function($id_pelatihan){
			$pelatihan = Pelatihan_pelatihan::find($id_pelatihan);
			if(!count($pelatihan)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			if(Input::get('type') == 'nama' || Input::get('type') == 'nip'){
				$pegawais = Pelatihan_data::whereHas('pegawai',function($q){
					$q->where(Input::get('type'),'LIKE','%'.Input::get('q').'%');
				})
				->groupBy('id_pegawai')
				->where('id_pelatihan','!=',$id_pelatihan)
				->paginate(10);
			}else{
				$pegawais = Pelatihan_data::whereHas('pegawai',function($q){
					$q->whereHas(Input::get('type'),function($q){
						$q->where(Input::get('type'),'LIKE','%'.Input::get('q').'%');
					});
				})
				->groupBy('id_pegawai')
				->where('id_pelatihan','!=',$id_pelatihan)
				->paginate(10);
			}
			$view = View::make('pelatihan.belum',array(
				'pelatihan'=>$pelatihan,
				'pegawais'=>$pegawais
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});

		/*--------------------------------------------------------------------
		| Data Vendor
		|---------------------------------------------------------------------
		*/
		Route::get('/vendor/search','VendorController@search');
		Route::get('/vendor',function(){
			$average = Vendor_kegiatan::avg('nilai');
			$vendors = Vendor_data::orderBy('updated_at','DESC')->paginate(17);
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
			$view = View::make('monitoring.vendor.merge_data_vendor',array(
				'url'=>'/vendor/add',
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
			$data = Vendor_data::find($id);
			if(!count($data)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			$view = View::make('monitoring.vendor.merge_data_vendor',array(
				'url'=>'/vendor/edit',
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
			| Top Vendor
			|---------------------------------------------------------------------
			*/
			Route::get('/vendor/top',function(){
				$input = Input::all();
				$datas = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=',Input::get('jenis'));	
				})
				->where(DB::raw('MONTH(tanggal)'),'=',$input['bulan'])
				->where(DB::raw('YEAR(tanggal)'),'=',$input['tahun'])
				->orderBy('nilai','DESC')
				->with('vendor_data')
				->get();
				if($input['jenis'] == 'pelatihan'){
					$glyph = 'fa fa-book';
				}else if($input['jenis'] == 'catering'){
					$glyph = 'glyphicon glyphicon-cutlery';
				}else{
					$glyph = 'fa fa-building';
				}
				$bulan = DateTime::createFromFormat('!m',$input['bulan']);
				$view = View::make('vendor.top',array(
					'datas'=>$datas,
					'glyph'=>$glyph,
					'top'=>'Daftar kegiatan Vendor '.ucfirst($input['jenis']).' bulan '.$bulan->format('F').' '.$input['tahun']
					));
				if(Request::ajax()){
					$section = $view->renderSections();
					return $section['content'];
				}
				return $view;
			});

			/*--------------------------------------------------------------------
			| Top Vendor Excel
			|---------------------------------------------------------------------
			*/
			Route::get('/vendor/top/excel',function(){
				$input = Input::all();
				$datas = Vendor_kegiatan::whereHas('vendor_data',function($q){
					$q->where('jenis','=',Input::get('jenis'));	
				})
				->where(DB::raw('MONTH(tanggal)'),'=',$input['bulan'])
				->where(DB::raw('YEAR(tanggal)'),'=',$input['tahun'])
				->orderBy('nilai','DESC')
				->with('vendor_data')
				->get();
				$bulan = DateTime::createFromFormat('!m',$input['bulan']);
				return View::make('vendor.top_excel',array(
					'datas'=>$datas,
					'top'=>'Vendor '.ucfirst($input['jenis']).' Terbaik '.$bulan->format('F').' '.$input['tahun']
					));
				});
			

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
				$vendors = Vendor_data::where('jenis','=','pelatihan')->orderBy('updated_at','DESC')->paginate(17);
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
				$vendors = Vendor_data::where('jenis','=','catering')->orderBy('updated_at','DESC')->paginate(17);
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
				$vendors = Vendor_data::where('jenis','=','hotel')->orderBy('updated_at','DESC')->paginate(17);
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
			$average = Vendor_kegiatan::where('id_vendor','=',$id)->avg('nilai');
			$kegiatans = Vendor_kegiatan::where('id_vendor','=',$id)->orderBy('tanggal','DESC')->paginate(11);
			$total = Vendor_kegiatan::where('id_vendor','=',$id)->count();
			if($vendor->jenis == 'pelatihan'){
				$jenis =  'fa fa-book';
			}elseif($vendor->jenis == 'catering'){
				$jenis = 'glyphicon glyphicon-cutlery';
			}else{
				$jenis = 'fa fa-building';
			}
			$view = View::make('monitoring.vendor.data_vendor_kegiatan',array(
				'id'=>$id,
				'vendor'=>$vendor,
				'average'=>$average,
				'jenis'=>$jenis,
				'total'=>$total,
				'kegiatans'=>$kegiatans
				));
			if(Request::ajax()){
				$section = $view->renderSections();
				return $section['content'];
			}
			return $view;
		});
		Route::get('/vendor/data/{id_vendor}/excel',function($id_vendor){
			$vendor = Vendor_data::find($id_vendor);
			$kegiatans = Vendor_kegiatan::where('id_vendor','=',$id_vendor)->get();
			return View::make('vendor.excel_kegiatan',array(
				'vendor'=>$vendor,
				'kegiatans'=>$kegiatans
				));
		});
		Route::get('/vendor/data/{id_vendor}/add',function($id_vendor){
			$vendor = Vendor_data::where('id','=',$id_vendor)->first();
			if(!count($vendor)>0){
				App::abort(404,'Halaman tidak di temukan');
			}
			if($vendor->jenis == 'pelatihan'){
				$jenis =  'fa fa-book';
			}elseif($vendor->jenis == 'catering'){
				$jenis = 'glyphicon glyphicon-cutlery';
			}else{
				$jenis = 'fa fa-building';
			}
			$view = View::make('monitoring.vendor.merge_data_vendor_kegiatan',array(
				'url'=>'/vendor/data/add',
				'id_vendor'=>$id_vendor,
				'jenis'=>$jenis,
				'vendor'=>$vendor,
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
			$vendor = Vendor_data::where('id','=',$id_vendor)->first();
			$kegiatan = Vendor_kegiatan::find($id);
			if(!count($vendor) > 0 || !(count($kegiatan) > 0)){
				App::abort(404,'Halaman tidak di temukan');
			}
			if($vendor->jenis == 'pelatihan'){
				$jenis =  'fa fa-book';
			}elseif($vendor->jenis == 'catering'){
				$jenis = 'glyphicon glyphicon-cutlery';
			}else{
				$jenis = 'fa fa-building';
			}
			$view = View::make('monitoring.vendor.merge_data_vendor_kegiatan',array(
				'url'=>'/vendor/data/edit',
				'id_vendor'=>$id_vendor,
				'data'=>$kegiatan,
				'jenis'=>$jenis,
				'vendor'=>$vendor,
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
			$user = User::where('username','=','admin')->first();
			$user->password = Hash::make('admin');
			$user->save();
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
