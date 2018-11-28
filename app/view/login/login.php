<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 26/11/2018
 * Time: 20:24
 */
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo _SERVER_ . _STYLES_;?>rose.png">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/slicknav.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/typography.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/default-css.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/styles.css">
    <link rel="stylesheet" href="<?php echo _SERVER_ . _VIEW_STYLES_;?>css/responsive.css">
    <!-- modernizr css -->
    <script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!-- preloader area start -->
<!--<div id="preloader">
    <div class="loader"></div>
</div>-->
<!-- preloader area end -->
<!-- login area start -->
<div class="login-area login-s2">
    <div class="container">
        <div class="login-box ptb--100">
            <form>
                <div class="login-form-head">
                    <h4>Inicio de Sesión</h4>
                    <p>¡Hola! Ingresa Tus Credenciales Para Continuar</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" id="exampleInputEmail1">
                        <i class="ti-user"></i>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" id="exampleInputPassword1">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Recordarme</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Ingresar<i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/popper.min.js"></script>
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/bootstrap.min.js"></script>
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/owl.carousel.min.js"></script>
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/metisMenu.min.js"></script>
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/plugins.js"></script>
<script src="<?php echo _SERVER_ . _VIEW_STYLES_;?>js/scripts.js"></script>
</body>

</html>
