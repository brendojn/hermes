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
        $s = new Student();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);


        $students = $s->getStudents();

        $data['students'] = $students;

        $this->loadTemplate('students', $data);
    }

    public function add() {
        $data = array(
            'teacher_name' => ''
        );

        $g = new Group();
        $t = new Teacher();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $period = addslashes($_POST['period']);
            $registration = addslashes($_POST['registration']);
            $password = addslashes($_POST['password']);
            $group = addslashes($_POST['group']);

            $s = new Student();
            $data['erro'] = $s->addStudent($name, $email, $period, $registration, $password, $group);
        }

        $data['groups'] = $g->getGroups();

        $this->loadTemplate('add-student', $data);
    }

}