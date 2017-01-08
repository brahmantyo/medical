<?php
class Solusi_Controller extends Controller{
	private $error;
	private $page;
	private $respons;
	
	private $kode;
	private $deskripsi;

	public function __construct() {
		parent::__construct();
		$this->Load_Model('Solusi');
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
	}

	public function index() {
		logs('Privileges:' . $this->privileges);
		logs('Masuk Diagnosa Controller');
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}

		$this->page = isset($_GET['page'])?$_GET['page']:1;
		$this->Load_View($this->privileges.'master/solusi');
		$this->view->Assign('error',$this->error);
		$this->view->Assign('page',$this->page);
		$this->view->Assign('kode',$this->kode);


		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render($this->privileges.'common/header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render($this->privileges.'common/footer',false));

	}

	public function upload(){

	}
}