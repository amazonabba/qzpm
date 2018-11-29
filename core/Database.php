<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 26/11/2018
 * Time: 11:22
 */

class Database{
    private static $db;

    public static function getConnection(){
        if(empty(self::$db)){
            $pdo = new PDO('mysql:host=localhost;dbname=rolebasebd;charset=utf8','root','');
            //En caso de trabajar localmente, descomentar la siguiente linea y comentar la anterior
            //$pdo = new PDO('mysql:host=localhost;dbname=zxcvbnm;charset=utf8','root','');

            //Sirve para indicar al PDO que todo lo que retorne sean objetos
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //Sirve para indicar que si encuentra error, los muestre
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$pdo->query("SET NAMES 'utf8';");
            //$pdo->execute();

            self::$db = $pdo;

        }

        return self::$db;
    }
}