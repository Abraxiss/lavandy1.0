
<?php
$hora_pc = "<div id='horapc'></div>";
$fecha_pc = "<div id='fechapc'></div>";
?>


<?php
$fecha_serv = date('Y-m-d'); // Formato de fecha: año-mes-día
$hora_serv = date('H:i:s');  // Formato de hora: horas:minutos:segundos

?>


<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="stylos/stylosmenu.css">

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

</style>




<nav class="navbar navbar-expand-lg navbar-dark navbar-bg  bar">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>	

      <div class="infigrafia" >
        <a href="home.php">
      <img style="border-radius: 50px" src="img/lavandy.gif" width="40" heigth="40" > </a>
      </div> 

    
  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
      <li class="nav-item active">
       
         <a class="nav-link" href="home.php"><span class="icon-home"> </span> HOME</a>
      </li>    	
      <li class="nav-item active">
       
         <a class="nav-link" href="tablas.php"> DATA</a>
      </li> 

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          TABLAS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" 
          href="form_create_read.php?&t=lavandy_datos">lavandy_datos</a>
<div class="dropdown-divider"></div>
          <a class="dropdown-item" 
          href="form_create_read.php?t=forma_pagos">FORMA DE PAGOS</a>
          <a class="dropdown-item" 
          href="form_create_read.php?t=horarios_movil">HORARIOS MOVIL</a>
          <a class="dropdown-item" 
          href="form_create_read.php?t=tiendas">TIENDAS</a>
          <a class="dropdown-item" 
          href="form_create_read.php?t=ccosto">CETRO DE COSTOS</a>
          <a class="dropdown-item" 
          href="form_create_read.php?t=perfil_user">PERFIL USER</a>
<div class="dropdown-divider"></div>
          <a class="dropdown-item" 
          href="form_create_read.php?t=procesos">PROCESOS</a>          
          <a class="dropdown-item" 
          href="form_create_read.php?t=metodos">METODOS</a>
          <a class="dropdown-item" 
          href="form_create_read.php?t=secuencias">SECUENCIAS</a>
          <a class="dropdown-item" 
          href="form_create_read.php?&t=pcge">PLAN CONTABLE</a> 
        </div>
      </li>


      <li class="nav-item active">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PRODUCTOS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="articulos-create-read.php">MIS PRODUCTOS</a>
          <a class="dropdown-item" href="catalogos-create-read.php">MIS CATÁLOGOS</a>

        </div>

      <li class="nav-item active">
        <a class="nav-link" href="mensajes_read.php"><span class="icon-whatsapp"> </span> MENSAJES</a>
      </li>
      


      <li class="nav-item active">
        <a class="nav-link active" href="user_update.php"><span class="icon-user"> </span> DATOS LAVANDY</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link active" href=""><span class="icon-user"> </span> USUARIOS</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link active" href="user_update.php">MI PERFIL</a>
      </li>
    </ul>

  </div>




          <div class="userup">
            <span class="icon-user">&nbsp</span>
            <h6 class="font-weight-bold"> <?php  echo $userup ; ?>&nbsp &nbsp</h6>  
          <a href="#V1" class="btn btn-primary" data-toggle="modal"> 
           <span class="icon-exit"></span>
          </a>

          </div>
 


<div class="modal" tabindex="-1" role="dialog" id="V1" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content " >
      <div class="modal-header" >
        <h5 class="modal-title">CERRAR SESIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que deseas Cerrar Sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">CANCELAR</button>
          <a href="./valida/valida_exit.php" class="btn btn-danger" > 

         CERRAR SESIÓN
          </a>
        
      </div>
    </div>
  </div>
</div>



</nav>

<br><br>