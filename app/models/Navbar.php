<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 29/11/2018
 * Time: 19:20
 */

class Navbar{
    private $pdo;
    private $log;
    public function __construct(){
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }
    //Listar Los Menus Disponibles por Rol
    public function listMenu($id_role){
        try{
            $sql = "select m.id_menu, m.menu_name, m.menu_controller, m.menu_icon from role r inner join rolemenu r2 on r.id_role = r2.id_role inner join menu m on r2.id_menu = m.id_menu where r.id_role = ? and m.menu_status = 1 and m.menu_show = 1 order by m.menu_order asc";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id_role]);
            $result = $stm->fetchAll();
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        return $result;

    }
    //Listar las opciones del menú
    public function listOptions($menu){
        try{
            $sql = "select o.optionm_name, o.optionm_function from menu m inner join optionm o on m.id_menu = o.id_menu where m.id_menu = ? and o.optionm_status = 1 and o.optionm_show = 1 order by o.optionm_order asc";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$menu]);
            $result = $stm->fetchAll();
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        return $result;

    }

}