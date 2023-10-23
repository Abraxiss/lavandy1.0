<?php include('includes/header.php'); ?>
<?php include('menubar.php'); ?>

<link rel="stylesheet" href="style.css">


<style>

	.infigrafia{
max-width: 100%; /* Asegura que el contenedor no sea más ancho que la pantalla */
		padding-top: 20px;
		padding-bottom: 10px;
	}
.imagen {
  width: 100%; /* La imagen ocupa todo el ancho del contenedor */
  height: auto; /* La altura se ajusta automáticamente para mantener la proporción de la imagen */
  display: block; /* Elimina cualquier espacio adicional alrededor de la imagen */
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
    <div class="col col-8 col-lg-6">
      <br> <br>
      <div class="infigrafia">
      <img src="img/lavandy.gif" width="200" heigth="200" > 
    	</div>
      <br><br>
      <div class="menu mm">
        
        
        <a href="clientes_read.php" class="btn btn-primary btn-lg btn-block"><span class="icon-users"> </span> CLIENTES</a>
        
        <a href="traslados_read_p.php" class="btn btn-primary btn-lg btn-block"> <span class="icon-truck"> </span> TRASLADOS </a>

        <a href="user_update.php" class="btn btn-primary btn-lg btn-block"> <span class="icon-user"> </span>MI PERFIL</a> 

      </div>

  </div>
    <div class="col col">
      
    </div>


</div>
<div>
	




<?php include('includes/footer.php'); ?>