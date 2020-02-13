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
    <div class="box-form">
        <h4>Categoria </h4>
        
        <form action="<?= base_url('categoria/Editar') ?>" method="post" enctype="multipart/form-data" novalidate>

            <input type="hidden" name="id" value="<?= $categoria->id ?? ''?>">
            <input name="nombre" class="form-control" placeholder="Nombre" value="<?= $categoria->nombre ?? '' ?>" required><br>

        <h4>Imagen</h4>
            <input class="form-control"  name="txtnombre" value="<?= explode('.',explode('/', $categoria->img)[2])[0] ?? '' ?>" placeholder="Nombre de la imagen" required><br>
            <label for="archivo" required>Subir</label><br/>
            <input required  type="file" name="foto" id="foto"/>
      <input type="hidden" name="txturl" value="<?= $categoria->img ?? '' ?>" />
            <br>
            <button class="btn btn-success" type="submit">Guardar&nbsp;<i class="fas fa-download"></i></button>
       
    </form>
    <?= validation_errors() ?>
   
    </div>

