<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("data/conexion.php"); ?>



<?/*---------obtiene nombre de catalogo---------------*/?>
<?php if (isset($_POST['id_catalogo'])): ?> 
	    	<?php 
			$cat = $_POST['id_catalogo'];
			$query5= "SELECT cat_nombre FROM catalogos WHERE id_catalogo= $cat";
			$result5=mysqli_query($conexion, $query5);
			$f=mysqli_fetch_assoc($result5);
			$c=$f ['cat_nombre'];
		 ?>
		 <?php else: $c="Todos los productos"  ?>
<?php endif ?>

<?/*---------obtiene catidad de articulos por catalogo--------*/?>
<?php if (isset($_POST['id_catalogo'])): ?>
	<?php 

	$query= "SELECT * FROM articulos WHERE id_catalogo= $cat";
	$result=mysqli_query($conexion, $query);

	?>	
	<?php else:
	$query= "SELECT * FROM articulos WHERE id_user=$id_userup ";
	$result=mysqli_query($conexion, $query);

	 ?>
<?php endif ?>


<?/*---cabeseras de la tabla---*/?>

<div class="container">
  <div class="row">
    <div class="col col-lg-6">

    	<h4><?php echo $c; ?></h4>


    </div>
    
    <div class="col-md-auto">
<form action="articulos-create-read.php" method="POST">
	<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <label class="input-group-text" for="id_catalogo">CÁTALOGO: </label>
		  </div>
        <select class="custom-select" id="id_catalogo" name="id_catalogo" required>
		    
		    <option selected></option>
			<?php 
		      $query3="SELECT id_catalogo, cat_nombre FROM catalogos WHERE id_user=$id_userup ";
		      $result3=mysqli_query($conexion, $query3);
		    ?>
		    <?php while($filas=mysqli_fetch_assoc($result3)) { ?>
		      
		    <option value="<?php echo $filas ['id_catalogo']?>" >
		      <?php echo $filas ['cat_nombre']  ?>
		    </option>
		    <?php } ?>

		 </select>
			<button type="submit" class="btn btn-primary " id="listar" name="listar">LISTAR</button>
	</div>
</form>

  </div>
</div>



<?/*---cabeseras de la tabla---*/?>

<table class="table table-bordered text-center " >
  <thead class="thead-light ">
    <tr>

      
      <th scope="col">PRODUCTO</th>
      <th scope="col">DETALLES</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>

  <?/*---contenido de la tabla---*/?>

  <tbody>

	<?php while($filas=mysqli_fetch_assoc($result)) { ?>
	    <tr>
	      
	      <td>
	      	<img loading="lazy" src="<?php echo $filas ['art_imagen'];?>" width="80" heigth="80" >
	      	<br>
	      	<?php echo $filas ['art_nombre'];?>
	      </td>
	      
	      <td align="left">
	      	Codigo:  <?php echo $filas ['art_codigo'];?><br>
	      	Precio: <?php echo $filas ['art_moneda'];?><?php echo number_format($filas ['art_precio'] ,2);?><br>
	      	Dcto:  <?php echo $filas ['art_descuento'];?>%<br>
	      	Stock:  <?php echo $filas ['art_stock'];?><br>
			Activo: <?php echo $filas ['art_activo'];?>
	       </td>

	     <td>

			<div class="container text-center ">
		    <a href="articulos_update.php?id=<?php echo $filas ['id_articulo']?>" class="btn btn-primary"> 
	        <span class="icon-checkmark"></span>
	    	</a>

	      	<a href="articulos_delete.php?id=<?php echo $filas ['id_articulo']?>" class="btn btn-danger"> 
			<span class="icon-bin"></span>
	      	</a>
			</div>

	     </td>
	    </tr>
	 <?php } ?>

  </tbody>
</table>



<?php include('includes/footer.php'); ?>