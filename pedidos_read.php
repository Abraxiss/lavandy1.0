


<?php 
if (!$_GET) {
	echo'<script type="text/javascript">
    window.location.href="./mispedidos.php?pagina=1";
    </script>';
    exit();
    die();
} else {
	$query="SELECT * FROM pedidos WHERE id_cliente=$idclup ";


	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$elementos=5;
	$paginas= ceil($numfilas / $elementos);
	$url="mispedidos.php"; // url para paginacion
 	$pagina = $_GET['pagina'];
}


?>



<br>

<div class="container">
  <div class="row">
<div class="col col-lg-6">
<style>	
.cancel{
	margin-top: 10px;

}
</style>

	<div class="cancel">
		<h5>&nbsp<span class="icon-cart"></span>&nbspMis pedidos:</h5>
	    <h6>&nbsp &nbsp<span class="icon-cog"></span> Para cancelar tu pedido has clic en la seccion cancelado.</h6> 
	     <h6>&nbsp &nbsp<span class="icon-cog"></span> Los pedidos atendidos figuraran como atendidos automaticamente.</h6>	
	</div>
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
	  <th scope="col">REFERENCIAS</th>
      <th scope="col">PRODUCTO</th>
      <th scope="col">CANCELADO</th>     
      <th scope="col">ATENDIDO</th>
    </tr>
  </thead>

  <?/*---contenido de la tabla---*/?>

  <tbody>
  	<?php 

  	$inicio=($_GET['pagina']-1) * $elementos ;
  	$fin=$elementos;
	$query2="SELECT * FROM pedidos INNER JOIN articulos ON pedidos.id_articulo = articulos.id_articulo WHERE id_cliente=$idclup limit $inicio , $fin " ;
	$result2=mysqli_query($conexion, $query2);


	
	?>
  	

	<?php while($filas=mysqli_fetch_assoc($result2)) { ?>
	    <tr>
	    <td>
	    	<?php echo $filas ['pd_fecha']  ?><br>
	    	---------------------<br>
	      	<?php echo $filas ['pd_ubicacion']  ?><br>

	    </td>

	    <td>
			<img loading="lazy" src="./panel/<?php echo $filas ['art_imagen'] ?>" width="80" heigth="80" ><br>
	        |&nbsp <?php echo $filas ['art_codigo']  ?>&nbsp|<br>
	        Cantida:&nbsp <?php echo $filas ['pd_cantidad']  ?>  
	    </td>	      

	     <td>
			<div class="container text-center ">
		    <a href="./crud_pedidos/update.php?id=<?php echo $filas['id_pedido']?>&p=<?php echo $filas['pd_cancela']?>" 
		    	class="
		    	<?php  
				    if ($filas['pd_cancela']=='NO') {
					echo "btn btn-success";
				    } else {
				        if ($filas['pd_cancela']=='SI') {
						echo "btn btn-danger";
				        }
				    } 
				?>

		    	"> 

	        <?php echo $filas['pd_cancela']?>
	    	</a>
	    	</div>
		</td>
		<td>
			<div class="
				<?php  
				    if ($filas['pd_atendido']=='NO') {
					echo "btn btn-secondary";
				    } else {
				        if ($filas['pd_atendido']=='SI') {
						echo "btn btn-warning";
				        }
				    } 
				?>

			">
				
			<?php echo $filas ['pd_atendido']  ?>
				
			</div>
	      	
			
	     </td>
	    </tr>

	 <?php } ?>

  </tbody>
</table>
<div>
	


