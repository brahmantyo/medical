<?php
class Gejala_Controller extends Controller{
	private $error;
	private $succes;
	private $state;

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
		if($this->state=='add'||$this->state==''){
			$data = $this->model->getLast(['kode']);
			logs($data->kode);
			$num = (integer) substr($data->kode,1);
			$num = 'G'.substr((100 + $num + 1),1);
			logs($num);
			$this->kode = $num;
			$this->state = 'add';
		}

		logs('Masuk Gejala Controller');
		$this->Load_View('admin/master/gejala');
		$datas = $this->model->all($page);
		$this->view->Assign('error',$this->error);
		$this->view->Assign('succes',$this->succes);
		$this->view->Assign('state',$this->state);
		$this->view->Assign('kode',$this->kode);
		$this->view->Assign('nama',$this->nama);
		$this->view->Assign('konteks',$this->konteks);
		$this->view->Assign('deskripsi',$this->deskripsi);
		$this->view->Assign('iddiagnosa',$this->diagnosa);




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
		logs('tambah gejala');
		$this->state = 'add';
		if(!empty($_POST)){
			$this->kode = $_POST['kode'];
			$this->nama = $_POST['nama'];
			$this->konteks = $_POST['konteks'];
			$this->deskripsi = $_POST['deskripsi'];
			$this->diagnosa = $_POST['diagnosa'];
		}
		try{
			if(isset($this->nama)&&$this->nama==''){
				throw new Exception("Nama Gejala belum terisi");
			}
			if(isset($this->diagnosa)&&$this->diagnosa==''){
				throw new Exception("Pertanyaan Diagnosa belum dipilih");
			}
			$result = $this->model->add($this->kode,$this->nama,$this->konteks,$this->deskripsi,$this->diagnosa);
			logs('Kosongkan fields');
			$this->kode = '';
			$this->nama = '';
			$this->konteks = '';
			$this->deskripsi = '';
			$this->diagnosa = '';
			$this->succes = 'Input Gejala is Success';
			// redirect(SITE_ROOT,$this->privileges.'gejala');
		} catch(Exception $e){
			logs($e->getMessage());
			$this->error = $e->getMessage();
		}
		$this->index();
	}

	public function edit($id){
			logs('Edit Gejala');
			if(isset($_POST['state'])&&$_POST['state']=='edit'){
				$this->editSave();
			} else {
				$this->state = 'edit';
				$gejala = $this->model->getById($id);
				// var_dump($gejala);
				$this->kode = $gejala->kode;
				$this->nama = $gejala->nmgejala;
				$this->konteks = $gejala->konteks;
				$this->deskripsi = $gejala->deskripsi;
				$this->diagnosa = $gejala->iddiagnosa;
			}
			$this->index();
	}
	private function editSave(){
		$kode = 0;
		logs('update gejala');
		if(!empty($_POST)){
			$this->kode = $_POST['kode'];
			$this->nama = $_POST['nama'];
			$this->konteks = $_POST['konteks'];
			$this->deskripsi = $_POST['deskripsi'];
			$this->diagnosa = $_POST['diagnosa'];
		}
			try{
			if(isset($this->nama)&&$this->nama==''){
				throw new Exception("Nama Gejala belum terisi");
			}
			if(isset($this->diagnosa)&&$this->diagnosa==''){
				throw new Exception("Pertanyaan Diagnosa belum dipilih");
			}
			$result = $this->model->edit($this->kode,$this->nama,$this->konteks,$this->deskripsi,$this->diagnosa);
			logs('Kosongkan fields');
			$this->state = '';
			$this->kode = '';
			$this->nama = '';
			$this->konteks = '';
			$this->deskripsi = '';
			$this->diagnosa = '';
			$this->succes = 'Edit Gejala is Success';
			// redirect(SITE_ROOT,$this->privileges.'gejala');
		} catch(Exception $e){
			logs($e->getMessage());
			$this->error = $e->getMessage();
		}
		$this->index();
	}

	public function remove($id){
		$this->model->remove($id);
		return $this->index();
	}

}