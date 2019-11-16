<?php

class dashboardController extends controller
{
    public function __construct()
    {
        $u = new Teacher();
        $u->verifyLogin();
    }

    public function index()
    {
        $this->loadTemplate('dashboard');
    }

}