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
         <h1 class="text-center text-light">INICIA SESSION</h1>

     </header>

     
 <?php
// Inicia la sesión
session_start();

// Almacena un valor en la variable de sesión
$_SESSION['test'] = 'Hola, mundo!';


 echo "mi session ok:";
?>
<br> <br> <br>
 <a href="recupera.php" >recupera y uso de session</a>
   
    
  </body>
</html>
