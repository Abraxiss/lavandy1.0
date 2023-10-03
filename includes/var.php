<?php include('./panel/includes/header.php'); ?>
<?php include("./panel/data/conexion.php"); ?>
<link rel="stylesheet" href="./css/estiloscat.css"> 

<?php 
if (!$_GET) {
    echo'<script type="text/javascript">
    window.location.href="./../index.php";
    </script>';
    exit();
    die();
}

 $cat = $_GET['cat'];
     $query="SELECT * FROM articulos WHERE id_catalogo= $cat";
     $result=mysqli_query($conexion, $query);
     $query2="SELECT cat_nombre FROM catalogos WHERE id_catalogo= $cat";
     $result2=mysqli_query($conexion, $query2);
     $filas2=mysqli_fetch_assoc($result2)
    ?> 

<style>
    h3{
        color: #361745;
        font: 150% sans-serif;
    }

</style>
<h3 class="text-center"><?php echo $filas2 ['cat_nombre']  ?></h3>
<br>
<div><a class="btn btn-outline-warning btn-lg btn-block" href="productos.php">Regresar</a></div>

<div>   

    <!--imagenes-->
    <div class="container-fluid p-3 "  >
    
        <div class="row text-center" >
         
<?php while($filas=mysqli_fetch_assoc($result)) { ?>
    

<div  class=" col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 "  >
    <div  class=" box "  >
        <a href="imgs.php?art=<?php echo $filas ['id_articulo']; ?>">
            <img loading="lazy" src="panel/<?php echo $filas ['art_imagen'] ?>"  class="responsive-img materialboxed" data-caption="<?php echo $filas ['art_nombre']  ?>">
        </a>
        <br><br>
        <a class="btn btn-outline-success " href="imgs.php?art=<?php echo $filas ['id_articulo']; ?>"> <h5 class="icon-images"> +Imagenes</h5></a>  
       
    </div>
    <div  class="piecat border-right-0" > 

    <div class="nombreart" >
        
        <span>  <?php echo $filas ['art_nombre']  ?></span>
    </div>  

    <div class="detalle text-center" >
        <span><?php echo $filas ['art_descripcion']  ?></span>
    </div>    
   
    <div class="promo text-center" > 
        

    <?php 
    $desc= $filas ['art_descuento'];

?>



     <?php if ($desc == true):  ?>
<span> <h4>  Descuento: <?php echo $filas ['art_descuento']  ?>% </h4></span> 
<?php endif ?>

    </div>




 
             <a href="#" class="btn " >   
                <span><?php echo $filas ['art_moneda']  ?><?php echo number_format($filas ['art_precio'] ,2); ?> </span>  </a>  



            <a href="pedido.php?perido=<?php echo $filas ['id_articulo'] ?>" class="btn " >   
                <span>COMPRAR</span>  </a> 
       
<p>____________________________</p>

    </div> 

</div>
                
            
<?php } ?>

        </div>      

    </div>

<div><a class="btn btn-outline-warning btn-lg btn-block" href="productos.php">Regresar</a></div>


        <!-- PEDIDO: Menu -->
 

 





<?php include('./panel/includes/footer.php'); ?>