<?php
class Gejala_Controller extends Controller{
	private $kode;
	private $nama;
	private $konteks;
	private $deskripsi;
	private $diagnosa;

	public function __construct() {
		parent::__construct();
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		$this->Load_Model('Gejala');
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
			logs($data->kode);
			$num = (integer) substr($data->kode,1);
			$num = 'G'.substr((100 + $num + 1),1);
			logs($num);
			$this->kode = $num;
		}

		logs('Masuk Gejala Controller');
		$this->Load_View('admin/master/gejala');
		$datas = $this->model->all($page);

		$diagnosa = new Diagnosa_Model;
		$this->view->Assign('diagnosa',$diagnosa->all('nopage'));
		$this->view->Assign('kode',$this->kode);
		$this->Assign('datas',$datas->data);
		$this->view->Assign('first','?url='.$this->privileges.'gejala&page='.$datas->firstpage);
		$this->view->Assign('prev','?url='.$this->privileges.'gejala&page='.$datas->prevpage);
		$this->view->Assign('next','?url='.$this->privileges.'gejala&page='.$datas->nextpage);
		$this->view->Assign('end','?url='.$this->privileges.'gejala&page='.$datas->lastpage);
	}

	public function add(){
		if(!empty($_POST)){
			$this->kode = $_POST['kode'];
			$this->nama = $_POST['nama'];
			$this->konteks = $_POST['konteks'];
			$this->deskripsi = $_POST['deskripsi'];
			$this->diagnosa = $_POST['diagnosa'];
		}
		$result = $this->model->add($this->kode,$this->nama,$this->konteks,$this->deskripsi,$this->diagnosa);
		$this->kode = '';
		$this->nama = '';
		$this->konteks = '';
		$this->deskripsi = '';
		$this->diagnosa = '';
		redirect(SITE_ROOT,'admin/gejala');
	}

	public function remove($id){
		$this->model->remove($id);
		return $this->index();
	}

}