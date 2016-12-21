<?php
/**
* 
*/
class Gangguan_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Gangguan Model');
		$this->tbname = 'tbgangguan';
	}

	public function all($page=null,$order='desc')
	{
		if($page=='nopage'){
			return $this->_db->Exec("SELECT * FROM tbgangguan");
		}
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,$page,$order,'idgangguan');
	}

	public function getById($id)
	{
		return $this->_db->getById($id,$this->tbname);
	}
	public function getByName($name)
	{
		return $this->_db->getByName($name,$this->tbname);
	}

	public function add($kode,$gangguan,$keterangan)
	{
		$data = [
			'kode' => $kode,
			'nmgangguan' => $gangguan,
			'descript' => $keterangan,
			'created' => date('Y-m-d H:i:s')
		];
		
		$type = [
			'kode' => 'char',
			'nmgangguan' => 'char',
			'descript' => 'char',
			'created' => 'char'
		];
		return $this->_db->create($this->tbname,$data,$type);
	}
	public function getLast($fields=null)
	{
		return $this->_db->getLast($this->tbname,$fields);
	}
	public function remove($id)
	{
		return $this->_db->remove($id,$this->tbname,'idgangguan');
	}

}
