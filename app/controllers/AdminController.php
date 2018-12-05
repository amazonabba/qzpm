<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 28/11/2018
 * Time: 17:28
 */

class AdminController{
    private $crypt;
    private $nav;
    public function __construct()
    {
        $this->crypt = new Crypt();
        $this->nav = new Navbar();
    }
    //Vistas
    public function index(){
        $navs = $this->nav->listMenu($this->crypt->decrypt($_COOKIE['role'],_PASS_) ?? $this->crypt->decrypt($_SESSION['role'],_PASS_));
        require _VIEW_PATH_ . 'header.php';
        require _VIEW_PATH_ . 'navbar.php';
        require _VIEW_PATH_ . 'user.php';
        require _VIEW_PATH_ . 'admin/index.php';
    }
}