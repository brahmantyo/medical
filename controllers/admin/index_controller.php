<?php
class Index_Controller extends Controller{

	public function __construct() {
		parent::__construct();
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render('admin/common/header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render('admin/common/footer',false));
	}

	public function index() {
		logs('Masuk Admin Controller');
		$this->Load_View('admin/common/index');
		// $this->view->Set_CSS('');
		// $this->view->Set_Site_Title('Sistem Analisa Penyakit');
		// $this->view->Set_Meta_Keywords('sistem pakar.analisa,kesehatan');
		$this->Assign('welcome','<center>Selamat Datang di Admin Panel <b>'.APP_NAME.'</b></center>');	

	}

	public function about($data) {
		$this->Load_View('about');
		$this->Assign('heading','Tentang ' . APP_NAME);
		$this->Assign('content',' Selamat datang di '.APP_NAME);
	}

}