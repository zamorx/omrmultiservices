<?php

class HomeController
{

    private $model;

    public function __CONSTRUCT()
    {
    }

    public function Index()
    {
        require_once 'View/header.php';
        require_once 'View/home.php';
        require_once 'View/footer.php';
    }
}