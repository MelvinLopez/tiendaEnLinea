<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
               
                <center><h4><b>Factura</b></h4>
                <br> 
                !False Shop le agradece por su compra 
                <br>
                <?= $this->session->user->nombre ?>
                </center>
              <?php  //echo date('D F j, Y'); 
              date_default_timezone_set('America/El_Salvador'); $date= date('d-m-Y h:i:s A') ;
              echo $date;
              ?>
               </div>
                <div class="card-body">
                  <div class="table-responsive">
            <table  id="Example" width="80%" cellspacing="0">
  
	
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Sub total</th>
              
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
        <td colspan="3"><b>Total</b></td>
        <td>$<?= $total ?></td>

    </tr>
    </table>
    <?php } ?>
    </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
