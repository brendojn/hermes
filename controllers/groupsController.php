<?php
class groupsController extends controller {

    public function __construct()
    {
        $t = new Teacher();
        $t->verifyLogin();
    }

    public function index() {

        $data = array(
            'teacher_name' => ''
        );

        $g = new Group();
        $t = new Teacher();
        $s = new Student();
        $tr = new Trail();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        $groups = $g->getGroups();
        $numberStudents = $g->getNumberStudent();
        $numberTrails = $tr->getNumberTrails();

        $data['numberTrails'] = $numberTrails;

        $data['groups'] = $groups;
        $data['numberStudents'] = $groups;


        $this->loadTemplate('class', $data);
    }

    public function add() {
        $data = array(
            'teacher_name' => ''
        );

        $g = new Group();
        $t = new Teacher();


        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $description = addslashes($_POST['description']);
            $teacher = addslashes($_POST['responsibility']);

            $data['erro'] = $g->createGroup($name, $description, $teacher);
        }

        $data['teachers'] = $t->getTeachers();

        $this->loadTemplate('add-class', $data);
    }

    public function edit($id) {
        $data = array(
            'teacher_name' => ''
        );

        $g = new Group();
        $t = new Teacher();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $description = addslashes($_POST['description']);
            $teacher = addslashes($_POST['responsibility']);

            $data['erro'] = $g->editGroup($id, $name, $description, $teacher);
        }

        $data['teachers'] = $t->getTeachers();
        $data['getGroup'] = $g->getGroup($id);
        $data['teacherGroup'] = $g->getTeacherGroup($id);

        $this->loadTemplate('edit-class', $data);
    }

    public function delete($id) {
        $g = new Group();

        $g->deleteGroup($id);


        header("Location: " . BASE_URL . "groups");
    }

    public function vinculate($id) {
        $data = array(
            'teacher_name' => ''
        );

        $g = new Group();
        $t = new Teacher();
        $tr = new Trail();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $description = addslashes($_POST['description']);
            $teacher = addslashes($_POST['responsibility']);
            $trail = addslashes($_POST['trail']);

            $data['erro'] = $g->editGroup($id, $name, $description, $teacher, $trail);
        }

        $data['teachers'] = $t->getTeachers();
        $data['trails'] = $tr->getTrails();
        $data['getGroup'] = $g->getGroup($id);
        $data['teacherGroup'] = $g->getTeacherGroup($id);

        $this->loadTemplate('vinculate', $data);
    }



}