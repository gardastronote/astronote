<?php
class Pegawai_jenis extends Eloquent
{
	protected $table = 'pegawai_jenis';
	public $timestamps = false;
	protected $fillable = array('jenis');
	public function data(){
		return $this->belongsTo('Pegawai_data','id_jenis','id');
	}
	public static function rules(){
		return array(
			'jenis'=>'required|unique:pegawai_jenis,jenis'
			);
	}
	public static function messages(){
		return array(
			'required'=>ucfirst(':attribute harus di isi'),
			'unique'=>ucfirst(':attribute sudah di gunakan')
			);
	}
}
?>