<?php
class Pegawai_penempatan extends Eloquent
{
	protected $table = 'pegawai_penempatan';
	public $timestamps = false;
	protected $fillable = array('penempatan');
	public function data(){
		return $this->belongsTo('Pegawai_data','id_penempatan','id');
	}

	public static function rules(){
		return array(
			'penempatan'=>'required|unique:pegawai_penempatan,penempatan'
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