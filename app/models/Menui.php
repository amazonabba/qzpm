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
    //Listar Los Menus Disponibles por Rol
    public function listMenu($id_role){
        try{
            $sql = "Select m.menu_name, m.menu_icon from role r inner join rolemenu rl on r.id_role = rl.id_role inner join menu m on m.id_menu = rl.id_menu where rl.id_role = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id_role]);
            $result = $stm->fetchAll();
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|listMenu');
            $result = 2;
        }
        return $result;

    }
    //Listar las opciones del menú
    public function listMenuoption($menu){
        try{
            $sql = "Select o.option_name, o.option_url from menu m inner join optionmenu o on o.id_menu = m.id_menu where m.menu_name = ? and o.option_show = 1";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$menu]);
            $result = $stm->fetchAll();
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), 'Rolei|readPermits');
            $result = 2;
        }
        return $result;

    }
    //Funcion para ver si los accesos del usuario estan permitidos
    public function readViewrole($id_role, $view){
        $validate = false;
        try{
            $sql = "Select m.menu_name, o.option_name, o.option_url from role r inner join rolemenu rl on r.id_role = rl.id_role inner join menu m on m.id_menu = rl.id_menu inner join optionmenu o on o.id_menu = m.id_menu where o.option_url = ? and rl.id_role = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$view, $id_role]);
            $result = $stm->fetchAll();
            if(count($result) > 0){
                $validate = true;
            }
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), 'Rolei|readPermits');
            $validate = false;
        }
        return $validate;

    }

}