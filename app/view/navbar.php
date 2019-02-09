<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 29/11/2018
 * Time: 10:27
 */
?>

<body>

<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="#"><img src="<?php echo _SERVER_ . _ICON_;?>" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <?php
                        foreach ($navs as $n){
                            $activom = '';
                            if($n->menu_controller == $_SESSION['controlador']){
                                $activom = "class=\"active\"";
                                $_SESSION['controlador'] = $n->menu_name;
                            }
                            ?>
                            <li <?php echo $activom;?>>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="<?php echo $n->menu_icon?>"></i><span><?php echo $n->menu_name?></span></a>
                                <ul class="collapse">
                                    <?php
                                    $option = $this->nav->listOptions($n->id_menu);
                                    foreach ($option as $o){
                                        $activoo = '';
                                        if($o->optionm_function == $_SESSION['accion']){
                                            $activoo = "class=\"active\"";
                                            $_SESSION['accion'] = $o->optionm_name;
                                        }
                                        ?>
                                        <li <?php echo $activoo;?>><a href="<?php echo _SERVER_. $n->menu_controller . '/'. $o->optionm_function;?>"><?php echo $o->optionm_name;?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
