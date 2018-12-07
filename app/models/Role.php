<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 05/12/2018
 * Time: 17:28
 */

class Role{
    private $pdo;
    private $log;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }

    //Listar Toda La Info Sobre Roles de Usuario
    public function listAll(){
        try{
            $sql = 'select * from role';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }
        return $result;
    }

    //Listar Un Unico Rol por ID
    public function list($id){
        try{
            $sql = 'select * from role where id_role = ? limit 1';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id]);
            $result = $stm->fetch();

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }
        return $result;
    }

    //Guardar o Editar Informacion de Role
    public function save($model){
        try {
            if(empty($model->id_role)){
                $sql = 'insert into role(
                    role_name, role_description
                    ) values(?,?)';
                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->role_name,
                    $model->role_description
                ]);

            } else {
                $sql = "update role
                set
                role_name = ?,
                role_description = ?
                where id_role = ?";

                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->role_name,
                    $model->role_description,
                    $model->id_role
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

    //Borrar un Registro
    public function delete($id){
        try{
            $sql = 'delete from role where id_role = ?';
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