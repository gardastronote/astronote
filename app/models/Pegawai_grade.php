<?php
class Pegawai_grade extends Eloquent
{
	protected $table = 'pegawai_grade';
	public $timestamps = false;
	protected $fillable = array('grade');
	public function data(){
		return $this->hasMany('Pegawai_data','id_grade','id');
	}

	public static function rules(){
		return array(
			'grade'=>'required|unique:pegawai_grade,grade'
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