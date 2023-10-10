<?php include('includes/header.php'); ?>
<?php include('menubar.php'); ?>

<link rel="stylesheet" href="style.css">




<style>
	.infigrafia{

		padding-top: 20px;
		padding-bottom: 10px;
	}



.menu a:hover {
filter: brightness(80%);

}
.mm{
  font: 130% sans-serif;
}



</style>




<div class="container">
  <div class="row text-center">
    <div class="col col">
      
    </div>
    <div class="col col-8">
        <div class="infigrafia">
      	    
      	<img src="img/logo_LAVANDY_1.0.png" width="150" heigth="200" > 
    	</div>
<br><br>
      <div class="menu mm">
        
        <a href="ordenes_read.php" class="btn btn-primary btn-lg btn-block"> <span class="icon-price-tags"> </span> VENTAS</a>
        <a href="clientes_read.php" class="btn btn-primary btn-lg btn-block"><span class="icon-users"> </span> CLIENTES</a>
        
        <a href="traslados_read_p.php" class="btn btn-primary btn-lg btn-block"> <span class="icon-truck"> </span> TRASLADOS </a>

        <a href="mensajes_enviar.php" class="btn btn-primary btn-lg btn-block"> <span class="icon-whatsapp"> </span> MENSAJES</a>

        <a href="caja_read.php" class="btn btn-primary btn-lg btn-block"> <span class="icon-drawer"> </span> MI CAJA</a> 
         
        <a href="user_update.php" class="btn btn-primary btn-lg btn-block"> <span class="icon-user"> </span>MI PERFIL</a> 

      </div>

  </div>
    <div class="col col">
      
    </div>


</div>
<div>
	




<?php include('includes/footer.php'); ?>