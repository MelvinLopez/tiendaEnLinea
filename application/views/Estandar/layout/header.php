<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>FalseShop.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="Estandar/assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/animate.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/owl.carousel.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/chosen.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/themify-icons.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/ionicons.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/meanmenu.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/bundle.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/style.css') ?>">
        <link rel="stylesheet" href="<?= base_url('Estandar/assets/css/responsive.css') ?>">
        <script src="<?= base_url('Estandar/assets/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
    </head>
    <body>
        <div class="wrapper">
            <!-- header start -->
            <header>
                <div class="header-area transparent-bar">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-lg-8 col-md-8 d-none d-md-block">
                                <div class="logo-menu-wrapper text-center">
                                   
                                    <div class="main-menu">
                                        <nav>
                                            <ul>
                                                <li><a href="<?= base_url('user_controller/index') ?>">Inicio</a>
                                                </li>
                                                <li><a href="<?=base_url('user_controller/productos')?>">Productos <i class="ion-ios-arrow-down"></i></a>
                                                    <ul>
                                                    <?php 
                                                    for ($i=0; $i < count($productoss); $i++) { 
                                                     if ($i <= 12) { ?>
                                                     
                                                        <li><a href="<?= base_url('user_controller/producto/').$productoss[$i]->id?>"><?= $productoss[$i]->nombre ?></a></li>
                                                        <?php if ($i == 12) { ?>
                                                          <li><a href="<?= base_url('user_controller/productos') ?>">Ver Mas Productos</a></li>
                                                       <?php }
                                                        } } ?>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Categorias <i class="ion-ios-arrow-down"></i></a>
                                                    <ul>
                                                            <?php foreach ($categorias as $value) {
                                                              if ($value->estado == 1) { ?>
                                                               
                                                        <li><a href="<?= base_url('user_controller/productos_categoria/').$value->id?>"><?= $value->nombre ?></a></li>
                                                       

                                                            <?php }  } ?>
                                                    </ul>
                                                </li>
                                                <li><a href="#">blog <i class="ion-ios-arrow-down"></i></a>
                                                    <ul>
                                                        <li><a href="<?= base_url('quees/index') ?>">about us</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-7 col-7">
                                <div class="header-site-icon">
                                    <div class="header-search same-style">
                                        <button class="sidebar-trigger-search">
                                            <span class="ti-search"></span>
                                        </button>
                                    </div>
                                    <div class="header-login same-style">

                                    <?php if (!$this->session->user) { ?>

                                        <a href="<?= base_url('user_controller/login') ?>" title="Iniciar session">
                                            <span class="ti-user"></span>
                                        </a>

                                    <?php }if($this->session->user){ ?> 

                                        <a href="<?= base_url('login/salir')?>" title="Salir">
                                        <span class="ti-shift-right"></span>
                                        </a>

                                        <a href="<?= base_url('user_controller/editinfouser')?>" title="Configuracion">
                                        <span class="ti-settings"></span>
                                        </a>

                                    <?php }     ?>


                                    </div>
                                    <div class="header-cart same-style">
                                        <button class="sidebar-trigger">
                                            <i class="ti-shopping-cart"></i>

                                            <?php
                                              //validacion si trae datos la session
                                              if($this->session->carrito){
                                                $total_c=$total_p=0;

                                                //sumando la cantidad de productos y el subtotal
                                                foreach ($this->session->carrito as $producto) {
                                                  $total_c += $producto->fcantidad;
                                                  $total_p += $producto->subtotal;
                                                } ?>
                                            <span class="count-style"><?= $total_c ?></span>

                                                  <?php  }  ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
<!--##########################################  Fin Vista PC  #############################################-->

