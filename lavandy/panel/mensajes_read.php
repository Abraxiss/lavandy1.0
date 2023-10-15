<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("data/conexion.php"); ?>

<?php include('menubar.php'); ?>


<br>
<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ncliente" >
  <span class="icon-user"></span> NUEVO MENSAJE 
</button>

<!-- Modal -->
<div class="modal fade" id="ncliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Mensaje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="crud_mensajes/create.php" method="post"> 

  	<input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >

    <div class="form-row">
    
		<label for="id_tipo_msj">TIPO DE MESAJE</label>
    <select class="custom-select" id="id_tipo_msj" name="id_tipo_msj" >
    <option selected></option>
    <?php 
      $query="SELECT *FROM tipo_mensajes ORDER BY TIPO_MSJ ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_TIPO_MSJ']?>" >
      <?php echo $filas ['TIPO_MSJ']  ?>
    </option>
    <?php } ?>

  	</select>
		</div>

		 
   <div class="form-group">
      <label for="mensaje">MENSAJE</label>
      <textarea class="form-control" id="mensaje" name="mensaje" rows="5"></textarea>
  </div>

    <div class="form-group">
      <label for="hipervinculo">HIPERVINCULO</label>
      <input type="text" class="form-control" id="hipervinculo" name="hipervinculo" >
    </div>
  

    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">GUARDAR</button>
  </form>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>      
      </div>
    </div>
  </div>
</div>

<!-- Modal -->




<br>










<?/*---------obtiene nombre de catalogo---------------*/?>
<?php if (isset($_POST['ID_TIPO_MSJ'])): ?> 
   	<?php 
			$ID_TMSJ = $_POST['ID_TIPO_MSJ'];
			$query5= "SELECT TIPO_MSJ FROM tipo_mensajes WHERE ID_TIPO_MSJ= $ID_TMSJ";
			$result5=mysqli_query($conexion, $query5);
			$f=mysqli_fetch_assoc($result5);
			$filtro=$f ['TIPO_MSJ'];
		 ?>
		 <?php else: $filtro="Todos los mensajes"  ?>
<?php endif ?>

<?/*---------obtiene catidad de mensajes por tipo--------*/?>
<?php if (isset($_POST['ID_TIPO_MSJ'])): ?>
	<?php 

	$query= "SELECT * FROM mensajes WHERE ID_TIPO_MSJ= $ID_TMSJ";
	$result=mysqli_query($conexion, $query);

	?>	
	<?php else:
	$query= "SELECT * FROM mensajes  ";
	$result=mysqli_query($conexion, $query);

	 ?>
<?php endif ?>


<?/*---cabeseras de la tabla---*/?>

<div class="container">
  <div class="row">
    <div class="col col-lg-6">

    	<h4><?php echo $filtro; ?></h4>


    </div>
    
    <div class="col-md-auto">


<form action="mensajes_read.php" method="POST">
	<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <label class="input-group-text" for="ID_TIPO_MSJ">TIPO DE MENSAJE: </label>
		  </div>
        <select class="custom-select" id="ID_TIPO_MSJ" name="ID_TIPO_MSJ" required>
		    
		    <option selected></option>
			<?php 
		      $query3="SELECT * FROM tipo_mensajes ORDER BY TIPO_MSJ";
		      $result3=mysqli_query($conexion, $query3);

		    ?>
		    <?php while($filas=mysqli_fetch_assoc($result3)) { ?>
		      
		    <option value="<?php echo $filas ['ID_TIPO_MSJ']?>" >
		      <?php echo $filas ['TIPO_MSJ']  ?>
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

      
      <th scope="col">ITEM</th>
      <th scope="col">MENSAJES</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>

  <?/*---contenido de la tabla---*/?>

  <tbody>

	<?php while($filas=mysqli_fetch_assoc($result)) { ?>
	    <tr>
	      
	      <td>
		      	<?php echo $filas ['ID_MENSAJE'];?>
	      </td>
	      
	      <td align="left">
         <?php echo $filas ['MENSAJE'];?>
	       </td>

	     <td>

			<div class="container text-center ">
		    <a href="mensajes_update.php?id=<?php echo $filas ['ID_MENSAJE']?>" class="btn btn-primary"> 
	        <span class="icon-checkmark"></span>
	    	</a>

	      	<a href="mensajes_delete.php?id=<?php echo $filas ['ID_MENSAJE']?>" class="btn btn-danger"> 
			<span class="icon-bin"></span>
	      	</a>
			</div>

	     </td>
	    </tr>
	 <?php } ?>

  </tbody>
</table>




<?php include('includes/footer.php'); ?>