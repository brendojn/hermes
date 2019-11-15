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
        header("Location: ". BASE_URL . "/login");
    }

}