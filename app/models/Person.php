<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 14/02/2019
 * Time: 1:50
 */
class Person{
    private $pdo;
    private $log;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }

    //Listar Toda La Info Sobre Personas
    public function listAll(){
        try{
            $sql = 'select * from person';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }
        return $result;
    }

    //Listar Una Unica Persona por ID
    public function list($id){
        try{
            $sql = 'select * from person where id_person = ? limit 1';
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
            if(empty($model->id_person)){
                $sql = 'insert into person(
                    person_name, person_surname, person_birth, person_number_phone, person_genre, person_address
                    ) values(?,?,?,?,?,?)';
                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->person_name,
                    $model->person_surname,
                    $model->person_birth,
                    $model->person_number_phone,
                    $model->person_genre,
                    $model->person_address
                ]);

            } else {
                $sql = "update person
                set
                person_name = ?,
                person_surname = ?,
                person_birth = ?,
                person_number_phone = ?,
                person_genre = ?,
                person_address = ?
                where id_person = ?";

                $stm = $this->pdo->prepare($sql);
                $stm->execute([
                    $model->person_name,
                    $model->person_surname,
                    $model->person_birth,
                    $model->person_number_phone,
                    $model->person_genre,
                    $model->person_address,
                    $model->id_person,
                ]);
                unset($_SESSION['id_persone']);
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
            $sql = 'delete from person where id_person = ?';
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