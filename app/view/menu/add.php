<?php
/**
 * Created by PhpStorm.
 * User: Cesar Jose Ruiz
 * Date: 09/02/2019
 * Time: 1:00
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
                            <h4 class="header-title">Agregar Menú</h4>
                            <div class="form-group">
                                <label class="col-form-label">Nombre Menú</label>
                                <input class="form-control" type="text" id="menu_name"  placeholder="Ingrese Nombre del Menú...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Icono <a href="<?php echo _SERVER_;?>Menu/icons" target="_blank">(Ver Ejemplos Aquí)</a></label>
                                <input class="form-control" type="text" id="menu_icon" value="fa fa-" placeholder="Ingrese Icono del Menú...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nombre Controlador</label>
                                <input class="form-control" type="text" id="menu_controller"  placeholder="Ingrese Controlador del Menú...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Orden Aparición</label>
                                <input class="form-control" type="text" id="menu_order"  placeholder="Ingrese Orden de Aparación del Menú...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Estado</label>
                                <select class="form-control" id="menu_status">
                                    <option value="1">ACTIVO</option>
                                    <option value="0">NO ACTIVO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">¿Visible En Navegación?</label>
                                <select class="form-control" id="menu_show">
                                    <option value="0">NO ACTIVO</option>
                                    <option value="1">ACTIVO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Contraseña De Usuario Actual</label>
                                <input class="form-control" type="password" id="password"  placeholder="Ingrese su Contraseña...">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="save()"> Guardar Menú</button>
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
