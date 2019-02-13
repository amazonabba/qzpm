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
        <div class="col-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5>Opciones del Menú: <?php echo $menuname;?></h5>
                </div>
            </div>
        </div>
        <div class="col-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <a type="button" class="btn btn-xs btn-success btne" href="<?php echo _SERVER_ . 'Menu/addf/' . $id_menu;?>" >Agregar Opción</a>
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
                                <th>Nombre</th>
                                <th>Función</th>
                                <th>¿Mostrar en Opciones?</th>
                                <th>Estado</th>
                                <th>Orden</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($options as $m){
                                $show = "<a class=\"btn btn-xs btn-outline-danger\">NO</a>";
                                $status = "<a class=\"btn btn-xs btn-outline-danger\">DESHABILITADO</a>";
                                if($m->optionm_show == 1){
                                    $show = "<a class=\"btn btn-xs btn-outline-success\">SI</a>";
                                }
                                if($m->optionm_status == 1){
                                    $status = "<a class=\"btn btn-xs btn-outline-success\">HABILITADO</a>";
                                }
                                ?>
                                <tr>
                                    <td><?php echo $m->id_optionm?></td>
                                    <td><?php echo $m->optionm_name?></td>
                                    <td><?php echo $m->optionm_function?></td>
                                    <td><?php echo $show?></td>
                                    <td><?php echo $status?></td>
                                    <td><?php echo $m->optionm_order?></td>
                                    <td><a type="button" class="btn btn-xs btn-warning btne" href="<?php echo _SERVER_ . 'Menu/editf/' . $m->id_optionm;?>">Editar</a></td>
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
