<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../data/conexion.php"); ?>

<?php include('../menubar.php'); ?>
   <?/*---formulario tabla---*/?>

<form  action="crud_articulos/create.php" method="POST" enctype="multipart/form-data" class="colm">
  <div class="form-group" >
    <label for="art_imagen">Imagen del producto.</label>
    <input class="form-control" type="file" name="art_imagen">
    <small id="Help" class="form-text text-muted">Sube imagen del producto.</small>
    <input class="form-control"  type="hidden" id="id_user" name="id_user" value="<?php echo $id_userup ; ?> " readonly>
  </div>

  <div class="form-group" >
    <label for="art_nombre">Nombre del producto.</label>
    <input class="form-control" type="text" placeholder="Nombre de producto" id="art_nombre" name="art_nombre" required>
    <small id="Help" class="form-text text-muted">Nombre del producto.</small>
  </div>

  <div class="form-group" >
    <label for="art_codigo">Codigo del producto.</label>
    <input class="form-control" type="text" placeholder="Codigo de producto" id="art_codigo" name="art_codigo" maxlength="8" required>
    <small id="Help" class="form-text text-muted">Ingrese Codigo de producto, puede tener hasta 8 digitos entre Numeros y Letras.</small>
  </div>


<div class="form-group">
<label for="id_catalogo">Catálogo al que pertenese el producto.</label>
  <select class="custom-select" id="id_catalogo" name="id_catalogo" required>
    <option selected></option>
    <?php 
      $query="SELECT *FROM catalogos WHERE id_user=$id_userup";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['id_catalogo']?>" >
      <?php echo $filas ['cat_nombre']  ?>
    </option>
    <?php } ?>

  </select>
  <small id="Help" class="form-text text-muted">Elija el cátalogo al que pertenese el producto.</small>

</div>
      <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">CREAR PRODUCTO</button>
  
</form>



<?php include('../includes/footer.php'); ?>