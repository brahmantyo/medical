<?php
/**
* 
*/
class Solusi_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load Solusi Model');
		$this->tbname = 'tbsolusi';
	}

	public function all($page=null,$order='desc')
	{
		if($page=='nopage'){
			return $this->_db->Exec("SELECT * FROM $this->tbname");
		}
		return $this->_db->getAll($this->tbname,PAGE_LENGTH,$page,$order,'idsolusi');
	}
}