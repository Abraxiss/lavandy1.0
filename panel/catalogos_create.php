<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="stylos/stylos.css">
<link rel="stylesheet" href="efectos.css">




   <?/*---formulario tabla---*/?>

<form  action="crud_catalogos/create.php" method="POST" enctype="multipart/form-data" class="colm">

    <div class="form-group" >
      <label for="cat_imagen">Imagen</label>
      <input class="form-control mr-sm-2" type="file" name="cat_imagen" accept="image/*">
      <small id="Help" class="form-text text-muted">Sube imagen del catálogo.</small>
      <input class="form-control"  type="hidden" id="id_user" name="id_user" value="<?php echo $id_userup ; ?> " readonly>
    </div>

    <div class="form-group" >
      <label for="cat_nombre">Nombre</label>
      <input class="form-control" type="text" placeholder="Nombre del catálogo" id="cat_nombre" name="cat_nombre" required>
      <small id="Help" class="form-text text-muted">Ingrese nombre del catalogo.</small>
    </div>

   <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">CREAR CATÁLOGO</button>
   
</form>


<?php include('includes/footer.php'); ?>