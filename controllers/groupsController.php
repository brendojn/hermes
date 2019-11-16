<?php
class groupsController extends controller {

    public function __construct()
    {
        $u = new Teacher();
        $u->verifyLogin();
    }

    public function index() {
        $data = array();

        $g = new Group();
        $t = new Teacher();

        $groups = $g->getGroups();

        $data['groups'] = $groups;


        $this->loadTemplate('class', $data);
    }

    public function add() {
        $data = array();

        $g = new Group();
        $t = new Teacher();

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $description = addslashes($_POST['description']);
            $teacher = addslashes($_POST['responsibility']);

            $data['erro'] = $g->createGroup($name, $description, $teacher);
        }

        $data['teachers'] = $t->getTeachers();

        $this->loadTemplate('add-class', $data);
    }

    public function update() {
        $data = array();

        $this->loadTemplate('class', $data);
    }

    public function delete() {
        $data = array();

        $this->loadTemplate('class', $data);
    }



}