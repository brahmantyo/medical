<?php
class Konsultasi_Controller extends Controller{
	private $error;
	private $page;
	private $respons;
	
	private $kode;
	private $deskripsi;

	public function __construct() {
		parent::__construct();
		// $this->Load_Model('Konsultasi');
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
		$this->page = isset($_GET['page'])?$_GET['page']:'';
	}

	public function index() {
		logs('Privileges:' . $this->privileges);
		logs('Masuk Konsultasi Controller');
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		if(!isset($_POST)){
			$data = $this->model->getLast(['idKonsultasi']);
			$num = (integer)(substr($data->idKonsultasi, 1));
			$num = 'P'.substr((100 + $num + 1),1);
			logs($num);
			$this->kode = $num;
		}
		$this->Load_View($this->privileges.'master/konsultasi');
		$this->view->Assign('error',$this->error);
		$this->view->Assign('kode',$this->kode);
		$this->view->Assign('deskripsi',$this->deskripsi);
		$this->view->Assign('respons',$this->respons);

		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render('header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render('footer',false));

		// $datas = $this->model->all($this->page);
		// $this->Assign('datas',$datas->data);

		// $this->view->Assign('first','?url='.$this->privileges.'konsultasi&page='.$datas->firstpage);
		// $this->view->Assign('prev','?url='.$this->privileges.'konsultasi&page='.$datas->prevpage);
		// $this->view->Assign('next','?url='.$this->privileges.'konsultasi&page='.$datas->nextpage);
		// $this->view->Assign('end','?url='.$this->privileges.'konsultasi&page='.$datas->lastpage);
	}

	public function add(){
		$status = '';
		if(!empty($_POST)){
			$this->kode = $_POST['kode'];
			$this->deskripsi = $_POST['deskripsi'];
		}
		try{
			if(isset($this->deskripsi)&&$this->deskripsi==''){
				throw new Exception("Pertanyaan Konsultasi belum terisi");
			}

			$result = $this->model->add(
				$this->kode,
				$this->deskripsi
			);
			logs('Kosongkan fields');
			$this->deskripsi = '';
			redirect(SITE_ROOT,$this->privileges.'Konsultasi');
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

	public function view($id){
		$Konsultasi = $this->model->getById($id);
		$this->view->Assign('d',$Konsultasi);
		$this->Load_Model('Respons');
		$this->respons = $this->model->allById($id,$this->page);
		$this->view->Assign('resfirst','?url='.$this->privileges.'Konsultasi/view/'.$id.'&page='.$this->respons->firstpage);
		$this->view->Assign('resprev','?url='.$this->privileges.'Konsultasi/view/'.$id.'&page='.$this->respons->prevpage);
		$this->view->Assign('resnext','?url='.$this->privileges.'Konsultasi/view/'.$id.'&page='.$this->respons->nextpage);
		$this->view->Assign('resend','?url='.$this->privileges.'Konsultasi/view/'.$id.'&page='.$this->respons->lastpage);

		$this->page=null;
		$this->Load_Model('Konsultasi');
		return $this->index();
	}

}