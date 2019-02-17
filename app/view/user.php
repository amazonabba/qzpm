<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 29/11/2018
 * Time: 11:20
 */
?>

<!-- main content area start -->
<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="search-box pull-left">
                    <!--<form action="#">
                        <input type="text" name="search" placeholder="Search..." required>
                        <i class="ti-search"></i>
                    </form>-->
                </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">
                    <li id="full-view"><i class="ti-fullscreen"></i></li>
                    <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                    <!--<li class="settings-btn">
                        <i class="ti-settings"></i>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
    <!-- header area end -->
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left"><?php echo $_SESSION['controlador'];?></h4>
                    <!--<ul class="breadcrumbs pull-left">
                        <li><a href="#"><?php echo $_SESSION['accion'];?></a></li>
                        <li><span><?php echo $_SESSION['controlador'];?></span></li>
                    </ul>-->
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="<?php echo _SERVER_;?><?php echo $this->crypt->decrypt($_SESSION['user_image'],_PASS_);?>" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->crypt->decrypt($_SESSION['user_nickname'],_PASS_);?><i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo _SERVER_;?>Edit/info">Editar Datos Personales</a>
                        <a class="dropdown-item" href="<?php echo _SERVER_;?>Edit/changeUser">Cambiar Nombre de Usuario</a>
                        <a class="dropdown-item" href="<?php echo _SERVER_;?>Edit/changepass">Cambiar Contraseña</a>
                        <a class="dropdown-item" href="<?php echo _SERVER_;?>api/Logout/singOut">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
