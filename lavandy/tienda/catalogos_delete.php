<?php include('includes/header.php'); ?>


<?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];

?>

	<div class="container p-3">

	  <div class="row" >
	    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" >

	    </div>
	    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

	    	<h3>Eliminar: </h3>
			<h6>Estas seguro que deseas eliminar</h6> 
			<h6>el catálogo...</h6><br>
			<form  action="crud_catalogos/delete.php" method="GET" >
			<input class="form-control" type="hidden" id="id" 
			name="id" value="<?php echo $id; ?>" required>
			  <button type="submit" class="btn btn-danger" >Eliminar</button>
			</form>
			<a href="./catalogos-create-read.php" class="btn btn-primary ">Cancelar</a>

	    </div>

	  </div>
	</div>
<?php  

} else {
	echo'<script type="text/javascript">
    window.location.href="./catalogos-create-read.php";
    </script>';
	mysqli_close($conexion);
	exit();
}
?>


<?php include('includes/footer.php'); ?>