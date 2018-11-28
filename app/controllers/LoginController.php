<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 26/11/2018
 * Time: 20:18
 */

require 'app/models/Login.php';
class LoginController{
    private $log;
    private $pdo;
    private $login;
    private $crypt;
    public function __construct()
    {
        $this->log = new Log();
        $this->pdo = Database::getConnection();
        $this->login = new Login();
        $this->crypt = new Crypt();
    }

    public function index(){
        require _VIEW_PATH_ . 'login/login.php';
    }

    public function singIn(){
        try{
            $model = new Login();
            $model->user_nickname = $_POST['user_nickname'];
            $password = $_POST['user_password'];
            $singin = $this->login->singIn($model);
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $singin = 2;
        }

        if($singin == 2 || $singin == 3){
            echo $singin;

        } else {
            if(password_verify($password, $singin[0]->user_password)){
                setcookie('id_user', $this->crypt->encrypt($singin[0]->id_user, _PASS_), time() + 30 * 24 * 60 * 60, "/");
                setcookie('id_person', $this->crypt->encrypt($singin[0]->id_user, _PASS_), time() + 30 * 24 * 60 * 60, "/");
                setcookie('user_nickname', $this->crypt->encrypt($singin[0]->user_nickname, _PASS_), time() + 365 * 24 * 60 * 60, "/");
                setcookie('user_image', $this->crypt->encrypt($singin[0]->user_image, _PASS_), time() + 30 * 24 * 60 * 60, "/");
                setcookie('person_name', $this->crypt->encrypt($singin[0]->person_name, _PASS_), time() + 30 * 24 * 60 * 60, "/");
                setcookie('person_surname', $this->crypt->encrypt($singin[0]->person_surname, _PASS_), time() + 30 * 24 * 60 * 60, "/");
                setcookie('person_dni', $this->crypt->encrypt($singin[0]->person_dni, _PASS_), time() + 30 * 24 * 60 * 60, "/");
                setcookie('person_genre', $this->crypt->encrypt($singin[0]->person_genre, _PASS_), time() + 30 * 24 * 60 * 60, "/");
                setcookie("role", $this->crypt->encrypt($singin[0]->id_role, _PASS_), time() + 30* 24 * 60 * 60,"/");
                setcookie("role_name", $this->crypt->encrypt($singin[0]->role_name, _PASS_), time() + 30* 24 * 60 * 60, "/");

                $_SESSION['id_user'] = $this->crypt->encrypt($singin[0]->id_user, _PASS_);
                $_SESSION['id_person'] = $this->crypt->encrypt($singin[0]->id_user, _PASS_);
                $_SESSION['user_nickname'] = $this->crypt->encrypt($singin[0]->user_nickname, _PASS_);
                $_SESSION['user_image'] = $this->crypt->encrypt($singin[0]->user_image, _PASS_);
                $_SESSION['person_name'] = $this->crypt->encrypt($singin[0]->person_name, _PASS_);
                $_SESSION['person_surname'] = $this->crypt->encrypt($singin[0]->person_surname, _PASS_);
                $_SESSION['person_dni'] = $this->crypt->encrypt($singin[0]->person_surname, _PASS_);
                $_SESSION['person_genre'] = $this->crypt->encrypt($singin[0]->person_genre, _PASS_);
                $_SESSION['role'] = $this->crypt->encrypt($singin[0]->id_role, _PASS_);
                $_SESSION['role_name'] = $this->crypt->encrypt($singin[0]->role_name, _PASS_);
                //echo json_encode($singin);
                //echo $singin;
                echo 1;
            } else {
                echo 3;
            }
        }

    }

}