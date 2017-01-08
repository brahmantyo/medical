<?php
class Login_Controller extends Controller{
	private $user;
	private	$error;

	private $username;
	private $pasien;
	private $fullname;
	private $email;
	private $address;
	private $phone;

	public function __construct() {
		parent::__construct();
		$this->Load_Model('Users');
	}

	public function index() {
		if(!empty($_POST)&&isset($_POST['login-submit'])){
			$this->login();
		}

		$this->Load_View('auth/login');
		
		$this->view->Set_CSS('');
		$this->view->Set_Site_Title('Sistem Analisa Penyakit');
		$this->view->Set_Meta_Keywords('sistem pakar.analisa,kesehatan');

		$this->view->Assign('error',$this->error);
		
	}

	private function login(){
		try {
			if(isset($_POST['username'])&&$_POST['username']===''){
				throw new Exception("Username Kosong");
			}

			if(isset($_POST['password'])&&$_POST['password']===''){
				throw new Exception("Password Kosong");
			}

			logs('Username :'.$_POST['username']);
			logs('Password :'.MD5($_POST['password']));

			$this->user = $this->model->getUserByName($_POST['username']);
			if(!isset($this->user->username)){
				$this->user = $this->model->getUserByEmail($_POST['username']);
				if(!isset($this->user->username)){
					throw new Exception("User not registered");
				}
			}

			if(($this->user->password !== MD5($_POST['password']))){
				throw new Exception("Password not match");
			}



			$this->username 	= $this->user->username;
			$this->pasien 		= $this->user->idpasien;
			$this->fullname		= $this->user->fullname;
			$this->email 		= $this->user->email;
			$this->address 		= $this->user->address;
			$this->phone 		= $this->user->phone;

			$this->setSession($this->username);

			if(isset($_SESSION['id'])==$_POST['username']){
				logs('Session set.');
				logs('Privileges: '.$this->privileges);

			}
			
		} catch(Exception $e){
			logs($e->getMessage());
			$this->error = $e->getMessage();
		}
	}

	public function setSession($id) {
		if(!isset($_SESSION['id'])){
			$_SESSION['id'] = $id;
			$_SESSION['pasien'] = $this->pasien;
			$_SESSION['time'] = time();
			$_SESSION['fullname'] = $this->fullname;
			$_SESSION['email'] = $this->email;
			$_SESSION['address'] = $this->address;
			$_SESSION['phone'] = $this->phone;
			$privileges = $this->model->getPrivileges($this->username);
			$_SESSION['privileges'] = $privileges;
			$_SESSION['path'] = $privileges?$privileges . '/index':'';
		 	redirect(SITE_ROOT,$this->path);
		}

	}

	// public function
}
