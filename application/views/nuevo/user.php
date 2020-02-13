<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
<!-- Custom fonts for this template-->
<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        
          <!-- Nested Row within Card Body -->
          <div class="row">
            <img src="<?= base_url('assets/img/bienvenido.jpg')?>" alt="" class="col-lg-6 d-lg-block">
            <div class="col-lg-6">
              <div class="p-5">
                
                <h1 class="h4 text-gray-900 mb-4"><?= $this->session->user ? 'Editar cuenta' : 'Crear cuenta' ?></h1>
               
                <form action="<?= base_url('Producto/ingresarActualizar') ?>" method="post" >
                <input type="hidden" name="id" value="<?= $datos->id ?? '' ?>" >
                    <div class="form-group">
                    <input class="form-control form-control-user" type="text" name="nombre" value="<?= $datos->nombre ?? '' ?>" placeholder="Nombre de usuario" required>
                    </div>
                    <div class="form-group">
                    <input class="form-control form-control-user" type="email" name="correo" value="<?= $datos->correo ?? '' ?>" placeholder="Correo" required>                      
                    </div>
                    <div class="form-group">
                    <input class="form-control form-control-user" type="text" name="telefono" value="<?= $datos->telefono ?? '' ?>" placeholder="Telefono" required>                   
                    </div>
                    <div class="form-group">
                    <input class="form-control form-control-user" type="text" name="direccion" value="<?= $datos->direccion ?? '' ?>" placeholder="Dirreccion" required >    
                    </div>
                    <div class="form-group">
                    <input class="form-control form-control-user" type="password" name="pass" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group">
                    <input class="form-control form-control-user" type="password" name="passconf" placeholder="Confirmar contraseña" required>
                    </div>
                    <br><center><input type="submit" value="Guardar"  class="btn btn-success">&nbsp;
                    <input type="reset" value="Limpiar"  class="btn btn-warning"></center>
                    </form>
                 

                    <?= validation_errors() ?>
                    
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
 

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.min.js')?>"></script>
  

               
            