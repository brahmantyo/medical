<?php
/**
* 
*/
class Respon_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Respon Model');
		$this->tbname = 'tbrespon';
	}

	public function all($page=null,$order='desc')
	{
		if($page==0){
			return $this->_db->Exec("SELECT * FROM $this->tbname");
		}
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,$page,'desc','idrespon');
	}

	public function allById($id,$page=1,$pk='idrespon',$options=null)
	{
		if($page==''){
			$page=1;
		}
		$option['page'] = $page;
		if($options){
			foreach ($options as $key => $value) {
				if($key=='limit'){
					$option['limit'] = $value;
				}
			}
		}

		return $this->_db->getById($id,$this->tbname,$pk,$option);
	}

	public function getById($id)
	{
		return $this->_db->getById($id,$this->tbname,'idrespon',['limit'=>0]);
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
		return $this->_db->remove($id,$this->tbname,'iddiagnosa');
	}

}