<!DOCTYPE html>
<html lang="es">
<head>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
     
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <!-- Estilos CSS -->
     <link rel="stylesheet" href="./css/estilos.css">
     

<?php include("./panel/data/conexion.php"); ?>

<?php 
if (!$_GET) {
    header("Location: ./index.php");
    exit();
    die();
}

 $id = $_GET['art'];
     $query="SELECT * FROM articulos WHERE id_articulo= $id";
     $result=mysqli_query($conexion, $query);
   $filas=mysqli_fetch_assoc($result)
    ?>


</head>
<body>


  <div><a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Regresar</a></div>


     <main class="container">
          <div class="row">
               <div class="col s12 center-align">
                    <h3 class="titulo"><?php echo $filas ['art_nombre'] ?></h3>
               </div>
          </div>

          <div class="row galeria"> 
                
          
               <div class="col s12 m4 l3">
                    <div class="material-placeholder">
                         <img src="panel/<?php echo $filas ['art_imagen'] ?>"  class="responsive-img materialboxed" >
                    </div>
               </div>
               
               <div class="col s12 m4 l3">
                    <div class="material-placeholder">
                         <img src="panel/<?php echo $filas ['art_imagen1'] ?>"  class="responsive-img materialboxed" >
                    </div>
               </div>

               <div class="col s12 m4 l3">
                    <div class="material-placeholder">
                         <img src="panel/<?php echo $filas ['art_imagen2'] ?>"  class="responsive-img materialboxed" >
                    </div>
               </div>

               <div class="col s12 m4 l3">
                    <div class="material-placeholder">
                         <img src="panel/<?php echo $filas ['art_imagen3'] ?>"  class="responsive-img materialboxed" >
                    </div>
               </div>

          </div>
     </main>


        
        <style>
          .des{
            padding-left: 80px; 
            padding-right: 80px; 
            color: #F0F2F0;
background: #141E30;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #243B55, #141E30);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #243B55, #141E30); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      
          
          }

        </style>

        <div class="des text-center">  
        <br>  
        <p>___________________________________</p> 
        <h6>Articulo:&nbsp<?php echo $filas ['art_nombre']  ?></h6>
        <h6>Codigo:&nbsp<?php echo $filas ['art_codigo']  ?></h6>
        <h6>Precio:&nbsp<?php echo $filas ['art_moneda']  ?><?php echo number_format($filas ['art_precio'] ,2); ?></h6>
        <h6>Descuento:&nbsp<?php echo $filas ['art_descuento']  ?>%</h6>
        <h6><?php echo $filas ['art_descripcion']  ?></h6>   
       
        <p>___________________________________</p><br>


        </div>
            <br>
            <a href="pedido.php?perido=<?php echo $filas ['id_articulo'] ?>" class="btn btn-outline-primary btn-lg btn-block"  >   
                <span>COMPRAR</span>  </a> 
            <br>
            <div><a class="btn btn-outline-primary btn-lg btn-block" href="productos.php">Regresar</a></div> 




<?php mysqli_close($conexion); ?>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script src="js/main.js"></script>
<?php include('./panel/includes/footer.php'); ?>