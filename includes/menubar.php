
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/stylosmenu.css">
<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    background-color: #49257C;
}
.modal-content {

    
    background-color: white;
color: #49257C;
}

a{    
   
color: white;
}

a:hover {
  background-color: yellow;
  border-radius: 6px;
}

</style>


  <?php      

  $query7= "SELECT * FROM lavandy_datos WHERE id_user= 1"; 
  $result7 = mysqli_query($conexion, $query7);
  $filas7=mysqli_fetch_array($result7);
    $c3 =strtoupper($filas7['user_empresa']) ;
    $c8 = $filas7['user_portada'];
    $c9 = $filas7['user_logo'];
    $c10 = $filas7['user_perfil'];
    $c11 = $filas7['user_facebook'];
    $c12 = $filas7['user_whatsapp'];
    $c13 = $filas7['user_instagram']; 
    $c14 = $filas7['user_correocop'];
    $c15 = $filas7['user_telefono'];
    $c16 = $filas7['user_direccion'];
 
   ?>



<nav class="navbar navbar-expand-lg  bar">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-menu2" style="color:white;"></span>
  </button>	

  
    
  <div class="collapse navbar-collapse" id="navbarNav">
     <img  src="panel/<?php echo $c9 ?>"  class="rounded-circle" class="responsive-img" width="40" heigth="20" >

    <ul class="navbar-nav">
    	
      <li class="nav-item active">
        <a class="nav-link " href="perfil.php">&nbsp<span class="icon-home "></span>&nbsp home</a>
      </li>
      <li class="nav-item active">
         <a class="nav-link" href="productos.php">&nbsp<span class="icon-map"></span>&nbsp Servicios</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link " href="mispedidos.php">&nbsp<span class="icon-cart"></span>&nbsp Mis Pedidos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="micuenta.php">&nbsp<span class=" icon-user-check"></span>&nbsp Mi Cuenta</a>
      </li>
       <li class="nav-item active">
     <a class="nav-link  " href="#V2" data-toggle="modal">&nbsp<span class="icon-exit "> salit</a>
      </li>

    </ul>

  </div>




          <div class="userup">
         
           
<?php 
if (isset($_SESSION['cliente'])) {
?>
<h6 class="font-weight-bold"><?php echo $clup ; ?> &nbsp &nbsp</h6>
<?php
} else {
 ?> 
<h6 class="font-weight-bold"><?php echo $c3 ; ?> &nbsp &nbsp</h6>
<?php
}
?>

<a class="nav-link  " href="#V2" data-toggle="modal">&nbsp<span class="icon-exit "></a>


     

          </div>



<div class="modal" tabindex="-1" role="dialog" id="V2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CERRAR SESIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que deseas Cerrar Sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">CANCELAR</button>
          <a href="./session/salirsession.php" class="btn btn-danger" > 

         CERRAR SESIÓN
          </a>
        
      </div>
    </div>
  </div>
</div>



</nav>