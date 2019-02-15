<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 14/02/2019
 * Time: 1:56
 */
class User{
    private $pdo;
    private $log;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }

    //Listar Toda La Info Sobre Usuarios
    public function listAll(){
        try{
            $sql = 'select * from user u inner join role r on u.id_role = r.id_role';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }
        return $result;
    }

    //Listar Un Unico Usuario por ID
    public function list($id){
        try{
            $sql = 'select * from user where id_user = ? limit 1';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id]);
            $result = $stm->fetch();

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }
        return $result;
    }

    //Guardar o Editar Informacion de Usuarios
    public function save($model){
        try {
            $fecha = date("Y-m-d H:i:s");
            if(empty($model->id_user)){
                $sql = 'insert into user(
                    id_person, id_role, user_nickname, user_password, user_email, user_status, user_created_at, user_modified_at
                    ) values(?,?,?,?,?,?,?,?)';
                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->id_person,
                    $model->id_role,
                    $model->user_nickname,
                    $model->user_password,
                    $model->user_email,
                    1,
                    $fecha,
                    $fecha
                ]);

            } else {
                $sql = "update user 
                set
                id_role = ?,
                id_person = ?,
                user_nickname = ?,
                user_email = ?,
                user_status = ?,
                user_modified_at = ?
                where id_user = ?";
                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->id_role,
                    $model->id_person,
                    $model->user_nickname,
                    $model->user_email,
                    $model->user_status,
                    $fecha,
                    $model->id_user
                ]);
                unset($_SESSION['id_usered']);
            }
            $result = 1;
        } catch (Exception $e){
            //throw new Exception($e->getMessage());
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        return $result;
    }

    //Cambiar Contraseña de un Usuario
    public function changepassword($model){
        try {
            $sql = 'update user set
                user_password = ?
                where id_user = ?';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $model->user_password,
                $model->id_user
            ]);
            unset($_SESSION['id_userchg']);
            $result = 1;
        } catch (Exception $e){
            //throw new Exception($e->getMessage());
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        return $result;
    }

    //Borrar un Registro
    public function delete($id){
        try{
            $sql = 'delete from user where id_user = ?';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id]);
            $result = 1;
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        return $result;
    }
}