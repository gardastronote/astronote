<?php
class Pegawai_data extends Eloquent
{
	protected $table = 'pegawai_data';
	protected $fillable = array(
		'nip',
		'nama',
		'id_grade',
		'id_jenis',
		'id_job',
		'id_penempatan',
		'id_unit',
		'id_title',
		'jkelamin'
		);

	public static function rules($id = null){
		return array(
			'nip'=>'required|unique:pegawai_data,nip,'.$id,
			'nama'=>'required|max:64',
			'id_grade'=>"required",
			'id_jenis'=>"required",
			'id_job'=>"required",
			'id_penempatan'=>"required",
			'id_unit'=>"required",
			'id_title'=>"required"
			);
	}

	public static function messages(){
		return array(
			'required'=>':attribute harus di isi',
			'max'=>':attribute terlalu panjang',
			'unique'=>':attribute sudah di gunakan',
			'in'=>'input data terjadi masalah'
			);
	}
	public function pelatihans(){
		return $this->hasMany('Pelatihan_data','id_pegawai','id');
	}

	public function grade(){
		return $this->belongsTo('Pegawai_grade','id_grade','id')->orderBy('id','DESC');
	}
	public function jenis(){
		return $this->belongsTo('Pegawai_jenis','id_jenis','id')->orderBy('id','DESC');
	}
	public function job(){
		return $this->belongsTo('Pegawai_job','id_job','id')->orderBy('id','DESC');
	}
	public function penempatan(){
		return $this->belongsTo('Pegawai_penempatan','id_penempatan','id')->orderBy('id','DESC');
	}
	public function title(){
		return $this->belongsTo('Pegawai_title','id_title','id')->orderBy('id','DESC');
	}
	public function unit(){
		return $this->belongsTo('Pegawai_unit','id_unit','id')->orderBy('id','DESC');
	}
}
?>