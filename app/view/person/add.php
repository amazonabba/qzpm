<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 20/12/2018
 * Time: 16:11
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
                            <h4 class="header-title">Agregar Nueva Persona</h4>
                            <div class="form-group">
                                <label class="col-form-label">Nombres</label>
                                <input class="form-control" type="text" id="person_name" placeholder="Ingrese Nombres...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Apellidos</label>
                                <input class="form-control" type="text" id="person_surname" placeholder="Ingrese Apellidos...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha de Nacimiento</label>
                                <input class="form-control" type="date" id="person_birth" placeholder="Ingrese Apellido...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Número de Teléfono</label>
                                <input class="form-control" type="text" id="person_number_phone" onkeypress="return valida(event)" placeholder="Ingrese Teléfono...">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Género</label>
                                <select class="form-control" id="person_genre">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dirección Casa</label>
                                <input class="form-control" type="text" id="person_address" placeholder="Ingrese Dirección...">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="save()"> Agregar Persona</button>
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
<script src="<?php echo _SERVER_ . _JS_;?>person.js"></script>


<?php require _VIEW_PATH_ . 'final.php';?>
