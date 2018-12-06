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


}