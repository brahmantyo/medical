<?php
class Ajax_Controller extends Controller{
	private $error;

	public function __construct() {
		parent::__construct();
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
	}

	public function index() {
		logs('Privileges:' . $this->privileges);
		logs('Masuk Ajax Controller');
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		echo 'testing ajax';
	}

	public function editRule($id){
		$rule = new Rule_Model;
		$data = $rule->getById('R01','kode',['limit'=>0]);
		$row = [];
		foreach ($data as $key => $value) {
			$row[] = $value;
		}
		echo json_encode($row);
	}
}