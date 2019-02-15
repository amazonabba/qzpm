<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 13/02/2019
 * Time: 1:27
 */
?>

<!-- page title area end -->
<div class="main-content-inner">
    <!-- MAIN CONTENT GOES HERE -->
    <!--Todo tu codigo cool and nice va aqui-->
    <div class="row">
        <!-- Dark table start -->
        <div class="col-5 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5>Permisos de la Opción: <?php echo $optionname;?></h5>
                </div>
            </div>
        </div>
        <div class="col-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <a type="button" class="btn btn-xs btn-success btne" href="<?php echo _SERVER_ . 'Menu/addp/' . $id_optionm;?>" >Agregar Permiso</a>
                </div>
            </div>
        </div>
        <div class="col-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <input class="form-control" type="password" id="password"  placeholder="Contraseña Para Cambios AQUÍ">
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>
    <div class="row">
        <!-- Dark table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Acción</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($permits as $m){

                                $status = "<a class=\"btn btn-xs btn-outline-danger\">DESHABILITADO</a>";

                                if($m->permit_status == 1){
                                    $status = "<a class=\"btn btn-xs btn-outline-success\">HABILITADO</a>";
                                }
                                ?>
                                <tr>
                                    <td><?php echo $m->id_permit?></td>
                                    <td><?php echo $m->permit_action?></td>
                                    <td><?php echo $status?></td>
                                    <td><a type="button" class="btn btn-xs btn-warning btne" href="<?php echo _SERVER_ . 'Menu/editp/' . $m->id_permit;?>">Editar</a><a type="button" class="btn btn-xs btn-danger btne" onclick="preguntarSiNoDP(<?php echo $m->id_permit;?>)">Eliminar</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <a type="button" class="btn btn-xs btn-info btne" href="<?php echo _SERVER_ . 'Menu/functions/' . $id_menu;?>" >Volver Al Menú Anterior</a>
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
