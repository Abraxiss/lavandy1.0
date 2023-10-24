<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('menubar.php'); ?>
<link rel="stylesheet" href="stylos/stylos.css">
<?php include("data/conexion.php"); ?>

<?php 

if (isset($_GET['id'])) {
$id = $_GET['id'];
/*---query ---*/
$query= "SELECT * FROM articulos WHERE id_articulo= $id";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

	if (mysqli_num_rows($result)==1) {
		/*---almacenamos en un array ---*/
		$filas=mysqli_fetch_array($result);

		/*---recorre el resultado ---*/
		/*while($filas=mysqli_fetch_assoc($result));*/
		
	$c3 = $filas['id_catalogo'];
	$c4 = $filas['art_nombre'];
	$c5 = $filas['art_precio'];
	$c6 = $filas['art_stock'];
	$c7 = $filas['art_descuento'];
	$c8 = $filas['art_descripcion'];
	$c9 = $filas['art_imagen'];
	$c10 = $filas['art_imagen1'];
	$c11 = $filas['art_imagen2'];
	$c12 = $filas['art_imagen3'];
	$c13 = $filas['art_activo'];
	$c14 = $filas['art_codigo'];

	}
}
?>

<?php if ($filas ['art_activo']=="SI"){
	$activo = "NO";
	 }
	 if ($filas ['art_activo']=="NO"){
	$activo = "SI";
 	} 

 ?>

<?php 
  $query2="SELECT *FROM catalogos WHERE id_user=$id_userup ";
  $result2=mysqli_query($conexion, $query2);
?>
<?php 
  $query3="select *from catalogos WHERE id_catalogo= $c3";
  $result3=mysqli_query($conexion, $query3);
  $filas2=mysqli_fetch_assoc($result3);
  $Ncat=$filas2['cat_nombre'];
?>



<div class="container p-3 mx-auto">
<h4> <?php echo $filas ['art_nombre'] ?> </h4>
  <div class="row" >
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" >
     
        <div class="text-center" >
       	<img class="fmg" src="<?php echo $filas ['art_imagen'] ?>" width="200" heigth="150" > 
    	<img class="fmg" src="<?php echo $filas ['art_imagen1'] ?>" width="200" heigth="150" > 
    	<img class="fmg" src="<?php echo $filas ['art_imagen2'] ?>" width="200" heigth="150" >
    	<img class="fmg" src="<?php echo $filas ['art_imagen3'] ?>" width="200" heigth="150" >
		</div>

    </div>
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">

    <form accept-charset="UTF-8"  action="crud_articulos/update.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" class="colm">

	  <div class="form-group " >

	    <label for="id_catalogo">Catalogo</label>
	    
	     <select class="custom-select" id="id_catalogo" name="id_catalogo">
    		<option value="<?php echo $c3; ?>" selected><?php echo $Ncat; ?></option>
    		<?php while($filas=mysqli_fetch_assoc($result2)) { ?>
      		<option value="<?php echo $filas ['id_catalogo']?>" >
      		<?php echo $filas ['cat_nombre']  ?>
    		</option>
    		<?php } ?>
  		</select>

	    <small id="Help" class="form-text text-muted">Elija el Catalogo del Articulos.</small>

	  </div>

	  <div class="form-group " >
	    <label for="art_nombre">Nombre</label>
	    <input class="form-control" type="text"  id="art_nombre" name="art_nombre" value="<?php echo $c4; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese el Nombre del Articulo.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_codigo">Codigo</label>
	    <input class="form-control" type="text"  id="art_codigo" name="art_codigo" maxlength="8" value="<?php echo $c14; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese el codigo del Articulo.</small>
	  </div>
	  
	  <div class="form-group " >
	    <label for="art_precio">Precio</label>
	    <input class="form-control" type="number"  id="art_precio" name="art_precio" maxlength="8" value="<?php echo $c5; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese el Precio del Articulo.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_moneda">Moneda</label>
	    <select class="custom-select" id="art_moneda" name="art_moneda">
