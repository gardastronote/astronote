<?php
class Pelatihan_pelatihan extends Eloquent
{
	protected $table = 'pelatihan_pelatihan';
	public $timestamps = false;
	protected $fillable = array('pelatihan');

	public static function rules($id = null){
		return array(
			'pelatihan'=>'required|unique:pelatihan_pelatihan,pelatihan,'.$id
			);
	}
	public static function messages(){
		return array(
			'unique'=>':attribute sudah di gunakan',
			'required'=>':attribute harus di isi'
			);
	}
	public function data(){
		return $this->belongsTo('pelatihan_data','id_pelatihan','id');
	}
}
?>