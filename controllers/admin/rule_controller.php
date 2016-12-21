<?php
class Rule_Controller extends Controller{
	private $error;
	private $succes;
	private $state;
	private $page;
	private $respons;
	private $gejala;
	private $gangguan;
	private $diagnosa;
	private $rule;
	private $kode;

	private $id;

	private $inputrule;
	private $inputgangguan;
	private $inputgejala;

	public function __construct() {
		parent::__construct();
		$this->Load_Model('Rule');
		$this->privileges = isset($_SESSION['privileges'])?$_SESSION['privileges'].'/':null;
		$this->page = isset($_GET['page'])?$_GET['page']:'';
		$this->gejala = new Gejala_Model;
		$this->gangguan = new Gangguan_Model;
		$this->diagnosa = new Diagnosa_Model;
		// $this->rule = new Rule_Model;
	}

	public function index() {
		$listrule = [];

		logs('Privileges:' . $this->privileges);
		logs('Masuk rule Controller');
		if(!checkSession()){
			logs('Session tidak ditemukan');
			redirect(SITE_ROOT,'auth/login');
		}
		$data = $this->model->getLast(['kode'],['kode'=>'desc']);
		logs('Last Rule Kode:'.$data->kode);
		$num = (integer) substr($data->kode,1);
		// if(!isset($_POST['rule'])){
			$num++;
		// }		
		logs($num);
		$this->kode = isset($this->inputrule)&&$this->inputrule!=''?$this->inputrule:'R'.substr((100+$num),1);

		$this->Load_View($this->privileges.'master/rule');
		$this->view->Assign('error',$this->error);
		$this->view->Assign('succes',$this->succes);
		$this->view->Assign('state',$this->state);
		$this->view->Assign('rule',$this->kode);
		// $this->view->Assign('respons',$this->respons);
		$gejala = [];
		foreach ($this->gejala->all('nopage') as $value) {
			$gejala[$value->kode]->data = $value;
			$gejala[$value->kode]->select = !empty($this->inputgejala)&&(in_array($value->kode,$this->inputgejala))?TRUE:FALSE;
		}
		$this->view->Assign('gejala',$gejala);

		$gangguan = [];
		foreach ($this->gangguan->all('nopage') as $value) {
			$gangguan[$value->kode]->data = $value;
			$gangguan[$value->kode]->select = ($this->inputgangguan!="")&&($this->inputgangguan==$value->kode)?TRUE:FALSE;
		}
		$this->view->Assign('gangguan',$gangguan);
		$this->view->Assign('gangguannum',$this->gangguan->all()->num);
		// $this->view->Assign('diagnosa',$this->diagnosa->all('nopage'));
		// $this->view->Assign('rules',$this->rule->all()->data);

		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render($this->privileges.'common/header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render($this->privileges.'common/footer',false));

		$datas = $this->model->all('nopage');
		
		foreach ($datas->data as $item) {
			$listrule[$item->kdrule]->gejala[$item->kdgejala] = $item->gejala;
			$listrule[$item->kdrule]->kdgangguan = $item->kdgangguan;
			$listrule[$item->kdrule]->nmgangguan = $item->nmgangguan;
		}

		$this->Assign('rules',$listrule);

		// $this->view->Assign('first','?url='.$this->privileges.'rule&page='.$datas->firstpage);
		// $this->view->Assign('prev','?url='.$this->privileges.'rule&page='.$datas->prevpage);
		// $this->view->Assign('next','?url='.$this->privileges.'rule&page='.$datas->nextpage);
		// $this->view->Assign('end','?url='.$this->privileges.'rule&page='.$datas->lastpage);
	}

	public function add(){
		$this->state = 'add';
		$kode = 0;
		logs('tambah rule');
		if(!empty($_POST)){
			$rule = $_POST['rule'];
			$gangguan = $_POST['gangguan'];
			$gejala = $_POST['gejala'];
			$this->inputgejala = $gejala;
			$this->inputgangguan = $gangguan;
		}
		try{
			if($gangguan==""){
				throw new Exception("Gangguan Penyakit belum di tentukan");
			}
			if(empty($gejala)){
				throw new Exception("Gejala belum di tentukan");
			}
			foreach ($gejala as $g) {
				$this->model->add($rule,$g,$gangguan);
			}
			$this->inputgejala = '';
			$this->inputgangguan = '';
			$this->succes = 'Input rule is Success';
			logs($rule.':'. $gangguan.' = '.join($gejala,' + '));
		} catch(Exception $e){
			logs($e->getMessage());
			$this->error = $e->getMessage();
		}
		$this->index();
	}

	public function remove($id){
		$this->model->remove($id);
		$this->index();
	}

	public function edit($id){
		$this->state = 'edit';
		$rule = $this->model->getById($id,'kode',['limit'=>0]);
		foreach ($rule->data as $key => $value) {
			$this->inputgejala[] = $value->kdgejala;
			$this->inputgangguan = $value->kdgangguan;
			$this->inputrule = $value->kode;
		}
		$this->index();
	}

	public function editSave(){
		$kode = 0;
		logs('update rule');
		if(!empty($_POST)){
			$rule = $_POST['rule'];
			$gangguan = $_POST['gangguan'];
			$gejala = $_POST['gejala'];
			$this->inputgejala = $gejala;
			$this->inputgangguan = $gangguan;
		}
		try{
			if($gangguan==""){
				throw new Exception("Gangguan Penyakit belum di tentukan");
			}
			if(empty($gejala)){
				throw new Exception("Gejala belum di tentukan");
			}
			$this->model->remove($rule);
			foreach ($gejala as $g) {
				$this->model->add($rule,$g,$gangguan);
			}
			$this->inputgejala = '';
			$this->inputgangguan = '';
			$this->succes = 'Edit rule is Success';
			logs($rule.':'. $gangguan.' = '.join($gejala,' + '));
		} catch(Exception $e){
			logs($e->getMessage());
			$this->error = $e->getMessage();
		}
		$this->index();		
	}

}