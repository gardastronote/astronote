<?php
class Pelatihan_data extends Eloquent
{
	protected $table = 'pelatihan_data';
	protected $fillable = array(
		'id_pegawai',
		'id_pelatihan',
		'tanggal',
		'lama',
		'tempat',
		'no_surat_penugasan',
		'lulus',
		'score'
		);

	public static function rules($id = null){
		return array(
			'id_pegawai'=>'required|numeric',
			'id_pelatihan'=>'required|numeric',
			'tanggal'=>'required',
			'lama'=>'required|numeric',
			);
	}

	public static function messages(){
		return array(
			'required'=>':attribute harus di isi',
			'numeric'=>':attribute harus berupa angka',
			'max'=>':attribute terlalu panjang'
			);
	}

	public function pegawai(){
		return $this->belongsTo('Pegawai_data','id_pegawai','id');
	}
	public function pelatihan(){
		return $this->belongsTo('Pelatihan_pelatihan','id_pelatihan','id');
	}
}
?>