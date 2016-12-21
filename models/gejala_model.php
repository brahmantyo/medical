<?php
/**
* 
*/
class Gejala_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Gejala Model');
		$this->tbname = 'tbgejala';
	}
	
	public function all($page=null)
	{
		if($page=='nopage'){
			return $this->_db->Exec("SELECT * FROM tbgejala");
		}
		$sql = "SELECT tbgejala.*,tbdiagnosa.pertanyaan FROM tbgejala LEFT JOIN tbdiagnosa ON tbgejala.id = tbdiagnosa.iddiagnosa ORDER BY tbgejala.id DESC";
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,$page,$sql);
	}

	public function getById($id)
	{
		return $this->_db->getById($id,$this->tbname);
	}
	public function getByName($name)
	{
		return $this->_db->getByName($name,$this->tbname);
	}

	public function add($kode,$nama,$konteks,$deskripsi)
	{
		$data = [
			'kode' => $kode,
			'nmgejala' => $nama,
			'konteks' => $konteks,
			'deskripsi' => $deskripsi,
			'created' => date('Y-m-d H:i:s')
		];
		
		$type = [
			'kode' => 'char',
			'nmgejala' => 'char',
			'konteks' => 'char',
			'deskripsi' => 'char',
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
		return $this->_db->remove($id,$this->tbname,'id');
	}

	public function getDiagnosa()
	{
		return ;
		# code...
	}

}
