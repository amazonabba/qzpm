<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 08/02/2019
 * Time: 18:47
 */
?>

<!-- page title area end -->
<div class="main-content-inner">
    <!-- MAIN CONTENT GOES HERE -->
    <!--Todo tu codigo cool and nice va aqui-->
    <div class="row">
        <!-- Dark table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Lista de Menús Registrados</h4>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Menu</th>
                                <th>Código Icono</th>
                                <th>Imagen Icono</th>
                                <th>Controlador</th>
                                <th>Orden de Aparación</th>
                                <th>Estado</th>
                                <th>Visibilidad</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($menu as $m){
                                ?>
                                <tr>
                                    <td><?php echo $m->id_menu?></td>
                                    <td><?php echo $m->menu_name?></td>
                                    <td><?php echo $m->menu_icon?></td>
                                    <td><i class="<?php echo $m->menu_icon?>"></i></td>
                                    <td><?php echo $m->menu_controller?></td>
                                    <td><?php echo $m->menu_order?></td>
                                    <td><?php echo ($m->menu_status == 1) ? 'ACTIVO' : 'NO ACTIVO';?></td>
                                    <td><?php echo ($m->menu_show == 1) ? 'ACTIVO' : 'NO ACTIVO';?></td>
                                    <td><a type="button" class="btn btn-xs btn-warning btne" href="<?php echo _SERVER_ . 'Menu/edit/' . $m->id_menu;?>" >Editar</a><a type="button" class="btn btn-xs btn-primary btne" href="<?php echo _SERVER_ . 'Menu/role/' . $m->id_menu;?>" >Gestionar Roles</a><a type="button" class="btn btn-xs btn-secondary btne" href="<?php echo _SERVER_ . 'Menu/functions/' . $m->id_menu;?>" >Ver Opciones</a><a type="button" class="btn btn-xs btn-danger" onclick="preguntarSiNo(<?php echo $m->id_menu;?>)">Eliminar</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>


</div>
</div>
<!-- main content area end -->
<!-- footer area start-->
<?php require _VIEW_PATH_ . 'footer.php';?>
<!-- footer area end-->
</div>
<!-- jquery latest version -->
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?php echo _SERVER_ . _JS_;?>domain.js"></script>
<script src="<?php echo _SERVER_ . _JS_;?>menu.js"></script>


<?php require _VIEW_PATH_ . 'final.php';?>

