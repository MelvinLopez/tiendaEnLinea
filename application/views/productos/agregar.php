
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  


<center><h4><b>Nuevo producto</b></h4></center>


<form action="<?= base_url('producto/ingresar')?>" method = "POST" enctype="multipart/form-data">
  <input type="hidden" name="id"/>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label> Producto</label>
      <input type="text" name ="nombre" class="form-control" placeholder="Nombre del Producto" required>
    </div>
    <div class="form-group col-md-6">
      <label>Descripcion</label>
      <input class="form-control" type="text" name ="descripcion" placeholder ="Descripcion del Producto" required>
    </div>
  </div>

<!--#########################-->

  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Fecha de llegada</label>
      <input class="form-control" id="mask4" type="date" name ="f_llegada" placeholder = "Fecha de entrega" required>
    </div>
    <div class="form-group col-md-4">
      <label>Fecha de vencimiento</label>
      <input class="form-control" type="date" name ="f_expiracion" placeholder="Fecha de caducación" required>
    </div>
    <div class="form-group col-md-2">
      <label>Precio</label>
      <input class="form-control" type="text" name="precio" placeholder="Precio" required>        
    </div>
    <div class="form-group col-md-2">
      <label>Cantidad</label>
      <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" required>        
    </div>
  </div>

<!--#########################-->

  <div class="form-row">
  

    <div class="form-group col-md-4">
      <label for="inputState">Categoria</label>
     
      <select name="categoria[]" id="framework" class="form-control selectpicker" data-live-search="true" multiple>
     
        <?php foreach ($categoria as $opcion) { ?>
          <option value="<?= $opcion->id ?>"><?= $opcion->nombre ?></option>
        <?php } ?>
      </select>
    </div>



    <div class="form-group col-md-4">
      <label for="archivo">Nombre</label><br/>
      <input class="form-control" type="text" name="img" placeholder="Nombre de la imagen" required>
     
    </div>
    <div class="form-group col-md-">
      <label></label>
      <input required  type="file" name="archivo"/>
      <input type="hidden" name="txturl" />
    </div>
  </div>
  
  <center><button class="btn btn-success" type="submit">Guardar&nbsp;&nbsp;<i class="fas fa-download"></i></button></center>
</form>
<?= $mensagens ?? '' ?>
                    <?= validation_errors() ?>


  
                    </body>
</html>
