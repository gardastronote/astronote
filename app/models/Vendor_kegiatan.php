<?php
class Vendor_kegiatan extends Eloquent
{
	protected $table = 'vendor_kegiatan';
	protected $fillable = array('id_vendor','kegiatan','nilai','tanggal');

	public static function rules(){
		return array(
			'id_vendor'=>'required|numeric',
			'kegiatan'=>'required',
			'nilai'=>'required|numeric|max:5',
			'tanggal'=>'required|date_format:Y-m-d'
			);
	}

	public static function messages(){
		return array(
			'required'=>':attribute harus di isi',
			'max'=>':attribute terlalu besar',
			'numeric'=>':attribute harus berupa angka',
			'date_format'=>'Tanggal yang di masukan tidak benar'
			);
	}

	public function vendor_data(){
		return $this->belongsTo('Vendor_data','id_vendor','id');
	}
}
?>