<?php include('./panel/includes/header.php'); ?>
<?php include("./panel/data/conexion.php"); ?>
<link rel="stylesheet" href="stylos/stylos.css">
<link rel="stylesheet" href="efectos.css">

   <?/*---formulario tabla---*/?>

<form  action="crud_pedidos/create.php" method="POST"  class="colm">
  <div class="form-group" >
    <div class="form-group" >
       <input class="form-control" type="hidden" id="id_user" name="id_user" value="1"required>
    </div>

    <div class="form-group" >
       <input class="form-control" type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $idclup  ?>"required>
    </div>

    <div class="form-group" >
       <input class="form-control" type="hidden" id="id_articulo" name="id_articulo" value="<?php echo $filas ['id_articulo']  ?>"required>
    </div>

    <div class="form-group" >
      
      <input class="form-control" type="hidden" id="art_codigo" name="art_codigo" value="<?php echo $filas ['art_codigo']  ?>" required>
      
    </div>


  <br>
    <label for="pd_nombre">Nombre de Contacto:</label>
    <input class="form-control" type="text" placeholder="Nombre de Contacto" id="cl_nombre" name="cl_nombre" value="<?php echo $clup ?>">
    <small id="Help" class="form-text text-muted">Confirme el nombre de la persona con quien nos contactaremos.</small>
  </div>



    <div class="form-group" >
    <label for="pd_cantidad">Cantidad solicitada:</label>
    <input class="form-control" type="number" placeholder="Cantidad a Solicitar" id="pd_cantidad" name="pd_cantidad" required>
    <small id="Help" class="form-text text-muted">Ingrese la cantidad Solicitada.</small>
  </div>

    <div class="form-group" >
    <label for="pd_telefono">Teléfono de contacto:</label>
    <input class="form-control" type="number" placeholder="Telefono de Contacto" id="pd_telefono" name="pd_telefono" value="<?php echo $cl_num ?>" required>
    <small id="Help" class="form-text text-muted">Confirma o ingresa tu número de teléfono.</small>
  </div>

    <div class="form-group" >
    <label for="pd_ubicacion">Ubicación de envio:</label>
    <input class="form-control" type="text" placeholder="Direccion de envio" id="pd_ubicacion" name="pd_ubicacion" value="<?php echo $cl_dir ?>" required>
    <small id="Help" class="form-text text-muted">Confirma o ingresa la dirección de envio.</small>
  </div>


      <button type="submit" class="btn btn-dark btn-lg btn-block" id="guardar" name="guardar">SOLICITAR</button>

      <a href="index.php" class="btn btn-dark btn-lg btn-block">CANCELAR</a>
  
</form>



<?php include('./panel/includes/footer.php'); ?>