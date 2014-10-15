<?php
class Vendor_data extends Eloquent
{
	protected $table = 'vendor_data';
	protected $fillable = array('nama','jenis');

	public static function rules($id = NULL){
		return array(
			'nama'=>'required|unique:vendor_data,nama,'.$id,
			'jenis'=>'required'
			);
	}

	public static function messages(){
		return array(
			'required'=>':attribute harus di isi',
			'unique'=>':attribute sudah di gunakan'
			);
	}

	public function kegiatan(){
		return $this->hasMany('Vendor_kegiatan','id_vendor','id');
	}
}
?>