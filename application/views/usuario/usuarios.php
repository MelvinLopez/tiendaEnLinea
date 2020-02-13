<div class="container-fluid">
       
                  <h6 class="m-0 font-weight-bold text-primary"><center>Usuario</center></h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
            <table class="table" width="100%" cellspacing="0">

  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Direccion</th>
      <th scope="col">Tipo</th>
      <th scope="col" colspan="2">Opciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($info as $datos) { ?>
    <tr> 
    <?php if ($datos->estado == 1) { ?>
      <td><?= $datos->nombre ?></td>
      <td><?= $datos->correo ?></td>
      <td><?= $datos->telefono ?></td>
      <td><?= $datos->direccion ?></td>
      <th scope="row"><?= $datos->tipo ?></th>
      <td><a href="<?= base_url('Producto/editar/'. $datos->id)?>"><i class="fas fa-edit"></a></td>
         <td><a href="<?= base_url('Producto/estado/'. $datos->id) ?>"><i class="far fa-trash-alt"></a></td>
    
  <?php  } ?>
     </tr>
<?php } ?>
</tbody>