<div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                <center><h4><b>Carrito</b></h4></center>
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
                <th >Opciones</th>
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
            
            <td><a href='<?= base_url("carrito/eliminar/$llave")  ?>'><i class="far fa-trash-alt"></i></a></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="3">Total</td>
        <td>$<?= $total ?></td>
        <?php if ($this->session->user) { ?>
        <td><a href="<?= base_url('carrito/paypal') ?>">Pagar</a></td>
        <?php }else { ?>
        <td><a href="<?= base_url('login/index') ?>">Iniciar session para pagar</a></td>
    </tr>
    </table>
    <?php } } ?>
    </div>
    </div>
