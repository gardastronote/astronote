<?php
class Pegawai_job extends Eloquent
{
	protected $table = 'pegawai_job';
	public $timestamps = false;
	protected $fillable = array('job');
	public function data(){
		return $this->belongsTo('Pegawai_data','id_job','id');
	}
	public static function rules(){
		return array(
			'job'=>'required|unique:pegawai_job,job'
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