<option value="S/.">Perú - S/ - PEN</option>
<option value="$" >Bahamas - $ - BSD</option>
<option value="Bs." >Bolivia - Bs. - BOB</option>
<option value="R$" >Brasil - R$ - BRL</option>
<option value="$" >Chile - $ - CLP</option>
<option value="$" >Colombia - $ - COP</option>
<option value="₡" >Costa Rica - ₡ - CRC</option>
<option value="$" >Cuba - $ - CUP</option>
<option value="kr" >Dinamarca - kr - DKK</option>
<option value="$" >Ecuador - $ - USD</option>
<option value="₡" >El Salvador - ₡ - SVC</option>
<option value="Fr" >Guinea Ecuatorial - Fr - XAF</option>
<option value="Q" >Guatemala - Q - GTQ</option>
<option value="$" >México - $ - MXN</option>
<option value="C$" >Nicaragua - C$ - NIO</option>
<option value="B/." >Panamá - B/. - PAB</option>
<option value="₲" >Paraguay - ₲ - PYG</option>
<option value="€" >España - € - EUR</option>
<option value="$" >Estados Unidos - $ - USD</option>
<option value="$" >Uruguay - $ - UYU</option>
<option value="Bs F" >Venezuela - Bs F - VEF</option>

    		
  		</select>
	    <small id="Help" class="form-text text-muted">Eliga la moneda.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_stock">Stock</label>
	    <input class="form-control" type="number"  id="art_stock" name="art_stock" maxlength="4" value="<?php echo $c6; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese el Stock del Articulo.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_descuento">Descuento</label>
	    <input class="form-control" type="number"  id="art_descuento" name="art_descuento" maxlength="2" value="<?php echo $c7; ?>">
	    <small id="Help" class="form-text text-muted">Ingrese si el Articulo tiene Descuento numero entero sin el simbolo % .</small>
	  </div>	

	     	  

	  <div class="form-group">
	    <label for="art_descripcion">Descripcion</label>
	    <small id="Help" class="form-text text-muted">Caracteristicas del Articulo.</small>
	    <textarea row="3" class="form-control"  id="art_descripcion" name="art_descripcion" > <?php echo $c8; ?>   </textarea> 
	  </div>

	  <div class="form-group " >
	    <label for="art_activo">Activo </label>
	    <select class="custom-select mr-sm-2" id="art_activo" name="art_activo">
        <option value="<?php echo $c13; ?>" selected><?php echo $c13; ?></option>
        <option value="<?php echo $activo; ?>"><?php echo $activo; ?></option>
        </select>
	    <small id="Help" class="form-text text-muted">Activa o Desactiva el Articulo.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_imagen">Imagen Pricipal</label>
	    <input class="form-control" type="file"  id="art_imagen" name="art_imagen" value="<?php echo $c9; ?>">
	    <input class="form-control" type="text" id="art_imag" name="art_imag" value="<?php echo $c9; ?>" readonly>
	    <small id="Help" class="form-text text-muted">Actualiza Imagen Principal del Articulo.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_imagen1">Imagen Secundaria 01</label>
	    <input class="form-control" type="file"  id="art_imagen1" name="art_imagen1" value="<?php echo $c10; ?>">
	    <input class="form-control" type="text" id="art_imag1" name="art_imag1" value="<?php echo $c10; ?>" readonly>
	    <small id="Help" class="form-text text-muted">Actualiza la Imagen 01 del Articulo.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_imagen2">Imagen Secundaria 02</label>
	    <input class="form-control" type="file"  id="art_imagen2" name="art_imagen2" value="<?php echo $c11; ?>">
	    <input class="form-control" type="text" id="art_imag2" name="art_imag2" value="<?php echo $c11; ?>" readonly>
	    <small id="Help" class="form-text text-muted">Actualiza la Imagen 02 del Articulo.</small>
	  </div>

	  <div class="form-group " >
	    <label for="art_imagen3">ImagenSecundaria 03</label>
	    <input class="form-control" type="file"  id="art_imagen3" name="art_imagen3" value="<?php echo $c12; ?>">
	    <input class="form-control" type="text" id="art_imag3" name="art_imag3" value="<?php echo $c12; ?>" readonly>
	    <small id="Help" class="form-text text-muted">Actualiza la Imagen 03 del Articulo.</small>
	  </div>




	  <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">ACTUALIZAR</button>
	  <br>
	  <a href="articulos-create-read.php" class="btn btn-primary btn-lg btn-block">CANCELAR</a>
	</form>

    </div>

  </div>
</div>


<?php include('includes/footer.php'); ?>