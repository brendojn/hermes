<?php
class loginController extends controller {

    public function index() {
        $data = array();
        
        $this->loadTemplate('login', $data);
    }

    public function enter() {
    	$data = array('erro'=>'');

    	if(isset($_POST['email']) && !empty($_POST['email'])) {
    		$email = addslashes($_POST['email']);
    		$password = md5($_POST['password']);

    		$u = new Teacher();
    		$data['erro'] = $u->login($email, $password);
    	}

    	$this->loadTemplate('login_entrar', $data);
    }

    public function add() {
    	$data = array();

    	if(isset($_POST['email']) && !empty($_POST['email'])) {
    		$name = addslashes($_POST['name']);
    		$email = addslashes($_POST['email']);
    		$subject = addslashes($_POST['subject']);
    		$registration = addslashes($_POST['registration']);
    		$password = addslashes($_POST['password']);
    		$isAdmin = addslashes($_POST['admin']);

    		$t = new Teacher();
    		$data['erro'] = $t->addUser($name, $email, $subject, $registration, $password, $isAdmin);
    	}

    	$this->loadTemplate('login_cadastrar', $data);
    }

    public function sair() {
    	unset($_SESSION['logged']);
    	header("Location: ". BASE_URL);
    }

}