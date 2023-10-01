<?php 

@session_start();
$_SESSION['x']="xxx";
$_SESSION['y']="yyy";
$_SESSION['usuario']='user';

echo $_SESSION['usuario'];
die();
$a=$_SESSION['x'];
 ?>