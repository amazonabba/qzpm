<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 08/02/2019
 * Time: 18:46
 */
require 'app/models/Menu.php';
class MenuController{
    private $crypt;
    private $nav;
    private $log;
    private $menu;
    public function __construct()
    {
        $this->menu = new Menu();
        $this->crypt = new Crypt();
        $this->nav = new Navbar();
        $this->log = new Log();
    }
    //Vistas
    public function list(){
        try{
            $navs = $this->nav->listMenu($this->crypt->decrypt($_SESSION['role'],_PASS_));
            $menu = $this->menu->list();
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'navbar.php';
            require _VIEW_PATH_ . 'user.php';
            require _VIEW_PATH_ . 'menu/list.php';
        } catch (\Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);;
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"index.php\";</script>";
        }
    }
}