<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 05/12/2018
 * Time: 17:44
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
                            <h4 class="header-title">Agregar Nuevo Rol</h4>
                            <div class="form-group">
                                <label class="col-form-label">Nombre Rol</label>
                                <input class="form-control" type="text" id="role_name" placeholder="Ingrese Nombre del Rol...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Descripción Rol</label>
                                <input class="form-control" type="text" id="role_description" placeholder="Ingrese Descripción del Rol...">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="add()"> Agregar Rol</button>
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
<script src="<?php echo _SERVER_ . _JS_;?>role.js"></script>


<?php require _VIEW_PATH_ . 'final.php';?>
