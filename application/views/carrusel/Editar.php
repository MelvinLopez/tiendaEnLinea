<div class="p-3 mb-2 bg-light text-dark">

 
        <div class="row">
            <div class="col-6 col-md-4">   
            </div>



    <div class="col-6 col-md-4">


    <form action="<?= base_url('Carrusel_Controller/Editar') ?>" method="post" enctype="multipart/form-data" novalidate>

        <div class="card" style="width: 18rem;">
        <img src="<?= base_url($Carrusel->img) ?>" class="card-img-top" alt="...">
            <div class="card-body">

                <input type="hidden" name="id" value="<?= $Carrusel->id ?>">
                <label>Descripción del Carrusel</label>
                <input class="form-control"  type="text" name="descripcion" value="<?= $Carrusel->descripcion ?? '' ?>" required>
                <label>Nombre de la IMG</label>
                <input class="form-control"  name="txtnombre" value="<?= explode('.',explode('/', $Carrusel->img)[2])[0] ?? '' ?>" placeholder="Nombre de la imagen" required><br>
                <input required  type="file" name="foto" id="foto"/>
                <input type="hidden" name="txturl" value="<?= $Carrusel->img ?? '' ?>" />
      
                <button class="btn btn-success" type="submit">Guardar&nbsp;<i class="fas fa-download"></i></button>
       
    </form>
            </div>
            <?= validation_errors() ?>
        </div>
    </div>


        </div>
   
  </div>

