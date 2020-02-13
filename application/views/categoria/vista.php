<div class="container-fluid">
<div class="row">

<?php 
    foreach ($productos as $datos) { ?>
 
<div class="card" style="width: 11rem;">
    
<button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal<?= $datos->id ?>"><img src="<?=base_url($datos->img)?>" class="img-thumbnail" alt="Responsive image"/></button>

    <div class="card-body" >

    <p class='card-text'><?= $datos->nombre ?></p>
    <p class="text-decoration-none" style="color: #690f11; font-family: 'Roboto', sans-serif;">$<?= $datos->precio ?></p>
    
</div>

</div>
 <?php }  ?>

 </div>

<!-- Modal -->
<?php foreach ($productos as $datos) { ?>
<div class="modal fade" id="exampleModal<?= $datos->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <center> TIENDA ONLINE </center></h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
   
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= base_url($datos->img ) ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $datos->nombre ?></h5>
        <p class="card-text"><?= $datos->descripcion ?></p>
       
        <form method="post" action='<?= base_url("carrito/agregar") ?>'>
            <input type="hidden" name="id" value="<?= $datos->id ?>" />
            <div class="row">
            <div class="col">
            <p class="text-decoration-none" style="color: #690f11; font-family: 'Roboto', sans-serif;">$<?= $datos->precio ?></p>
            <input class="form-control" type="number" name="cantidad" value="1" min="1" max="<?= $datos->cantidad ?>"/>
            </div>
            <div class="col">
            <button type="submit" class="btn btn-success">Agregar&nbsp;<i class="fas fa-cart-plus"></i></button>
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>










      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</div>
