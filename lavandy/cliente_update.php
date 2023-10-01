<?php include("panel/data/conexion.php"); ?>
<link rel="stylesheet" href="stylos/stylos.css">
<link rel="stylesheet" href="./style.css">

<?php /*if (isset($_GET['id'])) { $id = $_GET['id'];	}  } */?>

<?php 

$query= "SELECT * FROM clientes WHERE id_cliente= $idclup"; 
		$result = mysqli_query($conexion, $query);


if (mysqli_num_rows($result)==1) {
		$filas=mysqli_fetch_array($result);

	$c1 = $filas['id_cliente'];
	$c2 = $filas['cl_nombre'];	
	$c3 = $filas['cl_email'];
	$c4 = $filas['cl_numero'];
	$c5 = $filas['cl_clave'];
	$c6 = $filas['cl_direccion'];
	$c7 = $filas['cl_dni'];

}


?>

<div class="container p-4 mx-auto">
<style>
	.aviso{
		background: #ffff;
		padding-left: 10px;
		border-radius: 0.5em;
		padding-bottom: 10px;

	}
</style>
	<div class="aviso">
		<br>
		<h5>&nbsp<span class="icon-user-check"></span>&nbspMi Cuenta::</h5>
	    <h6>&nbsp &nbsp<span class="icon-cog"></span> Es importante contar con tus datos para una entrega eficiente.</h6> 
	     <h6>&nbsp &nbsp<span class="icon-cog"></span> Confirma tus datos al momento de realizar una compra.</h6>
	     
	</div>
<br>

  <div class="row" >

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " class="colm">

     <form  action="crud_clientes/update.php" method="POST" enctype="multipart/form-data" class="colm">

	  <div class="form-group " >
	    <input class="form-control" type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $c1; ?>">
	     </div>

	  <div class="form-group " >
	    <label for="cl_nombre">Nombre</label>
	    <input class="form-control" type="text" placeholder="Nombre de Usuario" id="cl_nombre" name="cl_nombre" value="<?php echo $c2; ?>">
	    <small id="Help" class="form-text text-muted">Actualizar nombre de usuario.</small>
	  </div>

	  <div class="form-group " >
	    <label for="cl_dni">DNI </label>
	    <input class="form-control" type="number" placeholder="Documento de Identidad" id="cl_dni" name="cl_dni" value="<?php echo $c7; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese su número de documento de indentidad.</small>
	  </div> 

	  <div class="form-group " >
	    <label for="cl_clave">Clave</label>
	    <input class="form-control" type="text" placeholder="Clave de Usuario" id="cl_clave" name="cl_clave" value="<?php echo $c5; ?>"maxlength="8">
	    <small id="Help" class="form-text text-muted">Actualizar clave.</small>
	  </div>

	  <div class="form-group " >
	    <label for="cl_email">Correo</label>
	    <input class="form-control" type="text" placeholder="Correo@mail.com" id="cl_email" name="cl_email" value="<?php echo $c3; ?>">
	    <small id="Help" class="form-text text-muted">Actualizar correo.</small>
	  </div>

	   <div class="form-group " >
	    <label for="cl_numero">Télefono </label>
	    <input class="form-control" type="number" placeholder="Telefono de Contacto" id="cl_numero" name="cl_numero" value="<?php echo $c4; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese teléfono de contacto.</small>
	  </div> 



	  <div class="form-group " >
	    <label for="cl_direccion">Dirección </label>
	    <input class="form-control" type="text" placeholder="Dirección o domicilio fiscal" id="cl_direccion" name="cl_direccion" value="<?php echo $c6; ?>">
	    <small id="Help" class="form-text text-muted">Dirección o domicilio fiscal.</small>
	  </div>	  	  

	  <button type="submit" class="btn btn-dark btn-lg btn-block" id="guardar" name="guardar">ACTUALIZAR</button>

	  <a href="perfil.php" class="btn btn-dark btn-lg btn-block">CANCELAR</a>

	</form>

    </div>
  </div>
</div>


<?php mysqli_close($conexion); ?>
<?php include('panel/includes/footer.php'); ?>