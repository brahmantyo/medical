<?php
/**
* 
*/
class Konsultasi_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Konsultasi Model');
		$this->tbname = 'tbkonsultasi';
	}
	
	public function all($page=null)
	{
		// if($page=='nopage'){
		// 	return $this->_db->Exec("SELECT * FROM $this->tbname");
		// }
		// $sql = "SELECT tbgejala.*,tbdiagnosa.pertanyaan FROM tbgejala LEFT JOIN tbdiagnosa ON tbgejala.id = tbdiagnosa.iddiagnosa ORDER BY tbgejala.id DESC";
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,$page,$sql);
	}

	public function getById($id)
	{
		return $this->_db->getById($id,$this->tbname);
	}

	public function getData()
	{
		// return $this->_db->
	}

	public function add($idpasien,$iddokter=null,$kdpenyakit=null)
	{
		$data = [
			'tglkonsultasi' => date('Y-m-d'),
			'idpasien' => $idpasien,
			'iddokter' => $iddokter,
			'kdpenyakit' => $kdpenyakit,
			'created' => date('Y-m-d H:i:s')
		];
		
		$type = [
			'tglkonsultasi' => 'char',
			'idpasien' => 'int',
			'iddokter' => 'int',
			'kdpenyakit' => 'char',
			'created' => 'char'
		];
		return $this->_db->create($this->tbname,$data,$type);
	}

	public function adddetail()
	{
		return $this->_db->create($this->tbname,$data,$type);
	}

	public function getLast($fields=null)
	{
		return $this->_db->getLast($this->tbname,$fields);
	}
	public function remove($id)
	{
		return $this->_db->remove($id,$this->tbname,'id');
	}

}
