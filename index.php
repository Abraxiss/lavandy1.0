<?php include('includes/header.php'); ?>
<link rel="shortcut icon" href="favicon00.ico">

<div id="contenedor_carga">
	<div id="carga"></div>
</div>
<link rel="stylesheet" href="css/perfil.css">
<link rel="stylesheet" href="css/load.css">
<link rel="stylesheet" href="style.css">

	<div class="center ">
	<img   src="./img/logolavandy.gif" class="img-fluid" class="responsive-img" width="650" heigth="400" >	
	</div>

  
<div class="container perfil">
  <div class="row center" >

<div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
    	<div class="datos">	
    	<h5>&nbsp<span class="icon-user"></span>&nbsp Opciones de Ingreso:</h5>
      		 <div class="acessos text-center">
      		 	<br>
			   	<a href="./perfil.php" class="btn-lg btn-block">INGRESAR</a> 
			   	<a href="./acesso.php" class="btn-lg btn-block">INICIAR SESIÓN</a> 
			   	<a href="./productos.php" class="btn-lg btn-block">HACER UN PEDIDO</a> 
			   	<a href="./registro.php" class="btn-lg btn-block">CREAR CUENTA</a> <br>
			 </div>
    	</div>

    </div>

  </div>
</div>



<div class="container fluid ">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 li">

			    <div class="link col-12 text-center" >     
			    <div  class="link"  >  <a class="btn btn-primary btn-lg" href="https://www.facebook.com/OneDeliverycom-101036668322767">
			    	<span class="icon-facebook"></span></a>  </div>
			    <div  class="link"  >  <a class="btn btn-success btn-lg" href="https://wa.link/hxcty7">
			    	<span class=" icon-whatsapp"></span></a>  </div>
			    <div  class="link"  >  <a class="btn btn-success btn-lg" href="https://wa.link/mp1e6d">
			    	<span class=" icon-whatsapp"></span></a>  </div>	    	
			    <div  class="link"  >  <a class="btn btn-warning btn-lg" href="Onedelivery .com25">
			    	<span class="icon-instagram"></span></a>  </div>
			    </div>


    </div>

  </div>
</div>

<script>
	window.onload = function(){
		var contenedor = document.getElementById('contenedor_carga');
		
		contenedor.style.visibility = 'hidden';
		contenedor.style.opacity = '0';

	}

</script>		


<?php include('panel/includes/footer.php'); ?>