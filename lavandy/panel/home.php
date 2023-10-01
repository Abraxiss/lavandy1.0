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
    <div class="col col-lg-4">
      
    </div>
    <div class="col-md-auto">
        <div class="infigrafia">
      	    
      	<img src="img/home.png" width="300" heigth="350" > 
    	</div>

      <div class="menu mm">
        <a href="user_update.php" class="btn btn-primary btn-lg btn-block">MI PERFIL</a>
        
        <a href="catalogos-create-read.php" class="btn btn-primary btn-lg btn-block">MIS CATÁLOGOS</a>
        
        <a href="articulos-create-read.php" class="btn btn-primary btn-lg btn-block">MIS PRODUCTOS</a>
        
        <a href="pedidos_read.php" class="btn btn-primary btn-lg btn-block">MIS PEDIDOS</a>  

      </div>

  </div>
</div>
<div>
	




<?php include('includes/footer.php'); ?>