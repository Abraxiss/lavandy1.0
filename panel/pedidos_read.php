<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('menubar.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("data/conexion.php"); ?>

<?php 
if (!$_GET) {
	echo'<script type="text/javascript">
    window.location.href="./pedidos_read.php?pagina=1";
    </script>';
    exit();
    die();
} else {
	$query="SELECT *FROM pedidos WHERE id_user=$id_userup ";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$elementos=10;
	$paginas= ceil($numfilas / $elementos);
	$url="pedidos_read.php"; // url para paginacion
 	$pagina = $_GET['pagina'];
}


?>




<div class="container">
	<br>
<h4> MIS PEDIDOS </h4>

  <div class="row">
    <div class="col col-lg-6">
      
    </div>
    <div class="col-md-auto">

<?/*--------------paginacion---------*/?>
 	<nav aria-label="Page navigation example text-right">
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
	  <th scope="col">FECHA</th>    	
	  <th scope="col">CLIENTE</th>
	  <th scope="col">DIRECCIÓN</th>
      <th scope="col">PRODUCTO</th>
      <th scope="col">ATENDIDO</th>
      <th scope="col">ELIMINAR</th>     
      
    </tr>
  </thead>

  <?/*---contenido de la tabla---*/?>

  <tbody>
  	<?php 

  	$inicio=($_GET['pagina']-1) * $elementos ;
  	$fin=$elementos;
	$query2="SELECT *FROM pedidos WHERE id_user=$id_userup limit $inicio , $fin";
	$result2=mysqli_query($conexion, $query2);

	?>
  	

	<?php while($filas=mysqli_fetch_assoc($result2)) { ?>
	    <tr>
	    <td>
	        <?php echo $filas ['pd_fecha']  ?> 
	    </td>
	    <td>
	      	<?php echo $filas ['pd_nombre']  ?><br>
			<?php echo $filas ['pd_telefono']  ?>
	    </td>
	    <td>
	        <?php echo $filas ['pd_ubicacion']  ?> 
	    </td>
	    <td>
	        codigo:&nbsp <?php echo $filas ['art_codigo']  ?><br>
	        Cantida:&nbsp <?php echo $filas ['pd_cantidad']  ?>  
	    </td>	      

	     <td>
			<div class="container text-center ">


		    <a href="./../crud_pedidos/update.php?id=<?php echo $filas['id_pedido']?>&p=<?php echo $filas['pd_atendido']?>" 
		    	class="
		    	<?php  
				    if ($filas['pd_atendido']=='NO') {
					echo "btn btn-secondary";
				    } else {
				        if ($filas['pd_atendido']=='SI') {
						echo "btn btn-success";
				        }
				    } 
				?>

		    	"> 

	        <?php echo $filas['pd_atendido']?>
	    	</a>
		</td>
		<td>
	      	<a href="./pedidos_delete.php?id=<?php echo $filas['id_pedido']?>" class="btn btn-danger"> 
			<span class="icon-bin"></span>
	      	</a>
			</div>
	     </td>
	    </tr>

	 <?php } ?>

  </tbody>
</table>
<div>
	




<?php include('includes/footer.php'); ?>