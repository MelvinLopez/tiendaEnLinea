<div class="container-fluid">
       
                  <h6 class="m-0 font-weight-bold text-primary"><center>Facturas</center></h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
            <table class="table" width="100%" cellspacing="0">

  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo</th>
      <th scope="col">Fecha de Creación</th>
      <th scope="col">Total</th>
     
    </tr>
  </thead>
  <tbody>
  <?php foreach ($info as $datos) { ?>
    <tr>
      <td><?= $datos->id ?></td>
      <td><?= $datos->nombre ?></td>
      <td><?= $datos->correo ?></td>
      <td><?= $datos->f_creacion ?></td>
      <td><?= $datos->total ?></td>
    
 
<?php } ?>

     </tr>
</tbody>