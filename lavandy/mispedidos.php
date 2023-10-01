<?php include("session/sessionup.php"); ?>
<?php include('panel/includes/header.php'); ?>
<?php include("panel/data/conexion.php"); ?>
<?php include("./includes/menubar.php"); ?>
<link rel="stylesheet" href="css/perfil.css">
      
<?php 
if (isset($_SESSION['cliente'])) { 
  
   include("pedidos_read.php"); 

 die();
} else {?> 


<div class="p-3">
  
</div>

      <div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
      <h5>&nbsp<span class="icon-user"></span>&nbspEstimado Usuario:</h5>
      
      <article>&nbsp&nbspPara visualizar tus pedidos se requiere que inicie sesión...</article>
   
      </div>

    </div>

  </div>
</div>


<div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
      <h5>&nbsp<span class="icon-shrink"></span>&nbsp Acciones:</h5>
      
      <div class="acessos text-center">
            <br><br>  
          <a href="./acesso.php" class="btn-lg btn-block">Iniciar Seción</a> <br>
          <a href="./perfil.php" class="btn-lg btn-block">Cancelar</a> <br>
          
      </div>
   
      </div>

    </div>

  </div>
</div>


<?php
}
?>  


<?php include('panel/includes/footer.php'); ?>


