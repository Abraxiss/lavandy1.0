
<link rel="stylesheet" href="stylos/stylos.css">

<?php include("./data/conexion.php"); ?>
<link rel="stylesheet" href="./stylos/estilosvistaprevia.css">	

<?php 

     $query="SELECT * FROM catalogos WHERE id_user= $id_userup ";
     $result=mysqli_query($conexion, $query);
?>


<div>	

	<!--imagenes-->
	<div class="container p-2 "  >
        <br>
	<h4>&nbsp&nbsp&nbspVISTA PREVIA </h4>
    <br>
        <div class="row text-center" >
         
<?php while($filas=mysqli_fetch_assoc($result)) { ?>
    

<div  class=" col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 "  >
    
   
    <div  class="box"  >
        
        <img loading="lazy" src="./<?php echo $filas ['cat_imagen'] ?>"  class="responsive-img materialboxed" data-caption="<?php echo $filas ['cat_nombre']  ?>">
        
    </div>
   
    <div  class=piecat>     
   
    <div class="box " > 
         <a href="#" class="btn btn-primary" >   
            <h6><?php echo $filas ['cat_nombre']  ?></td> </h6>  </a>  </div>

    </div> 

</div>
                
            
<?php } ?>

        </div>      

	</div>


