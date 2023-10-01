
<?php include('includes/header.php'); ?>

<?php include('menubar.php'); ?>
<link rel="stylesheet" href="stylos/stylos.css">
<link rel="stylesheet" href="./style.css">

<?php include("data/conexion.php"); ?>

<?php /*if (isset($_GET['id'])) { $id = $_GET['id'];	}  } */?>

<?php 

$query= "SELECT * FROM user WHERE id_user= $id_userup"; 
		$result = mysqli_query($conexion, $query);


if (mysqli_num_rows($result)==1) {
		$filas=mysqli_fetch_array($result);

	
	$c2 = $filas['user_nombre'];	
	$c3 = $filas['user_empresa'];
	$c4 = $filas['user_correo'];
	
	$c6 = $filas['user_clave'];
	
	$c8 = $filas['user_portada'];
	$c9 = $filas['user_logo'];
	$c10 = $filas['user_perfil'];
	$c11 = $filas['user_facebook'];
	$c12 = $filas['user_whatsapp'];
	$c13 = $filas['user_instagram'];	
    $c14 = $filas['user_correocop'];
    $c15 = $filas['user_telefono'];
    $c16 = $filas['user_direccion'];

}


?>




<div class="container p-4 mx-auto">
<h4> MI PERFIL </h4>
  <div class="row" >

    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" >
     
        <div class="text-center" >
        		
       	<img class="fmg" src="<?php echo $c8 ?>" width="300" heigth="350" > 
       	<h3>Imagen de Portada</h3>
    	</div>

        <div class="text-center" >
        	
       	<img class="fmg" src="<?php echo $c9 ?>" width="300" heigth="100" > 
       	<h3>Imagen logotipo</h3>
    	</div>    	

    </div>


    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 " class="colm">

     <form  action="crud_user/update.php" method="POST" enctype="multipart/form-data" class="colm">

	  <div class="form-group " >
	    <label for="user_nombre">Nombre</label>
	    <input class="form-control" type="text" placeholder="Nombre de Usuario" id="user_nombre" name="user_nombre" value="<?php echo $c2; ?>">
	    <small id="Help" class="form-text text-muted">Actualizar nombre de usuario.</small>
	  </div>


	  <div class="form-group " >
	    <label for="user_empresa">Empresa</label>
	    			<input class="form-control" type="text" placeholder="Nombre de Empresa" id="user_empresa" name="user_empresa" value="<?php echo $c3; ?>">
	    <small id="Help" class="form-text text-muted">Actualizar nombre de empresa.</small>
	  </div>

	  <div class="form-group " >
	    <label for="user_correo">Correo</label>
	    <input class="form-control" type="text" placeholder="Correo@mail.com" id="user_correo" name="user_correo" value="<?php echo $c4; ?>">
	    <small id="Help" class="form-text text-muted">Actualizar correo.</small>
	  </div>
	  
	  <div class="form-group " >
	    <label for="user_clave">Clave</label>
	    <input class="form-control" type="text" placeholder="Clave de Usuario" id="user_clave" name="user_clave" value="<?php echo $c6; ?>"maxlength="8">
	    <small id="Help" class="form-text text-muted">Actualizar clave.</small>
	  </div>

	  <div class="form-group " >
	    <label for="user_portada">Portada</label>
	    <input class="form-control" type="file" placeholder="Portada" id="user_portada" name="user_portada" >
	    <input class="form-control" type="hidden" id="user_portd" name="user_portd" value="<?php echo $c8; ?>" readonly>
	    <small id="Help" class="form-text text-muted">Actualizar portada (imagen 970 x 90).</small>
	  </div>	

	  <div class="form-group " >
	    <label for="user_logo">Logotipo</label>
	    <input class="form-control" type="file" placeholder="Logotipo" id="user_logo" name="user_logo" >
	    <input class="form-control" type="hidden" id="user_log" name="user_log" value="<?php echo $c9; ?>" readonly>
	    <small id="Help" class="form-text text-muted">Actualizar logotipo (imagen 125 x 125).</small>
	  </div>

   	  

	  <div class="form-group">
	    <label for="user_perfil">Perfil</label>
	    <small id="Help" class="form-text text-muted">Perfil de empresa.</small>
	    <textarea row="3" class="form-control"  placeholder="Perfil de Empresa" id="user_perfil" name="user_perfil" ><?php echo $c10; ?>   </textarea> 
	  </div>

	  <div class="form-group " >
	    <label for="user_facebook">Facebook </label>
	    <input class="form-control" type="text" placeholder="Link Facebook" id="user_facebook" name="user_facebook" value="<?php echo $c11; ?>">
	    <small id="Help" class="form-text text-muted">Link de Fampage en Facebook (https://www.facebook.com/ejemplo).</small>
	  </div>


	  <div class="form-group " >
	    <label for="user_whatsapp">Whatsapp </label>
	    <input class="form-control" type="text" placeholder="Link Whatsapp" id="user_whatsapp" name="user_whatsapp" value="<?php echo $c12; ?>">
	    <small id="Help" class="form-text text-muted">Enlaces para Whatsapp.</small>
	  </div>

	  <div class="form-group " >
	    <label for="user_instagram">Instagram </label>
	    <input class="form-control" type="text" placeholder="Link Instagram" id="user_instagram" name="user_instagram" value="<?php echo $c13; ?>">
	    <small id="Help" class="form-text text-muted">Link de Fampage en Instagram.</small>
	  </div>

	  <div class="form-group " >
	    <label for="user_correocop">Correo electronico corporativo </label>
	    <input class="form-control" type="text" placeholder="corporativo@mail.com" id="user_correocop" name="user_correocop" value="<?php echo $c14; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese su Correo electronico.</small>
	  </div>

	  <div class="form-group " >
	    <label for="user_telefono">Télefono </label>
	    <input class="form-control" type="text" placeholder="Telefono de Contacto" id="user_telefono" name="user_telefono" value="<?php echo $c15; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese su numero teléfonico de contacto.</small>
	  </div>

	  <div class="form-group " >
	    <label for="user_direccion">Dirección </label>
	    <input class="form-control" type="text" placeholder="Direccion o domicilio fiscal" id="user_direccion" name="user_direccion" value="<?php echo $c16; ?>">
	    <small id="Help" class="form-text text-muted">Direccion o domicilio fiscal.</small>
	  </div>	  	  

	  <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">ACTUALIZAR</button>

	  <a href="articulos-create-read.php" class="btn btn-primary btn-lg btn-block">CANCELAR</a>

	</form>

    </div>
  </div>
</div>


<?php mysqli_close($conexion); ?>
<?php include('includes/footer.php'); ?>