<?php
/**
* 
*/
class Rule_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Rule Model');
		$this->tbname = 'tbrule';
	}

	public function all($page=null)
	{
		$sql = "SELECT tbrule.id,tbrule.kode as kdrule,tbrule.kdgejala,tbgejala.nmgejala as gejala,tbrule.kdgangguan,tbgangguan.nmgangguan as nmgangguan FROM tbrule".
				" INNER JOIN tbgangguan ON tbgangguan.kode = tbrule.kdgangguan".
				" INNER JOIN tbgejala ON tbgejala.kode = tbrule.kdgejala";
		if($page=='nopage'){
			$result['data'] = $this->_db->Exec($sql);
			return (Object)$result;
		}
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,0,$sql);
	}

	public function getById($id,$field='id',$options=null)
	{
		return $this->_db->getById($id,$this->tbname,$field,$options);
	}
	public function getByName($name)
	{
		return $this->_db->getByName($name,$this->tbname);
	}

	public function getLast($fields=null,$by=null)
	{
		return $this->_db->getLast($this->tbname,$fields,$by);
	}

	public function add($kode,$gejala,$gangguan)
	{
		$data = [
			'kode' => $kode,
			'kdgejala' => $gejala,
			'kdgangguan' => $gangguan,
			'created' => date('Y-m-d H:i:s')
			];
		$type = [
			'kode' => 'char',
			'kdgejala' => 'char',
			'kdgangguan' => 'char',
			'created' => 'char'
		];
		return $this->_db->create($this->tbname,$data,$type);
	}

	// public function update($kode,$gejala,$gangguan)
	// {
		// $this->remove($kode);
		// $this->add($kode,$gejala,$gangguan);
		// $data = [
		// 	'kode' => $kode,
		// 	'kdgejala' => $gejala,
		// 	'kdgangguan' => $gangguan,
		// 	// 'created' => date('Y-m-d H:i:s')
		// 	];
		// $type = [
		// 	'kode' => 'char',
		// 	'kdgejala' => 'char',
		// 	'kdgangguan' => 'char',
		// 	// 'created' => 'char'
		// ];
		// return $this->_db->update($this->tbname,$data,$type);		
	// }

	public function remove($id)
	{
		return $this->_db->remove($id,$this->tbname,'kode','char');
	}

}
