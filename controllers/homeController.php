<?php

class homeController extends controller
{

    public function __construct()
    {
        $u = new Teacher();
        $u->verifyLogin();
    }

    public function index()
    {
        $data = array(
            'teacher_name' => ''
        );
        $t = new Teacher();
        $data['teacher_name'] = $t->getName($_SESSION['logged']);

        $this->loadTemplate('home', $data);
    }

}