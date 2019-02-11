<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 05/12/2018
 * Time: 17:22
 */

class Menu{
    private $pdo;
    private $log;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }

    public function list(){
        try{
            $sql = "select * from menu";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }
        return $result;

    }

    public function verificatePassword($user, $pass){
        $result = false;
        try{
            $sql = "Select user_password from user where user_nickname = ? and user_status = 1";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$user]);
            $info = $stm->fetch();

            if(password_verify($pass, $info->user_password)){
                $result = true;
            }
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = false;
        }
        return $result;
    }

    public function save($model){
        try {
            if(empty($model->id_menu)){
                $sql = 'insert into menu(
                    menu_name, menu_icon, menu_controller, menu_order, menu_status, menu_show
                    ) values(?,?,?,?,?,?)';
                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->menu_name,
                    $model->menu_icon,
                    $model->menu_controller,
                    $model->menu_order,
                    $model->menu_status,
                    $model->menu_show
                ]);
            } else {
                $sql = "update menu
                set
                menu_name = ?,
                menu_icon = ?,
                menu_controller = ?,
                menu_order = ?,
                menu_status = ?,
                menu_show = ?
                where id_menu = ?";

                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->menu_name,
                    $model->menu_icon,
                    $model->menu_controller,
                    $model->menu_order,
                    $model->menu_status,
                    $model->menu_show,
                    $model->id_menu
                ]);
            }
            $result = 1;
        } catch (Exception $e){
            //throw new Exception($e->getMessage());
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        return $result;
    }

    public function listMenu($id){
        try{
            $sql = "select * from menu where id_menu = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id]);
            $result = $stm->fetch();
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }
        return $result;

    }
}