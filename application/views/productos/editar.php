

<center><h4><b>Editar Producto</b></h4></center>

<form action="<?= base_url('producto/Actualizar')?>" method = "POST" enctype="multipart/form-data" novalidate>
  <input type="hidden" name="id" value = "<?= $producto->id ?? '' ?>"/>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label> Producto</label>
      <input type="text" name ="nombre" class="form-control" value="<?=$producto->nombre??''?>" placeholder="Nombre del Producto" required>
    </div>
    <div class="form-group col-md-6">
      <label>Descripcion</label>
      <input class="form-control" type="text" name ="descripcion" placeholder ="Descripcion del Producto" value="<?=$producto->descripcion??''?>" required>
    </div>
  </div>

<!--#########################-->

  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Fecha de llegada</label>
      <input class="form-control"  id="date" type="date" name ="f_llegada" placeholder = "Fecha de entrega" value="<?=$producto->f_llegada??''?>" required>
    </div>
    <div class="form-group col-md-4">
      <label>Fecha de vencimiento</label>
      <input class="form-control" type="date" name ="f_expiracion" placeholder="Fecha de caducación" value="<?=$producto->f_expiracion??''?>" required>
    </div>
    <div class="form-group col-md-2">
      <label>Precio</label>
      <input class="form-control" type="text" name="precio" placeholder="Precio" value="<?=$producto->precio??''?>" required>        
    </div>
    <div class="form-group col-md-2">
      <label>Cantidad</label>
      <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" value="<?=$producto->cantidad??''?>" required>        
    </div>
  </div>

<!--#########################-->

  <div class="form-row">





    <div class="form-group col-md-4">
      <label for="txtnombre">Nombre</label><br/>
      <input class="form-control" type="text" name="txtnombre" value="<?= explode('.',explode('/', $producto->img)[2])[0] ?? '' ?>" placeholder="Nombre de la imagen" required>
     
    </div>
    <div class="form-group col-md-">
      <label></label>
      <input required  type="file" name="foto" id="foto"/>
      <input type="hidden" name="txturl" value="<?= $producto->img ?? '' ?>" />
    </div>
  </div>
  
  <center><button class="btn btn-success" type="submit">Guardar&nbsp;&nbsp;<i class="fas fa-download"></i></button></center>
</form>

                    <?= validation_errors() ?>


