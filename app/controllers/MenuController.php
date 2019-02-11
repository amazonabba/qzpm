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
        //$this->nav = new Navbar();
        $this->log = new Log();
    }
    //Vistas
    public function list(){
        try{
            $this->nav = new Navbar();
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

    public function add(){
        try{
            unset($_SESSION['id_menue']);
            $this->nav = new Navbar();
            $navs = $this->nav->listMenu($this->crypt->decrypt($_SESSION['role'],_PASS_));
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'navbar.php';
            require _VIEW_PATH_ . 'user.php';
            require _VIEW_PATH_ . 'menu/add.php';
        } catch (\Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);;
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
        }
    }

    public function edit(){
        try{
            $this->nav = new Navbar();
            $navs = $this->nav->listMenu($this->crypt->decrypt($_SESSION['role'],_PASS_));
            $id = $_GET['id'] ?? 0;
            if($id == 0){
                throw new Exception('ID Sin Declarar');
            }
            $_SESSION['id_menue'] = $id;
            $menue = $this->menu->listMenu($id);
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'navbar.php';
            require _VIEW_PATH_ . 'user.php';
            require _VIEW_PATH_ . 'menu/edit.php';
        } catch (\Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);;
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
        }
    }

    public function icons(){
        try{
            $navs = $this->nav->listMenu($this->crypt->decrypt($_SESSION['role'],_PASS_));
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'navbar.php';
            require _VIEW_PATH_ . 'user.php';
            require _VIEW_PATH_ . 'menu/icons.php';
        } catch (\Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);;
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"index.php\";</script>";
        }
    }

    public function save(){
        try{
            $model = new Menu();
            if($this->menu->verificatePassword($this->crypt->decrypt($_SESSION['user_nickname'],_PASS_), $_POST['password'])) {
                if(isset($_SESSION['id_menue'])){
                    $model->id_menu = $_SESSION['id_menue'];
                    $model->menu_name= $_POST['menu_name'];
                    $model->menu_icon= $_POST['menu_icon'];
                    $model->menu_controller= $_POST['menu_controller'];
                    $model->menu_order= $_POST['menu_order'];
                    $model->menu_status= $_POST['menu_status'];
                    $model->menu_show= $_POST['menu_show'];
                    $result = $this->menu->save($model);
                    unset($_SESSION['id_menue']);
                } else {
                    $model->menu_name= $_POST['menu_name'];
                    $model->menu_icon= $_POST['menu_icon'];
                    $model->menu_controller= $_POST['menu_controller'];
                    $model->menu_order= $_POST['menu_order'];
                    $model->menu_status= $_POST['menu_status'];
                    $model->menu_show= $_POST['menu_show'];
                    $result = $this->menu->save($model);
                }
            } else {
                $result = 3;
            }

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        echo $result;
    }
}