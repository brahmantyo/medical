<?php
/**
* 
*/
class Db
{
    // Define connection as a static variable, to avoid connecting more than once 
	protected static $connection;
	private $host;
	private $user;
	private $password;
	private $db;
	
	function __construct()
	{
		$this->host 	= HOST;
		$this->user 	= USERNAME;
		$this->password = PASSWORD;
		$this->db 		= DB;
	}

    public function connect() {
        // Try and connect to the database, if a connection has not been established yet
    	if(!isset(self::$connection)) {
    		self::$connection = new mysqli_connect($this->host,$this->user,$this->password,$this->db);
    	}
        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            logs(mysqli_connect_error());
            return false;
        }
        return self::$connection;
    }

    // public function all() {
    // 	$connection = $this->connect();

    // 	$result = $connection->query('SELECT * FROM ');


    // }

}