<?php
class groupsController extends controller {

    public function __construct()
    {
        $u = new Teacher();
        $u->verifyLogin();
    }

    public function index() {
        $data = array();

        $this->loadTemplate('class', $data);
    }

    public function add() {
        $data = array();

        $this->loadTemplate('class', $data);
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