
<link rel="stylesheet" href="./css/estiloscat.css">	

<?php 

     $query="SELECT *FROM catalogos WHERE id_user= 1 ";
     $result=mysqli_query($conexion, $query);
?>


<?php $url="ar.php"; ?>



<div>	

	<!--imagenes-->
	<div class="container p-2 "  >
	
        <div class="row text-center" >
         
<?php while($filas=mysqli_fetch_assoc($result)) { ?>
    

<div  class=" col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 "  >
    <?php $idcat=$filas ['id_catalogo']; ?> 
    <a href="<?php echo $url ;?>?cat=<?php echo $idcat; ?>">
    <div  class="box"  >
        
        <img loading="lazy" src="panel/<?php echo $filas ['cat_imagen'] ?>"  class="responsive-img materialboxed" data-caption="<?php echo $filas ['cat_nombre']  ?>">
        
    </div>
    </a>
    
    <div  class=piecat>     
   
        
         <a href="#" class="btn " >   
            <span><?php echo $filas ['cat_nombre']  ?></td> </span>  </a> 
        
         
        <a class="btn" href="<?php echo $url ;?>?cat=<?php echo $idcat; ?>">VER</a>
        

    </div> 
<span>----------------------------------------------</span>
</div>
                
            
<?php } ?>

        </div>      

	</div>


<?php include('./panel/includes/footer.php'); ?>