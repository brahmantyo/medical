<?php
/**
* 
*/
class Users_Model extends Model
{
	private $tbname;
	
	function __construct()
	{
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		logs('Load User Model');
		$this->tbname = 'users';
	}

	public function all()
	{
		$data = "";
		$sql = "SELECT * FROM $this->tbname ";
		return $this->_db->Exec($sql,$data);
	}

	public function getUserByName($username)
	{
		return $this->_db->getById($username,$this->tbname,'username');
	}
	public function getUserByEmail($email)
	{
		return $this->_db->getById($email,$this->tbname,'email');
	}
	public function addUser($username,$email,$password,$address,$phone)
	{
		$data = [
			'username'=>$username,
			'email'=>$email,
			'password'=>md5($password),
			'address'=>$address,
			'phone'=>$phone,
			'created'=>date('Y-m-d H:i:s')
		];

		return $this->_db->create($this->tbname,$data);													
	}

	public function remove()
	{

	}

	public function getPrivileges($id){
		$sql = "SELECT groups.grpname FROM privileges inner join groups on privileges.idgroup = groups.idgroup WHERE privileges.username = '$id'";
		logs($sql);
		$result = $this->_db->getOne($sql);
		return $result->grpname;
	}
}
