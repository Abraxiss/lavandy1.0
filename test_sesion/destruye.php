

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
         <h1 class="text-center text-light">session_destroy</h1>

     </header>
<?php 
@session_start();
@session_destroy(); 

?>

<h3>sesion destruida</h3> 
<br> <br> <br>
<a href="index.php" >INICIAR SESSION</a>    
    
  </body>
</html>
