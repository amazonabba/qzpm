<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 12/02/2019
 * Time: 17:43
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
                    <h5>Roles con Acceso a Menú:</h5><h3><?php echo $menuname;?></h3>
                </div>
            </div>
        </div>
        <div class="col-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <input class="form-control" type="password" id="password"  placeholder="Ingrese su Contraseña AQUÍ para Permitir Cambios...">
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
                                <th>Rol</th>
                                <th>Descripción</th>
                                <th>¿Con Acceso?</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($menusf as $m){
                                $acceso = array_search($m->id_role, array_column($menust, 'id_role'));
                                if($acceso === false){
                                    $permiso_vista = "<a type=\"button\" class=\"btn btn-xs btn-outline-danger\">Sin Acceso</a>";
                                    $opcion_vista = "<a type=\"button\" class=\"btn btn-xs btn-success\" onclick=\"preguntarSiNoAR(" .$id_menu.",". $m->id_role.")\">Permitir Acceso</a>";
                                } else {
                                    $permiso_vista = "<a type=\"button\" class=\"btn btn-xs btn-outline-success\">Con Acceso</a>";
                                    $opcion_vista = "<a type=\"button\" class=\"btn btn-xs btn-danger\" onclick=\"preguntarSiNoDR(" .$id_menu.",". $m->id_role.")\">Eliminar Acceso</a>";
                                }
                                ?>
                                <tr>
                                    <td><?php echo $m->id_role;?></td>
                                    <td><?php echo $m->role_name;?></td>
                                    <td><?php echo $m->role_description;?></td>
                                    <td><?php echo $permiso_vista;?></td>
                                    <td><?php echo $opcion_vista;?></td>
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

