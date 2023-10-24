<?php include("session/sessionup.php"); ?>
<?php include('includes/header.php'); ?>
<?php include("panel/data/conexion.php"); ?>
<?php include("./includes/menubar.php"); ?>
<link rel="stylesheet" href="css/perfil.css">
<link rel="shortcut icon" href="./panel/includes/favicon.ico">

	<div class="center ">
	<img   src="panel/<?php echo $c8 ?>" class="img-fluid" class="responsive-img" width="650" heigth="400" >	

	</div>

  
<div class="container perfil">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 cc">
      <div class="p-1"></div>
        <div class="row center hed" >
        
    		<div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 log">
			     <div class="row " > 

					<img  src="panel/<?php echo $c9 ?>" class="img-fluid"  class="responsive-img" width="70" heigth="80">
					<h3 class="img-fluid" >&nbsp&nbsp<?php echo $c3 ?></h3>
				</div>
    		</div>

        	<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 estrella">
      				<p><span class="icon-star-full"></span><span class="icon-star-full"></span><span class="icon-star-full"></span><span class="icon-star-half"></span></p>
    		</div>

  		</div>
    </div>

  </div>
</div>


<div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
    	<div class="datos">	
    	<h5>&nbsp<span class="icon-user"></span>&nbsp Nosotros</h5>
      
	   	<article>&nbsp<?php echo $c10 ?></article>
	 
    	</div>

    </div>

  </div>
</div>


<div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 cont">
      <div class="datos"> 
      <h5>&nbsp<span class="icon-headphones"></span>&nbspContacto:</h5>
      
      <article>&nbsp&nbsp<span class="icon-phone"></span>&nbsp <?php echo $c15 ?></article>
      <article>&nbsp&nbsp<span class="icon-mail"></span>&nbsp <?php echo $c14 ?></article>
      <article>&nbsp&nbsp<span class="icon-location"></span>&nbsp <?php echo $c16 ?></article>
   
      </div>

    </div>

  </div>
</div>






<div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
      <h5>&nbsp<span class="icon-shrink"></span>&nbsp Accesos directos:</h5>
      
      <div class="acessos text-center">
            <br>
          <a href="./productos.php" class="btn-lg btn-block">Hacer un pedido</a>
         
          <a href="./mispedidos.php" class="btn-lg btn-block">Mis pedidos</a> <br>
          <a href="./acesso.php" class="btn-lg btn-block">Iniciar sesión</a>
           <a href="./micuenta.php" class="btn-lg btn-block">Mi cuenta</a>
      </div>
   
      </div>

    </div>

  </div>
</div>

<div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
        <h5>&nbsp<span class="icon-user"></span>&nbsp Zonas de Reparto:</h5>

      <div class="center ">
      <img   src="./img/zonasr.jpg" class="img-fluid" class="responsive-img" width="650" heigth="400" >  

    </div>

    </div>

  </div>
</div>
</div>


<div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
        <h5>&nbsp<span class="icon-user"></span>&nbsp Proceso de lavado:</h5>

      <div class="center ">
      <img   src="./img/procesos.jpg" class="img-fluid" class="responsive-img" width="650" heigth="400" >  

    </div>

    </div>

  </div>
</div>
</div>

<div class="container fluid ">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 li">

			    <div class="link col-12 text-center" >     
			    <div  class="link"  >  <a class="btn btn-primary btn-lg" href="<?php echo $c11 ?>">
			    	<span class="icon-facebook"></span></a>  </div>
			    <div  class="link"  >  <a class="btn btn-success btn-lg" href="<?php echo $c12 ?>">
			    	<span class=" icon-whatsapp"></span></a>  </div>
          <div  class="link"  >  <a class="btn btn-success btn-lg" href="https://wa.link/mp1e6d">
            <span class=" icon-whatsapp"></span></a>  </div>
			    <div  class="link"  >  <a class="btn btn-warning btn-lg" href="<?php echo $c13 ?>">
			    	<span class="icon-instagram"></span></a>  </div>
			    </div>


    </div>

  </div>
</div>


<?php include('panel/includes/footer.php'); ?>


