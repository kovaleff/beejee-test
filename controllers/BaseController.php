<?php


namespace Controllers;


use Medoo\Medoo;

class BaseController
{
    public $db;
    public $twig;
    public $perPage = 3;
    public $isUser;

    /**
     * BaseController constructor.
     * @param $db
     */
    public function __construct()
    {
        $dbConfig = require '../config/db.php';
        $this->db = new Medoo($dbConfig);
        $this->isUser = isset($_SESSION['admin']) && $_SESSION['admin'] == true;

        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->twig = new \Twig\Environment($loader);
        $this->twig->addGlobal('isUser', $this->isUser);
    }


}