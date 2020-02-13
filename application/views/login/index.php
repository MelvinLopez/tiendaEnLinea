 
           
            <div class="login-register-area ptb-130 hm-3-padding">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#lg1">
                                        <h4> Iniciar Sesion </h4>
                                    </a>
                                    <a data-toggle="tab" href="#lg2">
                                        <h4> Registrarse </h4>
                                    </a>
                                </div>
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
                                        <div class="login-form-container">
                                            <div class="login-form">




                <form class="user" action="<?= base_url('login/validar') ?>" method="post">
                    <div class="form-group">
                      <input type="text" name="correo" value="<?= $_COOKIE["correo"] ?? '' ?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="ejemplo@gmail.com" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" value="<?= $_COOKIE["pass"] ?? '' ?>" id="exampleInputPassword" name="pass"  placeholder="*********" required><br>
                      <input type="checkbox" name="recordar" <?= isset($_COOKIE['pass']) ? 'checked' : '' ?>> Recordar contraseña <br><hr>
                    </div>
                   
                    
                    <input type="submit" value="Ingresar" class="btn btn-primary btn-user btn-block">

                  </form>
                  <?= validation_errors() ?>





                                            </div>
                                        </div>
                                    </div>
                                    <div id="lg2" class="tab-pane">
                                        <div class="login-form-container">
                                            <div class="login-form">
                                            <h1 class="h4 text-gray-900 mb-4"><?= $this->session->user ? 'Editar cuenta' : 'Crear cuenta' ?></h1>
               
               <form action="<?= base_url('user_controller/nuevo_usuario') ?>" method="post">
              
                   <div class="form-group">
                   <input class="form-control form-control-user" type="text" name="nombre" placeholder="Nombre de usuario" required>
                   </div>
                   <div class="form-group">
                   <input class="form-control form-control-user" type="email" name="correo" placeholder="Correo" required>                      
                   </div>
                   <div class="form-group">
                   <input class="form-control form-control-user" type="text" name="telefono"  placeholder="Telefono" required>                   
                   </div>
                   <div class="form-group">
                   <input class="form-control form-control-user" type="text" name="direccion"  placeholder="Dirreccion" required >    
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