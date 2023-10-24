<?php include("session/sessionup.php"); ?>
<?php include('includes/header.php'); ?>
<?php include("panel/data/conexion.php"); ?>
<?php include("./includes/menubar.php"); ?>
<link rel="stylesheet" href="css/estiloscat.css">	

<br>
<style>
	h3{
		color: #361745;
		font: 150% sans-serif;
	}

</style>
<br>
<h3 class="text-center" >Nuestros Servicios</h3>
	
<?php 

     $query="SELECT *FROM articulos  ";
     $result=mysqli_query($conexion, $query);
?>

<div>	

	<!--imagenes-->
	<div class="container p-2 "  >
	
        <div class="row text-center" >
         
<?php while($filas=mysqli_fetch_assoc($result)) { ?>
    

<div  class=" col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 "  >
    <?php $idcat=$filas ['id_catalogo']; ?> 
 
    <div  class="box"  >
        <a href="pedido.php?p=<?php echo $filas ['id_articulo']; ?>"  class="btn " >
        <img loading="lazy" src="panel/<?php echo $filas ['art_imagen'] ?>"  class="responsive-img materialboxed" >
        </a>
    </div>

    
    <div  class=piecat>     
   
        <center><?php echo $filas ['art_nombre']  ?> Desde: <span><?php echo $filas ['art_moneda']  ?><?php echo number_format($filas ['art_precio'] ,2); ?> </span>  </center>
    
         
        <a href="pedido.php?p=<?php echo $filas ['id_articulo']; ?>"  class="btn " >  SOLICITAR </a>
        

    </div> 
<span>----------------------------------------------</span>
</div>
                
            
<?php } ?>

        </div>      

	</div>







<?php include('panel/includes/footer.php'); ?>