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
      	    
      	<img src="img/logo_LAVANDY_1.0.png" width="200" heigth="250" > 
    	</div>

      <div class="menu mm">
        
        <a href="ordenes_read.php" class="btn btn-primary btn-lg btn-block">VENTAS</a>
        <a href="clientes_read.php" class="btn btn-primary btn-lg btn-block">CLIENTES</a>
        
        <a href="traslados_read_p.php" class="btn btn-primary btn-lg btn-block">TRASLADOS </a>
        
         
        <a href="user_update.php" class="btn btn-primary btn-lg btn-block">MI PERFIL</a> 

      </div>

  </div>
    <div class="col col">
      
    </div>


</div>
<div>
	




<?php include('includes/footer.php'); ?>