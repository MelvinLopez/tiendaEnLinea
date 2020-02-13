
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <tr>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Fecha de llegada</th>
                <th>Fecha de vencimiento</th>
                <th>Precio</th>
                <th colspan = "2">Opciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php foreach ($productos as $producto) {?>
            <tr>
            <?php if ($producto->estado == 1) { ?>
                <td><?=$producto->nombre?></td>
                <td><?=$producto->descripcion?></td>
                <td><?=$producto->cantidad?></td>
                <td><?=$producto->f_llegada?></td>
                <td><?=$producto->f_expiracion?></td>
                <td>$<?=$producto->precio?></td>
                <td><a class="nav-link" href="<?= base_url('producto/agregar/'.$producto->id)?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="nav-link" href="<?= base_url('producto/eliminar/'.$producto->id)?>"><i class="far fa-trash-alt"></i></a></td>

            </tr>
            </tbody>
                      
                <?php } }?>
</table>

            </div>
            </div>
          </div>

        </div>
<?= $this->pagination->create_links() ?>
