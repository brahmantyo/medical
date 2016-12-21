<?php
class Respon_Controller extends Controller{
	private $error;
	private $page;
	private $respons;
	
	private $kode;
	private $deskripsi;

	public function __construct() {
		parent::__construct();
		$this->Load_Model('Respon');
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
		$this->page = isset($_GET['page'])?$_GET['page']:'';
	}

	public function index() {
		logs('Privileges:' . $this->privileges);
		logs('Masuk Respon Controller');
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		if(!isset($_POST['kode'])){
			$data = $this->model->getLast(['idrespon']);
			$num = (integer)(substr($data->idrespon, 1));
			$num = 'P'.substr((100 + $num + 1),1);
			logs($num);
			$this->kode = $num;
		}

		$this->Load_View($this->privileges.'master/respon');
		$this->view->Assign('error',$this->error);
		$this->view->Assign('kode',$this->kode);
		$this->view->Assign('deskripsi',$this->deskripsi);
		$this->view->Assign('respons',$this->respons);

		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render($this->privileges.'common/header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render($this->privileges.'common/footer',false));
		
		$diagnosa = new Diagnosa_Model;
		$this->Assign('diagnosa',$diagnosa->all(0));

		$datas = $this->model->all($this->page);
		$this->Assign('datas',$datas->data);

		$this->view->Assign('first','?url='.$this->privileges.'Respon&page='.$datas->firstpage);
		$this->view->Assign('prev','?url='.$this->privileges.'Respon&page='.$datas->prevpage);
		$this->view->Assign('next','?url='.$this->privileges.'Respon&page='.$datas->nextpage);
		$this->view->Assign('end','?url='.$this->privileges.'Respon&page='.$datas->lastpage);
	}

	public function add(){
		$status = '';
		if(!empty($_POST)){
			$this->kode = $_POST['kode'];
			$this->deskripsi = $_POST['deskripsi'];
		}
		try{
			if(isset($this->deskripsi)&&$this->deskripsi==''){
				throw new Exception("Pertanyaan Respon belum terisi");
			}

			$result = $this->model->add(
				$this->kode,
				$this->deskripsi
			);
			logs('Kosongkan fields');
			$this->deskripsi = '';
			redirect(SITE_ROOT,$this->privileges.'Respon');
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
		$Respon = $this->model->getById($id);
		$this->view->Assign('d',$Respon);
		$this->Load_Model('Respons');
		$this->respons = $this->model->allById($id,$this->page);
		$this->view->Assign('resfirst','?url='.$this->privileges.'Respon/view/'.$id.'&page='.$this->respons->firstpage);
		$this->view->Assign('resprev','?url='.$this->privileges.'Respon/view/'.$id.'&page='.$this->respons->prevpage);
		$this->view->Assign('resnext','?url='.$this->privileges.'Respon/view/'.$id.'&page='.$this->respons->nextpage);
		$this->view->Assign('resend','?url='.$this->privileges.'Respon/view/'.$id.'&page='.$this->respons->lastpage);

		$this->page=null;
		$this->Load_Model('Respon');
		return $this->index();
	}

}