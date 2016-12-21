<?php
class Pasien_Controller extends Controller{
	private $error;
	private $nama;
	private $usia;
	private $berat;
	private $tinggi;
	private $alamat;
	private $kelamin;
	private $menikah;
	private $deskripsi;

	public function __construct() {
		parent::__construct();
		$this->Load_Model('Pasien');
	}

	public function index() {
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
		logs('Privileges:' . $this->privileges);
		$page = isset($_GET['page'])?$_GET['page']:'';
		logs('Masuk Pasien Controller');
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		$this->Load_View($this->privileges.'master/pasien');
		$this->view->Assign('error',$this->error);
		$this->view->Assign('nama',$this->nama);
		$this->view->Assign('usia',$this->usia);
		$this->view->Assign('berat',$this->berat);
		$this->view->Assign('tinggi',$this->tinggi);
		$this->view->Assign('alamat',$this->alamat);
		// $this->view->Assign('phone',$this->phone);
		$this->view->Assign('kelamin',$this->kelamin);
		$this->view->Assign('menikah',$this->menikah);		

		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render($this->privileges.'common/header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render($this->privileges.'common/footer',false));

		$datas = $this->model->all($page);
		$this->Assign('datas',$datas->data);

		$this->view->Assign('first','?url='.$this->privileges.'pasien&page='.$datas->firstpage);
		$this->view->Assign('prev','?url='.$this->privileges.'pasien&page='.$datas->prevpage);
		$this->view->Assign('next','?url='.$this->privileges.'pasien&page='.$datas->nextpage);
		$this->view->Assign('end','?url='.$this->privileges.'pasien&page='.$datas->lastpage);
	}

	public function add(){
		$status = '';
		if(!empty($_POST)){
			$this->usia 	= $_POST['usia'];
			$this->berat 	= $_POST['berat'];
			$this->nama 	= $_POST['nama'];
			$this->tinggi 	= $_POST['tinggi'];
			$this->alamat 	= $_POST['alamat'];
			$this->kelamin 	= $_POST['kelamin'];
			$this->menikah 	= $_POST['menikah'];
			// $this->phone = $_POST['phone'];
		}
		try{
			if(isset($this->nama)&&$this->nama==''){
				throw new Exception("Nama Pasien belum terisi");
			}
			if(isset($this->usia)&&((int)$this->usia == 0)){
				throw new Exception("Usia Pasien belum terisi atau bukan angka");
			}
			if(isset($this->berat)&&((int)$this->berat== 0)){
				throw new Exception("Berat Pasien belum terisi");
			}
			if(isset($this->tinggi)&&((int)$this->tinggi== 0)){
				throw new Exception("Tinggi Pasien belum terisi");
			}
			if(isset($this->alamat)&&$this->alamat==''){
				throw new Exception("Alamat Pasien belum terisi");
			}
			if(!isset($this->kelamin)||(isset($this->kelamin)&&$this->kelamin=='')){
				throw new Exception("Jenis Kelamin Pasien belum terisi");
			}
			if(!isset($this->menikah)||(isset($this->menikah)&&$this->menikah=='')){
				throw new Exception("Status Perkawinan Pasien belum terisi");
			}
			if($this->menikah=='Y'){
				$status = '1';
			} else if ($this>menikah=='T'){
				$status = '0';
			}
			$result = $this->model->add(
				$this->nama,
				$this->usia,
				$this->berat,
				$this->tinggi,
				$this->alamat,
				$this->phone,
				$this->kelamin,
				$status
			);
			logs('Kosongkan fields');
			$this->nama = '';
			$this->usia = '';
			$this->berat = '';
			$this->tinggi = '';
			$this->alamat = '';
			$this->phone = '';
			$this->kelamin = '';
			$this->menikah = '';
			redirect(SITE_ROOT,$privileges.'pasien');
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

	// public function generate(){
	// 	for($i=0;$i<1000000;$i++){
	// 		$this->nama = 'Nama'.$i;
	// 		$this->usia = 50;
	// 		$this->berat = 70;
	// 		$this->tinggi = 150;
	// 		$this->alamat = 'alamat'.$i;
	// 		$this->phone = '080000000'.$i;
	// 		$this->kelamin = 'L';
	// 		$this->menikah = '1';

	// 		$result = $this->model->add($this->nama, $this->usia, $this->berat, $this->tinggi, $this->alamat, $this->phone, $this->kelamin, $this->menikah);
	// 	}
	// }
}