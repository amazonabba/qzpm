<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 26/11/2018
 * Time: 20:19
 */

class Login{
    private $pdo;
    private $log;
    public function __construct(){
        $this->log = new Log();
        $this->pdo = Database::getConnection();
    }

    public function singIn($model){
        try{
            $sql = 'Select * from user u inner join person p on u.id_person = p.id_person inner join role r on r.id_role = u.id_role where u.user_nickname = ? and u.user_status = 1';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $model->user_nickname
            ]);
            $result = $stm->fetchAll();
            if(count($result) > 0){
                $fecha = date('Y-m-d H:i:s');
                $sql = 'update user set user_last_login = ? where user_nickname = ?';
                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $fecha,
                    $model->user_nickname
                ]);
            }
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        if($result == 2){
            return $result;
        } else if((empty($result))) {
            return 3;
        } else {
            return $result;
        }

    }
}