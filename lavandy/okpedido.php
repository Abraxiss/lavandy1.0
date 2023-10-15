<?php include("session/sessionup.php"); ?>
<?php include('panel/includes/header.php'); ?>
<?php include("panel/data/conexion.php"); ?>
<?php include("./includes/menubar.php"); ?>
<link rel="stylesheet" href="css/perfil.css">
      
<div class="p-3 ">
  
</div>

      <div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
      <h5>&nbsp<span class=" icon-cart"></span>&nbspSolicitud de envio:</h5>
      
      <article>&nbsp Tu pedido fue procesado con exito, 
    pronto nos comunicaremos al número indicado.<br>
    Gracias por tu compra... </article>
   
      </div>

    </div>

  </div>
</div>

<div class="container datos ">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
      <h5>&nbsp<span class="icon-shrink"></span>&nbsp Acciones:</h5>
      
      <div class="acessos text-center">
            <br>
          <a href="./productos.php" class="btn-lg btn-block">Hacer un pedido</a>
          
          <a href="./mispedidos.php" class="btn-lg btn-block">Mis pedidos</a>
          <a href="./micuenta.php" class="btn-lg btn-block">Mi cuenta</a> 

          <br>
      </div>
   
      </div>

    </div>

  </div>
</div>



<?php include('panel/includes/footer.php'); ?>