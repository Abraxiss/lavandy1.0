
<?php include("./../data/conexion.php"); ?>

<?php 


/*---NEW CATALOGO---*/

if (isset($_POST['guardar'])) {
	
	$c2 = $_POST['id_user'];/*$_POST['id_user'];*/
	$c3 = $_POST['cat_nombre'];
	
	if ($_FILES['cat_imagen']['name']!= null) {

			$name_img=$_FILES['cat_imagen']['name']; // obtiene el nombre
			$archivo=$_FILES['cat_imagen']['tmp_name'];  // obtiene el archivo
			$destino="./../img/cat";
			$destino=$destino."/".$name_img ; ///imagen/nombre.jpg
			$c4="img/cat";
			$c4=$c4."/".$name_img ; ///imagen/nombre.jpg
			move_uploaded_file($archivo,$destino);
	
	}else{
		$c4="img/cat";
		$c4=$c4."/"."img.png";

	}






	$c5 = "SI";/*$_POST['cat_activo'];*/
	$c6 = 1;/*$_POST['cat_borrar'];*/

$query= "INSERT INTO catalogos(  
id_user,  
cat_nombre,
cat_imagen,
cat_activo,
cat_borrar
) VALUES (
'$c2',
'$c3',
'$c4',
'$c5', 
'$c6'
)";


/*---create ---*/
$result = mysqli_query($conexion, $query);

if (!$result) {
	die('Invalid query: ' . mysqli_error());
	}
/*---secion para msj ---*/

/*---redireccion ---*/


mysqli_close($conexion);
echo'<script type="text/javascript">
    
    window.location.href="../catalogos-create-read.php";
    </script>';
exit();
die();

}

?>