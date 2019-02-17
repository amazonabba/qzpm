<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 17/02/2019
 * Time: 4:07
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
                            <h4 class="header-title">Editar Contraseña Usuario</h4>
                            <div class="form-group">
                                <label class="col-form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="user_password1" placeholder="Ingresar Contraseña...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Repetir Contraseña</label>
                                <input type="password" class="form-control" id="user_password2" placeholder="Vuelva a Ingresar Contraseña...">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="savec()"> Editar Contraseña</button>
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
<script src="<?php echo _SERVER_ . _JS_;?>edit.js"></script>


<?php require _VIEW_PATH_ . 'final.php';?>

