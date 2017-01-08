<?php
class Konsultasi_Controller extends Controller{
	private $error;
	private $page;
	private $state;
	private $respons;
	private $respon;
	
	private $kode;
	private $deskripsi;
	private $availrules;

	public function __construct() {
		parent::__construct();
		$this->Load_Model('Konsultasi');
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
			// $data = $this->model->getLast(['idKonsultasi']);
			// $num = (integer)(substr($data->idKonsultasi, 1));
			// $num = 'P'.substr((100 + $num + 1),1);
			// logs($num);
			// $this->kode = $num;
		}
		// $this->respon = 'Q03';
		$pasien = isset($_SESSION['pasien'])?$_SESSION['pasien']:null;
		$dokter = 'null';
		$tgl = date('Y-m-d');
		// var_dump($_SESSION);
		if(!isset($_SESSION['pasien'])){
			redirect(SITE_ROOT,$this->privileges.'konsultasi/daftarPasien');
		}

		if(!isset($_SESSION['idKonsultasi'])||$_SESSION['idKonsultasi']==''){
			logs('belum ada konsultasi, tambahkan');
			// $this->createKonsultasi();
			$this->model->add($pasien,$dokter);
			$konsultasi = $this->model->getLast();
			$_SESSION['idKonsultasi'] = $konsultasi->id;
		}

		// var_dump($konsultasi);
		// $pertanyaan = $this->getQuestion($this->respon);
		$pertanyaan = new Diagnosa_Model;
		// $gejala = new Gejala_Model;
		// echo $pertanyaan->iddiagnosa;
		//var_dump($pertanyaan);
		// var_dump($gejala->getByDiagnosa($pertanyaan->iddiagnosa));
		//die;

		$this->Load_View($this->privileges.'master/konsultasi');
		$this->view->Assign('error',$this->error);
		$this->view->Assign('kode',$this->kode);
		$this->view->Assign('pertanyaan',$pertanyaan->all('nopage'));
		// $this->view->Assign('gejala',$gejala->getByDiagnosa($pertanyaan->iddiagnosa));

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

	public function daftarPasien(){
		// $_SESSION['pasien'] = 32;
		$this->Load_View($this->privileges.'master/daftarpasien');

		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render('header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render('footer',false));
	}

	public function createKonsultasi()
	{
		$this->model->add();
		return;
	}

	public function add($respon){
		$this->state = 'add';
		$status = '';
		if($respon != ''){
			// $this->kode = $_POST['kode'];
			// $this->deskripsi = $_POST['deskripsi'];
			$this->respon = $respon;
		}
		// $this->cekRespon('Q01');
		try{
			// if(isset($this->deskripsi)&&$this->deskripsi==''){
			// 	throw new Exception("Pertanyaan Konsultasi belum terisi");
			// }
			$result = $this->model->add(
				$this->tglkonsultasi,
				// $this->idpasien,
				'S01',null,
				// $this->iddokter,
				$this->kdpenyakit
			);
			logs('Kosongkan fields');
			// redirect(SITE_ROOT,$this->privileges.'Konsultasi');
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

	private function cekRespon($respon){
		$gejala = new Gejala_Model;
		$rule = new Rule_Model;
		var_dump($rule->getAllRule());
		die;
		$rules = $rule->getRule('R01');
		$this->idpasien = 'AA';
		$this->iddokter = 'BB';
		$this->kdpenyakit = '';

	}

	private function getQuestion($respon=null){
		$question = new Diagnosa_Model;
		$q = null;
		if($respon==''){
			return $question->getFirst();
		}
		logs('respon:'.$respon);
		$result = $question->getNext($respon,'iddiagnosa');
		$this->respon = null;
		return $result;
	}
}