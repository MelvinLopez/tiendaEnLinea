
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="product-area pb-80">
                <div class="container">
                    <div class="section-title text-center mb-20">
                        <h2>Carrito de Compra</h2>
                    </div>          

            <div class="product-cart-area hm-3-padding pt-120 pb-130">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Producto</th>
                                            <th class="product-price">Nombre</th>
                                            <th class="product-name">Precio unitario</th>
                                            <th class="product-price">Cantidad</th>
                                            <th class="product-subtotal">Sub Total</th>
                                            
                                            <th class="product-subtotal">delete</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                    <?php if ($this->session->carrito) {
			$total = 0; ?>
        <?php foreach ($this->session->carrito as $llave => $producto) { ?>
      
                         
                      <tr>
                                            <td class="product-thumbnail">
                                                <img src="<?= base_url( $producto->img) ?>" width="100" height="100">
                                            </td>
                                            <td class="product-name">
                                                <?= $producto->nombre ?>
                                            </td>
                                            <td class="product-price"><span class="amount">$<?= $producto->precio ?></span></td>
                                            <td class="product-quantity">
                                            <?= $producto->fcantidad ?>
                                            </td>
                                            <td class="product-subtotal">$<?php $total += $producto->subtotal; echo $producto->subtotal; ?></td>
                                         
                                            <td class="product-cart-icon product-subtotal"><a href='<?= base_url("carrito/eliminar/$llave")  ?>'><i class="ion-ios-trash-outline" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php  } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-shiping-update">
                                <div class="cart-shipping">
                                    <a class="btn-style cr-btn" href="<?= base_url('user_controller/index') ?>">
                                    <span> Seguir comprando </span>
                                    </a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      
                        <div class="col-md-5 col-sm-6">
                            <div class="shop-total">
                                <h3>Tabla de Compra</h3>
                
      
                         
                                <ul>
                                   
                                    <li>
                                        Cantidad de productos
                                        <?php
                                              //validacion si trae datos la session
                                              if($this->session->carrito){
                                                $total_c=$total_p=0;

                                                //sumando la cantidad de productos y el subtotal
                                                foreach ($this->session->carrito as $producto) {
                                                  $total_c += $producto->fcantidad;
                                                  $total_p += $producto->subtotal;
                                                } ?>
                                        <span> <?= $total_c ?></span>
                                        <?php  }  ?>
                                    </li>
                                  
                                    <li class="order-total">
                                        Total
                                        <?php
                                              //validacion si trae datos la session
                                              if($this->session->carrito){ ?>
                                        <span>$<?= $total ?></span>
                                        <?php  }  ?>
                                    </li>
                                </ul>
                            </div> 
                            <?php if ($this->session->user) {  ?>
                            <center>
    <!-- Set up a container element for the button -->
    <div  id="paypal-button-container">
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "<?= $total ?>"
                        }
                    }]
                });
            },
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                      window.location = "<?= base_url("carrito/pagar") ?>";

                });
            }
        }).render('#paypal-button-container');
    </script>
    </div>
    </div>
    </center>
    <?php }else { ?>
        <a class="btn-style cr-btn" href="<?= base_url('user_controller/login') ?>">
                                    <span> Iniciar Sesion para Pagar </span>
                                    </a>
    <?php } ?>
                            <div class="continue-shopping-btn text-center">
                            <a class="btn-style cr-btn" href="<?= base_url('user_controller/index') ?>">Continuar Comprando</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>