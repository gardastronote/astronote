<?php
class Pegawai_unit extends Eloquent
{
	protected $table = 'pegawai_unit';
	public $timestamps = false;
	protected $fillable = array('unit');

	public function data(){
		return $this->belongsTo('Pegawai_data','id_unit','id');
	}
	public static function rules(){
		return array(
			'unit'=>'required|unique:pegawai_unit,unit'
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