<?php
class Gangguan_Controller extends Controller{
	private $kode;
	private $nama;
	private $deskripsi;

	public function __construct() {
		parent::__construct();
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		$this->Load_Model('Gangguan');
		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render('admin/common/header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render('admin/common/footer',false));
	}

	public function index() {
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
		logs('Privileges:' . $this->privileges);
		$page = isset($_GET['page'])?$_GET['page']:'';
		if(!isset($_POST['kode'])){
			$data = $this->model->getLast(['kode']);
			$num = (integer)(substr($data->kode, 1));
			$num = 'P'.substr((100 + $num + 1),1);
			logs($num);
			$this->kode = $num;
		}

		logs('Masuk Gangguan` Controller');
		$this->Load_View('admin/master/gangguan');
		$datas = $this->model->all($page);

		$diagnosa = new Diagnosa_Model;
		$this->view->Assign('diagnosa',$diagnosa->all()->data);
		$this->Assign('datas',$datas->data);
		$this->view->Assign('kode',$this->kode);
		$this->view->Assign('first','?url='.$this->privileges.'gangguan&page='.$datas->firstpage);
		$this->view->Assign('prev','?url='.$this->privileges.'gangguan&page='.$datas->prevpage);
		$this->view->Assign('next','?url='.$this->privileges.'gangguan&page='.$datas->nextpage);
		$this->view->Assign('end','?url='.$this->privileges.'gangguan&page='.$datas->lastpage);
	}

	public function add(){
		if(!empty($_POST)){
			$this->kode = $_POST['kode'];
			$this->nama = $_POST['nama'];
			$this->deskripsi = $_POST['deskripsi'];
		}
		$result = $this->model->add($this->kode,$this->nama,$this->deskripsi);
		$this->nama = '';
		$this->deskripsi = '';
		redirect(SITE_ROOT,'admin/gangguan');
	}

	public function remove($id){
		$this->model->remove($id);
		return $this->index();
	}

}