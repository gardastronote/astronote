<?php
class Pegawai_title extends Eloquent
{
	protected $table = 'pegawai_title';
	public $timestamps = false;
	protected $fillable = array('title');
	
	public function data(){
		return $this->belongsTo('Pegawai_data','id_title','id');
	}
	public static function rules(){
		return array(
			'title'=>'required|unique:pegawai_title,title'
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