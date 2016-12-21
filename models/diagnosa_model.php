<?php
/**
* 
*/
class Diagnosa_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Diagnosa Model');
		$this->tbname = 'tbdiagnosa';
	}

	public function all($page=null,$order='desc')
	{
		if($page=='nopage'){
			return $this->_db->Exec("SELECT * FROM $this->tbname");
		}
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,$page,$order,'iddiagnosa');
	}

	public function getById($id)
	{
		return $this->_db->getById($id,$this->tbname,'iddiagnosa');
	}
	public function getByName($name)
	{
		return $this->_db->getByName($name,$this->tbname);
	}

	public function getLast($fields=null)
	{
		return $this->_db->getLast($this->tbname,$fields);
	}

	public function add($kode,$deskripsi)
	{
		$data = [
			'iddiagnosa' => $kode,
			'pertanyaan' => $deskripsi,
			'created' => date('Y-m-d H:i:s')
			];
		$type = [
			'iddiagnosa' => 'char',
			'pertanyaan' => 'char',
			'created' => 'char'
		];
		return $this->_db->create($this->tbname,$data,$type);
	}

	public function remove($id)
	{
		$respon = new Respon_Model;
		$drespon = $respon->allById($id,'tbrespon','iddiagnosa',['limit'=>0]);
		if($drespon->num_rows > 0){ return $drespon->num_rows;}
		return $this->_db->remove($id,$this->tbname,'iddiagnosa','char');
	}

	public function getDetail($id,$detail){
		$objname = $detail.'_Model';
		$relation = new $objname;
		return $relation->allById($id,null,'iddiagnosa',['limit'=>0]);
	}

}
