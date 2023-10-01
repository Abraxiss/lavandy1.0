<?php include("./../data/conexion.php"); ?>


<?php

if (isset($_GET['id'])) {

	  $id = $_GET['id'];
	  $c3= $_POST['cat_nombre'];

  if ($_FILES['cat_imagen']['name']!= null) {

      $name_img=$_FILES['cat_imagen']['name']; // obtiene el nombre
      $archivo=$_FILES['cat_imagen']['tmp_name'];  // obtiene el archivo
      $destino="./../img/cat";
      $destino=$destino."/".$name_img ; ///imagen/nombre.jpg
      $c4="img/cat";
      $c4=$c4."/".$name_img ; ///imagen/nombre.jpg
      move_uploaded_file($archivo,$destino);
  
  }else{

     $c4= $_POST['cat_imag'];

  }

    $c5 = $_POST['cat_activo'];
    

  $query = "UPDATE catalogos set 
  cat_nombre = '$c3',
  cat_imagen = '$c4', 
  cat_activo = '$c5' 

  WHERE id_catalogo=$id";

  mysqli_query($conexion, $query);

mysqli_close($conexion);

echo'<script type="text/javascript">
    window.location.href="./../catalogos-create-read.php";
    </script>';

exit();
die();

}


?>