<!--#######################################  Inicio de vista para celular  ##########################################-->
                            <div class="mobile-menu-area col-12">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <li><a href="<?= base_url('user_controller/index') ?>">Inicio</a>
                                                
                                            </li>
                                            <li><a href="#">Productos</a>
                                                <ul>

                                                <?php 
                                                    for ($i=0; $i < count($productoss); $i++) { 
                                                     if ($i <= 12) { ?>
                                                     
                                                        <li><a href="<?= base_url('user_controller/producto/').$productoss[$i]->id?>"><?= $productoss[$i]->nombre ?></a></li>
                                                        <?php if ($i == 12) { ?>
                                                          <li><a href="<?= base_url('user_controller/productos') ?>">Ver Mas Productos</a></li>
                                                       <?php }
                                                        } } ?>
                                                </ul>
                                            </li>
                                            <li><a href="">Categorias</a>
                                                <ul>


                                                     <?php foreach ($categorias as $value) {
                                                              if ($value->estado == 1) { ?>
                                                               
                                                        <li><a href="<?= base_url('user_controller/productos_categoria/').$value->id?>"><?= $value->nombre ?></a></li>
                                                       

                                                            <?php }  } ?>
                                                 
                                                   
                                                </ul>
                                            </li>
                                            <li><a href="#">blog</a>
                                                    <ul>
                                                        <li><a href="<?= base_url('quees/index') ?>">about us</a></li>
                                                    </ul>
                                                </li>
                    
                                        </ul>
                                    </nav>                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
<!--####################################### sidebar-cart start ###########################################-->
          <div class="sidebar-cart onepage-sidebar-area">
                <div class="wrap-sidebar">
                    <div class="sidebar-cart-all">
                        <div class="sidebar-cart-icon">
                            <button class="op-sidebar-close"><span class="ti-close"></span></button>
                        </div>
                        <div class="cart-content">
                            <h3>FalseShop.com Carrito</h3>
                            <ul>
                                  <?php
                          //validacion si trae datos la session
                          if($this->session->carrito){
                            $total_c=$total_p=0;

                            //sumando la cantidad de productos y el subtotal
                            foreach ($this->session->carrito as $producto) {
                              $total_c += $producto->fcantidad;
                              $total_p += $producto->subtotal;
                            } ?>



                              <?php $total = 0;
                               foreach ($this->session->carrito as $llave => $producto) { ?>
          
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img src="<?= base_url($producto->img) ?>" width="100" height="100"></a>
                                    </div>
                                    <div class="cart-title">
                                        <h3><a href="#"><?= $producto->nombre ?> </a></h3>
                                        <h3>$<?= $producto->precio ?></h3>
                                        <h3>Sub Total: $<?php $total += $producto->subtotal; echo $producto->subtotal; ?></h3>
                                        <span><?= $producto->fcantidad ?></span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="<?= base_url("carrito/eliminar/$llave")  ?>"><i class="ti-trash"></i></a>
                                    </div>
                                </li>

                                <?php } ?>

                                <li class="single-product-cart">
                                    <div class="cart-total">
                                        <h4>Total : <span>$<?= $total ?> </span></h4>
                                    </div>
                                </li>
                               
                            </ul>
                            <div class="cart-checkout-btn">
                                <a class="cr-btn btn-style cart-btn-style" href="<?= base_url('user_controller/carrito_vew') ?>"><span>Ver Carrito</span></a>
                                <a class="no-mrg cr-btn btn-style cart-btn-style" href="<?= base_url('carrito/pagar') ?>"><span>Pagar</span></a>
                            </div>
                       
                        <?php }else { ?>
                           <li class="single-product-cart">
                           <div class="cart-total">
                               <h4>Has Tu compra <span></span></h4>
                           </div>
                       </li>
                       <div class="cart-checkout-btn">
                                <a class="no-mrg cr-btn btn-style cart-btn-style" href="<?= base_url('user_controller/productos')?>"><span>Ver todos nuestros productos</span></a>
                            </div>
                      <?php  } ?>
                      </div>
                    </div>
                </div>
            </div>
 <!--#################################### fin carrito #########################################################-->

 <!--#################################### inicio buscador #########################################################-->
 <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="ti-close"></span></button>
                </div>

                <div class="sidebar-search-input">
                    <form  action="<?= base_url('Buscador/estandarshare') ?>" method="post">
                        <div class="form-search">
                            <input name="busqueda"  class="input-text"  placeholder="Buscar ..." type="search">
                            <button type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

          
          

<!--#######################################  Fin buscador  ##########################################-->


