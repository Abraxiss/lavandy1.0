<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Test sessiones </title>
  </head>    
  <body> 
     <header>
         <h1 class="text-center text-light">RECUPERA Y USO SESSION</h1>

     </header>


 <?php
// Inicia la sesión
session_start();

// Recupera el valor de la variable de sesión
if (isset($_SESSION['test'])) {
    echo $_SESSION['test'];
} else {
    echo 'No se encontró la variable de sesión.';
}

?>
<br> <br> <br>   
<a href="destruye.php" >DESTRUIR</a>    


  </body>
</html>


