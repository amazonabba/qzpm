<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 27/12/2018
 * Time: 12:44 AM
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
                    <h4 class="header-title">Lista de Personas Registradas</h4>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Fecha Creación</th>
                                <th>Última Inicio Sesión</th>
                                <th>Última Modificación</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $a = 1;
                            foreach ($user as $m){
                                ?>
                                <tr>
                                    <td><?php echo $a;?></td>
                                    <td><?php echo $m->user_nickname;?></td>
                                    <td><?php echo $m->role_name;?></td>
                                    <td><?php echo $m->user_email;?></td>
                                    <td><?php echo ($m->user_status == 1) ? 'HABILITADO' : 'INABILITADO';?></td>
                                    <td><?php echo $m->user_created_at;?></td>
                                    <td><?php echo $m->user_last_login;?></td>
                                    <td><?php echo $m->user_modified_at;?></td>
                                    <td><a type="button" class="btn btn-xs btn-warning btne" href="<?php echo _SERVER_ . 'User/edit/' . $m->id_user;?>" >Editar</a><a type="button" class="btn btn-xs btn-info btne" href="<?php echo _SERVER_ . 'User/changep/' . $m->id_user;?>" >Cambiar Contraseña</a><a type="button" class="btn btn-xs btn-danger" onclick="preguntarSiNoU(<?php echo $m->id_user;?>)">Eliminar</a></td>
                                </tr>
                                <?php
                                $a++;
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
<script src="<?php echo _SERVER_ . _JS_;?>user.js"></script>


<?php require _VIEW_PATH_ . 'final.php';?>
