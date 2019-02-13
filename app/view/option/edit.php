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
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Editar Opción</h4>
                            <div class="form-group">
                                <label class="col-form-label">Nombre Opción</label>
                                <input class="form-control" type="text" id="optionm_name" value="<?php echo $opt->optionm_name?>"  placeholder="Ingrese Nombre de la Opción...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nombre Función</label>
                                <input class="form-control" type="text" id="optionm_function" value="<?php echo $opt->optionm_function?>"  placeholder="Ingrese Nombre de Función...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">¿Mostrar en Opciones?</label>
                                <select class="form-control" id="optionm_show">
                                    <option <?php echo ($opt->optionm_show == 1) ? 'selected' : '';?> value="1">SI</option>
                                    <option <?php echo ($opt->optionm_show == 0) ? 'selected' : '';?> value="0">NO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Estado</label>
                                <select class="form-control" id="optionm_status">
                                    <option <?php echo ($opt->optionm_status == 1) ? 'selected' : '';?> value="1">HABILITADO</option>
                                    <option <?php echo ($opt->optionm_status == 0) ? 'selected' : '';?> value="0">DESHABILITADO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Orden</label>
                                <input class="form-control" type="text" id="optionm_order" value="<?php echo $opt->optionm_order?>"  placeholder="Ingrese Número de Orden">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Contraseña De Usuario Actual</label>
                                <input class="form-control" type="password" id="password"  placeholder="Ingrese su Contraseña...">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="savef()"> Guardar Opción</button>
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
<script src="<?php echo _SERVER_ . _JS_;?>menu.js"></script>


<?php require _VIEW_PATH_ . 'final.php';?>
