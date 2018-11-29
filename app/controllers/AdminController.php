<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 28/11/2018
 * Time: 17:28
 */

class AdminController{
    private $crypt;

    public function __construct()
    {
        $this->crypt = new Crypt();
    }
    //Vistas
    public function index(){

        require _VIEW_PATH_ . 'header.php';
        require _VIEW_PATH_ . 'navbar.php';
        require _VIEW_PATH_ . 'user.php';
        require _VIEW_PATH_ . 'admin/index.php';
    }
}