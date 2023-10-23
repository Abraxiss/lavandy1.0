<?php include("./../data/conexion.php"); ?>


<?php

if (isset($_GET['id'])) {

	  $id = $_GET['id'];
	  $c3 = $_POST['id_catalogo'];
    $c4 = $_POST['art_nombre'];
    $c5 = $_POST['art_precio'];
    $c6 = $_POST['art_stock'];
    $c7 = $_POST['art_descuento'];
    $c8 = $_POST['art_descripcion'];
    //imagen principal
  if ($_FILES['art_imagen']['name']!= null) {

      $name_img=$_FILES['art_imagen']['name']; // obtiene el nombre
      $archivo=$_FILES['art_imagen']['tmp_name'];  // obtiene el archivo
      $destino="./../img/art";
      $destino=$destino."/".$name_img ; ///imagen/nombre.jpg
      $c9="img/art";
      $c9=$c9."/".$name_img ; ///imagen/nombre.jpg
      move_uploaded_file($archivo,$destino);
  
  }else{
    $c9= $_POST['art_imag'];
  }

    //imagen secundatia 01
  if ($_FILES['art_imagen1']['name']!= null) {

      $name_img1=$_FILES['art_imagen1']['name']; // obtiene el nombre
      $archivo1=$_FILES['art_imagen1']['tmp_name'];  // obtiene el archivo
      $destino1="./../img/art";
      $destino1=$destino1."/".$name_img1 ; ///imagen/nombre.jpg
      $c10="img/art";
      $c10=$c10."/".$name_img1 ; ///imagen/nombre.jpg
      move_uploaded_file($archivo1,$destino1);
  
  }else{
    $c10= $_POST['art_imag1'];
  }

      //imagen secundaria 02
  if ($_FILES['art_imagen2']['name']!= null) {

      $name_img2=$_FILES['art_imagen2']['name']; // obtiene el nombre
      $archivo2=$_FILES['art_imagen2']['tmp_name'];  // obtiene el archivo
      $destino2="./../img/art";
      $destino2=$destino2."/".$name_img2 ; ///imagen/nombre.jpg
      $c11="img/art";
      $c11=$c11."/".$name_img2 ; ///imagen/nombre.jpg
      move_uploaded_file($archivo2,$destino2);
  
  }else{
    $c11= $_POST['art_imag2'];
  }

      //imagen secundaria 03
  if ($_FILES['art_imagen3']['name']!= null) {

      $name_img3=$_FILES['art_imagen3']['name']; // obtiene el nombre
      $archivo3=$_FILES['art_imagen3']['tmp_name'];  // obtiene el archivo
      $destino3="./../img/art";
      $destino3=$destino3."/".$name_img3 ; ///imagen/nombre.jpg
      $c12="img/art";
      $c12=$c12."/".$name_img3 ; ///imagen/nombre.jpg
      move_uploaded_file($archivo3,$destino3);
  
  }else{
    $c12= $_POST['art_imag3'];
  }

    $c13 = $_POST['art_activo'];
    $c14 = $_POST['art_codigo'];
    $c15 = $_POST['art_moneda'];


/// actualisa tabla

  $query = "UPDATE articulos set 
  id_catalogo = '$c3',
  art_nombre = '$c4', 
  art_precio = '$c5',
  art_stock = '$c6',
  art_descuento = '$c7',
  art_descripcion = '$c8',
  art_imagen = '$c9',
  art_imagen1 = '$c10',
  art_imagen2 = '$c11',
  art_imagen3 = '$c12',
  art_activo = '$c13',
  art_codigo = '$c14',
  art_moneda = '$c15'
  WHERE id_articulo=$id";

  mysqli_query($conexion, $query);


mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../articulos-create-read.php";
    </script>';

exit();
die();

}

?>