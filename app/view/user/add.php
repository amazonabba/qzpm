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
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Agregar Nuevo Usuario</h4>
                            <div class="form-group">
                                <label class="col-form-label">Nombre Usuario</label>
                                <input type="text" class="form-control" id="user_nickname" placeholder="Ingresar Nombre Usuario...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Contraseña</label>
                                <input type="password" class="form-control" id="user_password1" placeholder="Ingresar Contraseña...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Repetir Contraseña</label>
                                <input type="password" class="form-control" id="user_password2" placeholder="Vuelva a Ingresar Contraseña...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Correo Usuario</label>
                                <input type="text" class="form-control" id="user_email" placeholder="Ingresar Correo Usuario...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"> Rol Usuario</label>
                                <select id="id_role" class="form-control">
                                    <?php
                                    foreach ($roles as $r){
                                        ?>
                                        <option value="<?php echo $r->id_role;?>"><?php echo $r->role_name;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Persona a Designar Usuario</label>
                                <select class="form-control" id="id_person" >
                                    <option value="">Selecciona una persona...</option>
                                    <?php
                                    foreach ($person as $p){
                                        ?>
                                        <option value="<?php echo $p->id_person;?>"><?php echo $p->person_name . ' '. $p->person_surname;?></option><?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="save()"> Agregar Usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Textual inputs end -->
            </div>
        </div>
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
