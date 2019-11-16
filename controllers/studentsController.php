<?php
class studentsController extends controller {

    public function index() {
        $data = array();

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