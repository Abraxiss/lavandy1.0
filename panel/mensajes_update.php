<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>
<?php 

if (isset($_GET['id'])) {
$id = $_GET['id'];
/*---query ---*/
$queryM= "SELECT * FROM mensajes WHERE ID_MENSAJE = $id";
/*---ejecuta ---*/
$resultM = mysqli_query($conexion, $queryM);

	if (mysqli_num_rows($resultM)==1) {
		/*---almacenamos en un array ---*/
		$filasM=mysqli_fetch_array($resultM);

		/*---recorre el resultado ---*/
		/*while($filas=mysqli_fetch_assoc($result));*/
		$TIPO = $filasM ['ID_TIPO_MSJ']; 
		$MENSAJE = $filasM ['MENSAJE']; 
		$VINCULO= $filasM ['HIPERVINCULO'];

	}
}
?>

<br><br>

<center>Actualizar mensaje</center>
<br>

<div class="container">
  <div class="row">
    <div class="col">
      <form action="crud_mensajes/update.php" method="post"> 

  	<input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >
		<input value="<?php echo $id ?>" id="id_mensaje" name="id_mensaje" type="hidden" >

    <div class="form-row">
    
		<label for="id_tipo_msj">TIPO DE MESAJE</label>
    <select class="custom-select" id="id_tipo_msj" name="id_tipo_msj" >
     <?php 
      $query5="SELECT * FROM tipo_mensajes WHERE ID_TIPO_MSJ = $TIPO ";
      $result5=mysqli_query($conexion, $query5);
      $filas5=mysqli_fetch_assoc($result5)
      ?>
       	
    <option selected value="<?php echo $TIPO ?>"> <?php echo $filas5 ['TIPO_MSJ']?></option>
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
      <textarea  class="form-control" id="mensaje" name="mensaje" rows="5">
      <?php echo $MENSAJE  ?> 
      </textarea>
  </div>

    <div class="form-group">
      <label for="hipervinculo">HIPERVINCULO</label>
      <input value="<?php echo $VINCULO ?>" type="text" class="form-control" id="hipervinculo" name="hipervinculo" >
    </div>
  

    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">GUARDAR</button>
  </form>
    </div>

  </div>
</div>

  


<br>







<?php include('includes/footer.php'); ?>