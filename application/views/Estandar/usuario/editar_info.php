    <!-- checkout-area start -->
    <div class="checkout-area pt-130 hm-3-padding pb-100">
                <div class="container-fluid">
                   
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">

            <form action="<?= base_url('user_controller/editar_usuario') ?>" method="post" >
            <input type="hidden" name="id" value="<?= $this->session->user->id ?>">
                                <div class="checkbox-form">						
                                    <h3>Nueva Informacion</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <input class="form-control form-control-user" type="text" value="<?= $this->session->user->nombre ?? '' ?>" name="nombre" placeholder="Nombre de usuario" required><br>								   
                                        </div>
                                       
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Correo</label>
                                                <input class="form-control form-control-user" value="<?= $this->session->user->correo ?? '' ?>" type="email" name="correo" placeholder="Correo" required>                      
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Contraseña <span class="required">*</span></label>										
                                                <input type="password" name="pass" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                            <label>Telefono <span class="required">*</span></label>									
                                            <input class="form-control form-control-user" value="<?= $this->session->user->telefono ?>" type="text" name="telefono"  placeholder="Telefono" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="cbox_info" class="checkout-form-list create-account">
                                            </div>
                                        </div>								
                                    </div>
                                    <div class="order-notes">
                                            <div class="checkout-form-list mrg-nn">
                                                <label>Direccion</label>
                                                <input type="text"  value="<?= $this->session->user->direccion ?>" name="direccion"   placeholder="Direccion" />
                                            </div>									
                                        </div>
                                        </form>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Guardar" />
                                        </div>	<br>
                                    <div class="different-address">
                                        <div class="ship-different-title">
                                            <h3>
                                                <label>Quieres borrar Tu Cuenta?</label>
                                                <input id="ship-box" type="checkbox" />
                                            </h3>
                                        </div>
                                        
                                        <div id="ship-box-info" class="row">
                                       <form action="<?= base_url('user_controller/Eliminar/')?>" method="post" novalidate>
                                            <input type="hidden" name="correo" value="<?= $this->session->user->correo ?>">
                                            <input type="hidden" name="id" value="<?= $this->session->user->id ?>">
                                         <button type="submit"   class="btn btn-danger"> Eliminar</button>	
                                         </form>				
                                        </div>
                                       
                                    </div>													
                                </div>
                               
                           
                        </div>	
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="your-order">
                                <h3>Informacion</h3>
                               
                                <div class="payment-method mt-40">
                                    <div class="payment-accordion">
                                        <div class="panel-group" id="faq">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1">Contraseña</a>(Encriptada)</h5>
                                                </div>
                                                <div id="payment-1" class="panel-collapse collapse show">
                                                    <div class="panel-body">
                                                        <p><?= $this->session->user->pass ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Cheque Payment</a></h5>
                                                </div>
                                                <div id="payment-2" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a></h5>
                                                </div>
                                                <div id="payment-3" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- checkout-area end -->	