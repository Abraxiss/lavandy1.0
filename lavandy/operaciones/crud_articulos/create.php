<?php include("./../data/conexion.php"); ?>

<?php 

/*---NEW ARTICULOS---*/

if (isset($_POST['guardar'])) {

	$c2 = $_POST['id_user'];
	$c3 = $_POST['id_catalogo'];
	$c4 = $_POST['art_nombre'];

	if ($_FILES['art_imagen']['name']!= null) {

			$name_img=$_FILES['art_imagen']['name']; // obtiene el nombre
			$archivo=$_FILES['art_imagen']['tmp_name'];  // obtiene el archivo
			$destino="./../img/art";
			$destino=$destino."/".$name_img ; ///imagen/nombre.jpg
			move_uploaded_file($archivo,$destino);

			$c9="img/art";
			$c9=$c9."/".$name_img.$c4 ; ///imagen/nombre.jpg
			
	
	}else{
		$c9="img/art";
		$c9=$c9."/"."img.png";

	}

	$c13 = "SI" ;
	$c14 = $_POST['art_codigo'];

$query= "INSERT INTO articulos(  
id_user,  
id_catalogo,
art_nombre,
art_imagen,
art_activo,
art_codigo
) VALUES (
'$c2',
'$c3',
'$c4',
'$c9',
'$c13',
'$c14'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query);


/*---secion para msj ---*/

/*---redireccion ---*/
mysqli_close($conexion);	
echo'<script type="text/javascript">
    window.location.href="./../articulos-create-read.php";
    </script>';

exit();
die();

}

?>