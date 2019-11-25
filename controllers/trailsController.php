<?php
class trailsController extends controller {

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
        $tr = new Trail();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        $trails = $tr->getTrails();

        $data['trails'] = $trails;

        $this->loadTemplate('trail', $data);
    }

    public function add() {
        $data = array(
            'teacher_name' => ''
        );

        $t = new Teacher();
        $tr = new Trail();

        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $description = addslashes($_POST['description']);

            $data['erro'] = $tr->createTrail($name, $description);
        }

        $this->loadTemplate('add-trail', $data);
    }

}