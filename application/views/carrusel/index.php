<div class="p-3 mb-2 bg-light text-dark">

    <?php foreach ($carrusel as $value) { ?>
        <div class="row">
            <div class="col-6 col-md-4">
            <h6>ID <?= $value->id?> </h6>
            <a href="<?= base_url('Carrusel_Controller/accion/'), $value->id ?>" class="btn btn-outline-info"> Editar</a>&nbsp;&nbsp;
            <a href="<?= base_url('Carrusel_Controller/Eliminar/'), $value->id ?>" class="btn btn-outline-danger"> Eliminar</a>
            
             
            
            </div>
            <div class="col-6 col-md-4">
        
                <?php   
                    if ($value->descripcion == '') {
                    echo '<h6>Sin Descripción..</h6>';
                    }else { ?>
                        <h6>Descripción :&nbsp;<?= $value->descripcion ?></h6>
            <?php   } ?>

            </div>
            <div class="col-6 col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="<?= base_url($value->img) ?>" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
    <?php } ?>
    <a href="<?= base_url('Carrusel_Controller/accion') ?>" class="btn btn-outline-warning">Agregar</a>
    </div>
