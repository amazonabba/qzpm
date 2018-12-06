<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 05/12/2018
 * Time: 17:29
 */

require 'app/models/Role.php';
class RoleController{
    private $crypt;
    private $nav;
    private $role;
    private $log;
    public function __construct()
    {
        $this->crypt = new Crypt();
        $this->role = new Role();
        $this->log = new Log();
    }

    //Vistas
    public function all(){
        try{
            $this->nav = new Navbar();
            $navs = $this->nav->listMenu($this->crypt->decrypt($_COOKIE['role'],_PASS_) ?? $this->crypt->decrypt($_SESSION['role'],_PASS_));
            $role = $this->role->listAll();
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'navbar.php';
            require _VIEW_PATH_ . 'user.php';
            require _VIEW_PATH_ . 'role/all.php';
        } catch (\Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);;
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"index.php\";</script>";
        }
    }

    public function add(){
        try{
            $navs = $this->nav->listMenu($this->crypt->decrypt($_COOKIE['role'],_PASS_) ?? $this->crypt->decrypt($_SESSION['role'],_PASS_));
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'navbar.php';
            require _VIEW_PATH_ . 'user.php';
            require _VIEW_PATH_ . 'role/add.php';
        } catch (\Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);;
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"index.php\";</script>";
        }
    }

    //Funciones
    public function save(){
        try{
            $model = new Role();
            if(isset($_POST['id_role'])){
                $model->id_role = $_POST['id_role'];
                $model->role_name= $_POST['role_name'];
                $model->role_description = $_POST['role_description'];
                $result = $this->role->save($model);
            } else {
                $model->role_name= $_POST['role_name'];
                $model->role_description = $_POST['role_description'];
                $result = $this->role->save($model);
            }

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }

        echo $result;
    }

}