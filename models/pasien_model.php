<?php
/**
* 
*/
class Pasien_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Pasien Model');
		$this->tbname = 'tbpasien';
	}

	public function all($page=null)
	{
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,$page);
	}

	public function getById($id)
	{
		return $this->_db->getById($id,$this->tbname);
	}
	public function getByName($name)
	{
		return $this->_db->getByName($name,$this->tbname);
	}

	public function add($nama,$usia,$berat,$tinggi,$alamat,$phone,$kelamin,$menikah)
	{
		$data = [
			'nmpasien' => $nama,
			'usia' => $usia,
			'kelamin' => $kelamin,
			'berat' => $berat,
			'tinggi' => $tinggi,
			'menikah' => $menikah,
			'alamat' => $alamat,
			'phone' => $phone,
			'created' => date('Y-m-d H:i:s')
			];
		$type = [
			'nmpasien' => 'char',
			'usia' => 'int',
			'kelamin' => 'char',
			'berat' => 'int',
			'tinggi' => 'int',
			'menikah' => 'char',
			'alamat' => 'char',
			'phone' => 'char',
			'created' => 'char'
		];
		return $this->_db->create($this->tbname,$data,$type);
	}

	public function remove($id)
	{
		return $this->_db->remove($id,$this->tbname,'idpasien');
	}

}
