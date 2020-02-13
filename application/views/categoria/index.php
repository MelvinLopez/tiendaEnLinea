<!--  Inicio de caarrusel  -->
<?php if ($this->session->user) { 
  if ($this->session->user->tipo == 'Administrador') { ?>
    <a  href=<?= base_url('Carrusel_Controller/index')?>><i class="fas fa-edit">&nbsp;</i></a>
<?php   }
} ?>


<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">


    <?php for ($i = 0; $i < count($carrusel); $i++) { ?>
      <li data-target="#carouselExampleCaptions" data-slide-to="<?= base_url($carrusel[$i]->id) ?>" class="<?= $i == 1 ? 'active' : '' ?>"></li>
      <?php } ?> 
      
    </ol>
    <div class="carousel-inner">
    <?php for ($i = 0; $i < count($carrusel); $i++) { ?>
      <div class="<?= $i == 1 ? 'carousel-item active' : 'carousel-item' ?>">
        <img src="<?= base_url($carrusel[$i]->img) ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5>Sigue con nosotros  </h5>
       
   
          <p><?= $carrusel[$i]->descripcion ?></p>

 

        </div>
      </div>
      <?php } ?> 
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!--  Fin de caarrusel  -->

<!--  Inicio de categorias  -->
<br>
<style>
  .cate{
    text-align:center;
    font-size: 40pt;
    font-weight: 900; 
    font-family: 'PT Sans';
  }

</style>

<div class="cate">Categoria</div>
<br><br>


<div class="row">
<?php foreach ($categorias as $categoria) { ?>
  <?php if ($categoria->estado == 1) { ?>
  <div class="card mb-2" style="max-width: 600px;">
  <div class="row no-gutters">
    <div class="col-md-4">

    <a href='<?= base_url()?>categoria/vista/<?= $categoria->id?>'><img src="<?= base_url($categoria->img) ?>" class="card-img" alt="..."></a>
    </div>
    <div class="col-md-8">
      <div class="card-body">

        <h5 ><?= $categoria->nombre ?></h5> 
      <?php if ($this->session->user) {
      if ($this->session->user->tipo == 'Administrador') { ?>
         
            <a  href='<?= base_url()?>categoria/agregar/<?= $categoria->id?>'><i class="fas fa-edit">&nbsp;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a  onclick="return confirm('Desea eliminar el registro?')" href='<?= base_url("Categoria/eliminar/$categoria->id")?>'><i class="far fa-trash-alt"></i></a>
            
 <?php } } ?>

        </div>
    </div>
  </div>
  
</div>&nbsp;
<?php }  } ?>
</div>
</div>
