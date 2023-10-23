<?php include("./../data/conexion.php"); ?>
<?php include('./../includes/session.php'); ?>

<?php


if (isset($_POST['user_nombre'])) {

	  
    $c2 = $_POST['user_nombre'];
    $c3 = $_POST['user_empresa'];
    $c4 = $_POST['user_correo'];
    $c5 = 1; /*$_POST['user_activo'];*/
    $c6 = $_POST['user_clave'];
    $c7 = 2; /*$_POST['user_nivel'];*/

  if ($_FILES['user_portada']['name']!= null) {

      $name_img=$_FILES['user_portada']['name']; // obtiene el nombre
      $archivo=$_FILES['user_portada']['tmp_name'];  // obtiene el archivo
      $destino="./../img/user";
      $destino=$destino."/".$name_img ; ///imagen/nombre.jpg
      $c8="img/user";
      $c8=$c8."/".$name_img ; ///imagen/nombre.jpg
      move_uploaded_file($archivo,$destino);
  
  }else{

     $c8= $_POST['user_portd'];

  }

  if ($_FILES['user_logo']['name']!= null) {

      $name_img=$_FILES['user_logo']['name']; // obtiene el nombre
      $archivo=$_FILES['user_logo']['tmp_name'];  // obtiene el archivo
      $destino="./../img/user";
      $destino=$destino."/".$name_img ; ///imagen/nombre.jpg
      $c9="img/user";
      $c9=$c9."/".$name_img ; ///imagen/nombre.jpg
      move_uploaded_file($archivo,$destino);
  
  }else{

     $c9= $_POST['user_log'];

  }



    $c10 = $_POST['user_perfil'];
    $c11 = $_POST['user_facebook'];
    $c12 = $_POST['user_whatsapp'];
    $c13 = $_POST['user_instagram'];
    $c14 = $_POST['user_correocop'];
    $c15 = $_POST['user_telefono'];
    $c16 = $_POST['user_direccion'];
  


  $query = "UPDATE user set

user_nombre ='$c2',
user_empresa ='$c3',
user_correo ='$c4',
user_activo ='$c5',
user_clave  ='$c6',
user_nivel  ='$c7',
user_portada  ='$c8',
user_logo ='$c9',
user_perfil ='$c10',
user_facebook ='$c11',
user_whatsapp ='$c12',
user_instagram  ='$c13',
user_correocop  ='$c14',
user_telefono  ='$c15',
user_direccion  ='$c16'

  WHERE id_user=$id_userup";

  mysqli_query($conexion, $query);

}


mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../home.php";
    </script>';
exit();

?>