
<?php
// class Model {

// 	public function __construct(){
// 		logs('Load ' . get_called_class() . ' Class From [' . __CLASS__ . '] Class');

// 	}
// }
abstract class Model
{
	protected $_db;
	public function __construct(Database $db)
	{
		$this->_db = $db;
	}
}
