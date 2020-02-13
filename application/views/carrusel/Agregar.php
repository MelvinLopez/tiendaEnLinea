
<style>
    .box-form
        {
            box-sizing: content-box;
            width: 30%;
            padding: 30px;
            text-decoration: none;
            position: absolute;
            top: 120px;
            left: 40%;
            border-radius: 10px;
            border:10px;
        }
</style>
<body>
<form action="<?= base_url('Carrusel_Controller/ingresar') ?>" method="post" enctype="multipart/form-data" novalidate>

    <div class="box-form">
        <h4>Nuevo Carrusel </h4>
        
       
           
            <input name="descripcion" class="form-control" placeholder="Descripción"  required><br>

        <h4>Imagen</h4>
            <input class="form-control" name="img" placeholder="Nombre de la imagen" required><br>
            <label for="archivo" required>Subir</label><br/>
            <input type="file" name="archivo" required/><br/>
            <br>
            <button class="btn btn-success" type="submit">Guardar&nbsp;<i class="fas fa-download"></i></button>
       
    </form>
    <?= validation_errors() ?>
   
    </div>

