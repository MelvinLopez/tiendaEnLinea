
<div class="container">
<div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                <center><h4><b>Pagar</b></h4></center>
                <a class="btn btn-primary" href="<?= base_url('producto/usuario_vista') ?>">Seguir comprando</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
            <table id="Example" width="100%" cellspacing="0">
  
	
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                
            </tr>
        </thead>
        <?php if ($this->session->carrito) {
			$total = 0; ?>
        <?php foreach ($this->session->carrito as $llave => $producto) { ?>
            <tr>
            <td><?= $producto->nombre ?></td>
            <td>$<?= $producto->precio ?></td>
            <td><?= $producto->fcantidad ?></td>
            <td>$<?php $total += $producto->subtotal; echo $producto->subtotal; ?></td>
            
           
        </tr>
    <?php } ?>
    <tr>
        <td colspan="3">Total</td>
        <td>$<?= $total ?></td>
        
    </tr>
    </table>
    <?php } ?>
    </div>
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
                    // Show a success message to the buye
                    window.location = "<?= base_url("carrito/pagar") ?>";

                });
            }
        }).render('#paypal-button-container');
    </script>
    </div>
    </div>
    </center>
 <?php }   ?>

    