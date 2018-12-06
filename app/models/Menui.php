<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 26/11/2018
 * Time: 11:43
 */

class Menui{
    private $pdo;
    private $log;
    public function __construct(){
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }
    //FUNCION USADA EN EL MENU INDEX
    //Sirve para leer los permisos al momento de solicitar index
    public function verificateViewRole($id_role, $view, $option){
        $validate = false;
        try{
            $sql = "select m.menu_status, o.optionm_status from role r inner join rolemenu rl on r.id_role = rl.id_role inner join menu m on rl.id_menu = m.id_menu inner join optionm o on m.id_menu = o.id_menu where rl.id_role = ? and m.menu_controller = ? and o.optionm_function = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id_role, $view, $option]);
            $result = $stm->fetchAll();
            if(count($result) > 0){
                $validate = true;
            }
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $validate = false;
        }
        return $validate;

    }

}