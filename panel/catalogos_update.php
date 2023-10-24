<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('menubar.php'); ?>
<link rel="stylesheet" href="stylos/stylos.css">
<?php include("data/conexion.php"); ?>

<?php 

if (isset($_GET['id'])) {
$id = $_GET['id'];
/*---query ---*/
$query= "SELECT * FROM catalogos WHERE id_catalogo = $id";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

	if (mysqli_num_rows($result)==1) {
		/*---almacenamos en un array ---*/
		$filas=mysqli_fetch_array($result);

		/*---recorre el resultado ---*/
		/*while($filas=mysqli_fetch_assoc($result));*/
		$c3 = $filas ['cat_nombre']; 
		$c4 = $filas ['cat_imagen']; 
		$c5 = $filas ['cat_activo'];

	}
}
?>
<?php if ($filas ['cat_activo']=="SI"){
	$activo = "NO";
	 }
	 if ($filas ['cat_activo']=="NO"){
	$activo = "SI";
 	} 

 ?>





<div class="container p-3">
<h4> <?php echo $filas ['cat_nombre'] ?> </h4>

  <div class="row" >
    <div class="colm" class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" >
        <div class="text-center">
      	    
      	<img src="<?php echo $filas ['cat_imagen'] ?>" width="300" heigth="350" > 
    	</div>
    </div>
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
    <div class="col align-self-center">
          
	<form  action="crud_catalogos/update.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" class="colm">

	  <div class="form-group" >
	    <label for="cat_nombre">Nombre</label>
	    <input class="form-control" type="text" placeholder="cat_nombre" id="cat_nombre" name="cat_nombre" value="<?php echo $c3; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese el Nombre del catalogo.</small>
	  </div>

	  <div class="form-group" >
	    <label for="cat_imagen">Imagen</label>
	    <input class="form-control" type="file" id="cat_imagen" name="cat_imagen" >
	    <input class="form-control" type="hidden"  id="cat_imag" name="cat_imag" value="<?php echo $c4; ?>"readonly >
	    <small id="Help" class="form-text text-muted">Sube imagen de catalogo.</small>
	  </div>




	  <div class="form-group" >
	    <label for="cat_activo">Activo</label>

	    <select class="custom-select mr-sm-2" id="cat_activo" name="cat_activo">
        <option value="<?php echo $c5; ?>" selected><?php echo $c5; ?></option>
        <option value="<?php echo $activo; ?>"><?php echo $activo; ?></option>
      
        </select>

	    <small id="Help" class="form-text text-muted">Activar o desactivar el catalogo.</small>
	  </div>

	  <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">ACTUALIZAR</button>
	  <br>
	  <a href="catalogos-create-read.php" class="btn btn-primary btn-lg btn-block">CANCELAR</a>
	</form> 

    </div>
</div>
  </div>
</div>
<?php mysqli_close($conexion); ?>
<?php include('includes/footer.php'); ?>




