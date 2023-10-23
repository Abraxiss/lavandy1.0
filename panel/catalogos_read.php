<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("data/conexion.php"); ?>


	<?php 
	$query="SELECT * FROM  catalogos WHERE id_user=$id_userup   ";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$elementos=5;
	$paginas= ceil($numfilas / $elementos);
	$url="catalogos-create-read.php"; // url para paginacion
	
 	if (!$_GET) {
 	echo'<script type="text/javascript">
    window.location.href="./catalogos-create-read.php?pagina=1";
    </script>';
 	} else {
 	$pagina = $_GET['pagina'];	
 	}
 	
	?>

<?/*---cabeseras de la tabla---*/?>




<div class="container">
  <div class="row">
    <div class="col col-lg-6">
      
    </div>
    <div class="col-md-auto">

<?/*--------------paginacion---------*/?>
 	<nav aria-label="Page navigation example text-center">
	  <ul class="pagination">
	    	<li class="page-item <?php echo $pagina<=1 ? 'disabled':'' ?> ">
	    	<a class="page-link" 
	    	href="<?php echo $url ;?>?pagina=<?php echo $pagina-1; ?>"> Anterior</a></li>

	    <?php for ($i=0; $i <$paginas ; $i++):?> 
	    	<li class="page-item <?php echo $pagina==$i+1 ? 'active':'' ?>">
	    		<a class="page-link" href="<?php echo $url ;?>?pagina=<?php echo $i+1; ?>"> <?php echo $i+1; ?>	
	    		</a>
	    	</li> 
	    <?php endfor ?>
    

	    	<li class="page-item
	    	<?php echo $pagina>=$paginas ? 'disabled':'' ?>">
	    	<a class="page-link" 
	    	href="<?php echo $url ;?>?pagina=<?php echo $pagina+1; ?>"
	    	>Siguiente</a></li>
	  </ul>
	</nav>

 

  </div>
</div>

<?/*---cabeseras de la tabla---*/?>

<table class="table table-bordered text-center ">

  <thead class="thead-light ">
    <tr>
	  <th scope="col">CATÁLOGO</th>
      <th scope="col">ACTIVO</th>
      <th scope="col">OPSIONES</th>
    </tr>
  </thead>

  <?/*---contenido de la tabla---*/?>

  <tbody>
  	<?php 

  	$inicio=($_GET['pagina']-1) * $elementos ;
  	$fin=$elementos;
	$query2="SELECT *FROM catalogos WHERE id_user=$id_userup limit $inicio , $fin";
	$result2=mysqli_query($conexion, $query2);

	?>
  	

	<?php while($filas=mysqli_fetch_assoc($result2)) { ?>
	    <tr>

	      <td>
	      	<img loading="lazy" src="<?php echo $filas ['cat_imagen'] ?>" width="100" heigth="100" >
			<br>
			<?php echo $filas ['cat_nombre']  ?>
	      </td>

	        <td><?php echo $filas ['cat_activo']  ?> </td>
	      

	     <td>
			<div class="container text-center ">
		    <a href="catalogos_update.php?id=<?php echo $filas['id_catalogo']?>" class="btn btn-primary"> 
	        <span class="icon-checkmark"></span>
	    	</a>

	      	<a href="./catalogos_delete.php?id=<?php echo $filas['id_catalogo']?>" class="btn btn-danger"> 
			<span class="icon-bin"></span>
	      	</a>

			</div>
	     </td>
	    </tr>

	 <?php } ?>

  </tbody>
</table>
<div>
	



<?php mysqli_close($conexion); ?>
<?php include('includes/footer.php'); ?>