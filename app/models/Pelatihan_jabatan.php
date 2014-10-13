<?php
class Pelatihan_jabatan extends Eloquent
{
	protected $table = 'pelatihan_jabatan';
	public $timestamps = false;
	protected $fillable = array('jabatan');

	public static function rules($id = null){
		return array(
			'jabatan'=>'required|unique:pelatihan_jabatan,jabatan,'.$id
			);
	}
	public static function messages(){
		return array(
			'unique'=>':attribute sudah di gunakan',
			'required'=>':attribute harus di isi'
			);
	}

	public function data(){
		return $this->belongsTo('pelatihan_data','id_jabatan','id');
	}
}
?>