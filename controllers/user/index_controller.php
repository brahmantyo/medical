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
		$this->Assign('header',$header->Render('header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render('footer',false));
	}

	public function index() {
		logs('Masuk User Controller');
		$this->Load_View('index');
		// $this->view->Set_CSS('');
		// $this->view->Set_Site_Title('Sistem Analisa Penyakit');
		// $this->view->Set_Meta_Keywords('sistem pakar.analisa,kesehatan');	

	}

	public function about($data) {
		$this->Load_View('about');
		$this->Assign('heading','Tentang ' . APP_NAME);
		$this->Assign('content',' Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.

			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.

			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.

			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.

			');
	}

}