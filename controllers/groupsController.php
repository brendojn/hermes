<?php
class groupsController extends controller {

    public function __construct()
    {
        $u = new User();
        $u->verifyLogin();
    }

    public function index() {
        $data = array();

        $this->loadTemplate('class', $data);
    }




}