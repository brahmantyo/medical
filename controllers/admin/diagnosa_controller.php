<?php
class Diagnosa_Controller extends Controller{
	private $error;
	private $page;
	private $respons;
	
	private $kode;
	private $deskripsi;

	public function __construct() {
		parent::__construct();
		$this->Load_Model('Diagnosa');
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
	}

	public function index() {
		logs('Privileges:' . $this->privileges);
		logs('Masuk Diagnosa Controller');
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		if(!isset($_POST['kode'])){
			$data = $this->model->getLast(['iddiagnosa']);
			$num = (integer)(substr($data->iddiagnosa, 1));
			$num = 'Q'.substr((100 + $num + 1),1);
			logs($num);
			$this->kode = $num;
		}
		$this->page = isset($_GET['page'])?$_GET['page']:1;
		$this->Load_View($this->privileges.'master/diagnosa');
		$this->view->Assign('error',$this->error);
		$this->view->Assign('page',$this->page);
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
		logs('Ambil semua data diagnosa');
		$datas = $this->model->all($this->page);
		$this->Assign('datas',$datas->data);

		$this->view->Assign('first','?url='.$this->privileges.'diagnosa&page='.$datas->firstpage);
		$this->view->Assign('prev','?url='.$this->privileges.'diagnosa&page='.$datas->prevpage);
		$this->view->Assign('next','?url='.$this->privileges.'diagnosa&page='.$datas->nextpage);
		$this->view->Assign('end','?url='.$this->privileges.'diagnosa&page='.$datas->lastpage);
	}

	public function add(){
		$status = '';
		if(!empty($_POST)){
			$this->kode = $_POST['kode'];
			$this->deskripsi = $_POST['deskripsi'];
		}
		try{
			if(isset($this->deskripsi)&&$this->deskripsi==''){
				throw new Exception("Pertanyaan diagnosa belum terisi");
			}

			$result = $this->model->add(
				$this->kode,
				$this->deskripsi
			);
			logs('Kosongkan fields');
			$this->deskripsi = '';
			redirect(SITE_ROOT,$this->privileges.'diagnosa');
		} catch(Exception $e){
			logs($e->getMessage());
			$this->error = $e->getMessage();
		}
		$this->index();
	}

	public function remove($id){
		try{
			$result = $this->model->remove($id);
			if($result > 0){ 
				throw new Exception("Data tidak kosong");
			}
			$this->succes = "Data $id berhasil dihapus";
		} catch(Exception $e){
			$this->error = $e->getMessage();
		}
		$this->index();
	}

	public function view($id){
		$diagnosa = $this->model->getById($id);
		$this->view->Assign('d',$diagnosa);

		$this->respons = $this->model->getDetail($id,'Respon');
		$this->view->Assign('resfirst','?url='.$this->privileges.'diagnosa/view/'.$id.'&page='.$this->respons->firstpage);
		$this->view->Assign('resprev','?url='.$this->privileges.'diagnosa/view/'.$id.'&page='.$this->respons->prevpage);
		$this->view->Assign('resnext','?url='.$this->privileges.'diagnosa/view/'.$id.'&page='.$this->respons->nextpage);
		$this->view->Assign('resend','?url='.$this->privileges.'diagnosa/view/'.$id.'&page='.$this->respons->lastpage);

		$this->page=null;
		$this->Load_Model('Diagnosa');

		$this->index();
	}
}