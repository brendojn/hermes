<?php
class studentsController extends controller {

    public function __construct()
    {
        $t = new Teacher();
        $t->verifyLogin();
    }

    public function index() {
        $data = array(
            'teacher_name' => ''
        );

        $t = new Teacher();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        $this->loadTemplate('students', $data);
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
            $data['erro'] = $t->addTeacher($name, $email, $subject, $registration, $password, $isAdmin);
        }

        $this->loadTemplate('login_cadastrar', $data);
    }

}