<?php include("./../../panel/data/conexion.php"); ?>


<?php
if (isset($_POST['telefono'])) {
	
	$TELEFONO = $_POST['telefono'];
	

	$query="SELECT * FROM clientes WHERE TELEFONO= '$TELEFONO' ";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	


	if ($numfilas>0) { ?>

		<div class="container col-7">

			<h5>El Numero de telefono ya se encuentra Registrado...</h5>
	
			<a href="./../clientes_read.php" class="btn btn-primary  btn-block" >Regresar...</a>		
		</div>

<?php




	} else {

	
    $NOMBRE = $_POST['n_cliente'];
    $SEXO = $_POST['sexo'];
    $TELEFONO = $_POST['telefono'];
    $ID_TIENDA = $_POST['id_tienda'];
    $RUC_DNI = $_POST['dniruc'];
    $DIRECCION = $_POST['direccion'];
    $LINK_UBICACION = $_POST['link_u'];
    $AROMA_PREFERIDO = $_POST['id_perfume'];
    $CALIFICACION_CLIENTE = $_POST['calificacion'];
    $COMENTARIO_CALIFICACION = $_POST['comentario'];
    $NREFERIDOS = $_POST[ 'referidos'];




	$query= "INSERT INTO clientes(  
	NOMBRE, 
	SEXO, 
	ID_TIENDA,
	TELEFONO,
	RUC_DNI, 
	DIRECCION,
	LINK_UBICACION, 
	AROMA_PREFERIDO, 
	CALIFICACION_CLIENTE, 
	COMENTARIO_CALIFICACION, 
	NREFERIDOS 

	) VALUES (

	'$NOMBRE',
	'$SEXO',
	'$ID_TIENDA',
	'$TELEFONO',
	'$RUC_DNI',
	'$DIRECCION',
	'$LINK_UBICACION',
	'$AROMA_PREFERIDO',
	'$CALIFICACION_CLIENTE',
	'$COMENTARIO_CALIFICACION',
	'$NREFERIDOS'

	)";

	/*---create ---*/
	$result = mysqli_query($conexion, $query);?>
	
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../clientes_read.php";
    </script>';
	exit();


	<?php	

	}

	} else {

	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../clientes_read.php";
    </script>';
	exit();

	}


	?>

	<?php include('./../includes/footer.php'); ?>