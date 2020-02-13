<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/estilo.css')?>" rel="stylesheet">
     <!-- Custom styles for this page -->
  <link href="<?=base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
   
  


    <title>Tienda Online</title>
    <style>
      .container{
      }
    </style>
    
</head>
<body id="page-top">
    <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?=base_url('categoria/index')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Categorias</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">


<!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">

<?php if($this->session->user){ 
          if ($this->session->user->tipo == 'Administrador') { ?>

            <a class="nav-link" href="<?=base_url('producto/index')?>">

<?php }else { ?>
 <a class="nav-link" href="<?=base_url('producto/usuario_vista')?>">

<?php }


}else { ?>
  
    <a class="nav-link" href="<?=base_url('producto/usuario_vista')?>">
  
<?php } ?>



      <i class="fa fa-bars"></i>
      <span>Productos</span></a>
  </li>

    </a>
  </li>
  

<?php   if($this->session->user){ 
          if ($this->session->user->tipo == 'Administrador') { ?>
         
         <hr class="sidebar-divider">
  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Ingresar</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=base_url('producto/agregar')?>" class="btn btn-primary">Producto</a>
            <a class="collapse-item" href="<?= base_url('Categoria/agregar')?>">Categoria</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item">
    <a class="nav-link" href="<?=base_url('producto/user')?>">
      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
      <span>Usuarios</span></a>
  </li>
<!-- Divider -->
<hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('facturas/ver')?>">
      <i class="fas fa-folder"></i>
      <span>Compras realizadas</span></a>
  </li>

<?php }  }  ?>
  
      
     <!-- Divider -->
     <hr class="sidebar-divider">

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('quees/index')?>">
      <i class="fas fa-fw fa-cog"></i>
      <span>Que es?</span></a>
  </li>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
     
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?= base_url('Buscador/vistaBuscar') ?>" method="post" >
        <div class="input-group">
          <input type="text" name="busqueda" class="form-control bg-light border-0 small" placeholder="Buscar ..." >
          <div class="input-group-append"> 
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

       
        <li>
        <p>
            <div class="btn-group">

            
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" hover="dropdown"><i class="fas fa-cart-plus">&nbsp;Carrito&nbsp;</i><span class="caret"></span></button>
                    <?php
                    //validacion si trae datos la session
                    if($this->session->carrito){
                      $total_c=$total_p=0;

                      //sumando la cantidad de productos y el subtotal
                      foreach ($this->session->carrito as $producto) {
                        $total_c += $producto->fcantidad;
                        $total_p += $producto->subtotal;
                      } ?>
                    <ul class="dropdown-menu"  >
                        <li>Productos: <?= $total_c ?></li>
                        <li>Total: $<?= $total_p ?></a></li>
                        <li class="divider"></li>
                        <li><a class="btn btn-primary" href="<?= base_url('carrito/ver') ?>" class="btn btn_info" >Pagar</a></li>
                    </ul>
                    <?php } ?>
                </div>

          </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            
           

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> 
                  <?= $this->session->user->nombre ?? 'Bienvenido' ?></span>
                <img class="img-profile rounded-circle" src="https://image.shutterstock.com/image-vector/user-icon-person-profile-avatar-260nw-601713017.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

<?php  if(!$this->session->user){  ?>

         
                <a class="dropdown-item" href="<?=base_url('login/index')?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ingresar
                </a>
                <a class="dropdown-item" href="<?=base_url('producto/new_user')?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Registrarse
                </a>
 
 
  
<?php   }   if($this->session->user){ ?>

        <a class="dropdown-item" href="<?= base_url('login/salir')?>">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Salir
        </a>
      </div>

<?php }     ?>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
