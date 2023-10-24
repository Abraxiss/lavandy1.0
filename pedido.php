<?php include("session/sessionup.php"); ?>
<?php include('includes/header.php'); ?>
<?php include("panel/data/conexion.php"); ?>
<?php include("./includes/menubar.php"); ?>
<link rel="stylesheet" href="css/perfil.css">
<link rel="shortcut icon" href="./panel/includes/favicon.ico">


<?php 

if (!$_GET) {
  echo'<script type="text/javascript">
    window.location.href="./../index.php";
    </script>';

    exit();
    die();   
} else {?>


<?php 
if (isset($_SESSION['cliente'])) { 
    
 
$id = $_GET['p'];

     $query="SELECT * FROM articulos WHERE id_articulo= $id";
     $result=mysqli_query($conexion, $query);
     $filas=mysqli_fetch_assoc($result);
     $imagen = $filas ['art_imagen'];
     $nombre = $filas ['art_nombre']; 
     $descripcion = $filas ['art_descripcion'];  
?>
  <br>  <br> 
 <div class="text-center" >
<br>
    <h4 text-center><span class="con-cart"></span>&nbsp DATOS PARA TU PEDIDO</h4> 
</div>
    


<div class="container p-3">
  <div class="row">
    <div class="col-sm ">

  <?/*---formulario tabla---*/?>
<form action="crud_pedidos/create.php" method="POST" >
  
    <div class="card-body" style="padding: 0; " > 
     <h5 class="card-title"><?php echo $filas ['art_nombre']  ?></h5>
      <p class="card-text"><?php echo $filas ['art_descripcion']  ?></p>
    </div>


    <div class="form-group" >
       <input class="form-control" type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $idclup  ?>"required>
    </div>

    <div class="form-group" >
       <input class="form-control" type="hidden" id="id_articulo" name="id_articulo" value="<?php echo $filas ['id_articulo']  ?>"required>
    </div>

    <div class="form-row">
    <div class="col">
    <label for="cl_nombre">Nombre de Contacto:</label>
    <input class="form-control" type="text" placeholder="Nombre de Contacto" id="cl_nombre" name="cl_nombre" value="<?php echo $clup ?>">
    <small id="Help" class="form-text text-muted">Confirme el nombre de la persona con quien nos contactaremos.</small>
    </div>

    <div class="col">
    <label for="pd_telefono">Teléfono de contacto:</label>
    <input class="form-control" type="number" placeholder="Telefono de Contacto" id="pd_telefono" name="pd_telefono" value="<?php echo $cl_num ?>" required>
    <small id="Help" class="form-text text-muted">Confirma o ingresa tu número de teléfono.</small>
    </div>
    </div>

    <br>

    <div class="form-row" >
    <div class="col">  
    <label for="pd_cantidad">Cantidad solicitada:</label>
    <input class="form-control" type="number" placeholder="Cantidad a Solicitar" id="pd_cantidad" name="pd_cantidad" required>
    <small id="Help" class="form-text text-muted">Ingrese la cantidad Solicitada.</small>
    </div>
    <div class="col" >
    <label for="pd_ubicacion">Ubicación de envio:</label>
    <input class="form-control" type="text" placeholder="Direccion de envio" id="pd_ubicacion" name="pd_ubicacion" value="<?php echo $cl_dir ?>" required>
    <small id="Help" class="form-text text-muted">Confirma o ingresa la dirección de envio.</small>
    </div>
    </div>

<div class="form-row">
    <div class="col">
    <label for="id_lavado">Tipo de lavado:</label>
    <select class="custom-select" id="id_lavado" name="id_lavado" required>
    <option selected></option>
    <?php 
      $query="SELECT *FROM tipolavados ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_LAVADO']?>" >
      <?php echo $filas ['LAVADO']  ?>
    </option>
    <?php } ?>

    </select>
    </div>

    <div class="col">
    <label for="id_perfume">Perfume </label>
    <select class="custom-select" id="id_perfume" name="id_perfume" required>
    <option selected > </option>
    <?php 
      $query="SELECT *FROM perfume ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_PERFUME']?>" >
      <?php echo $filas ['PERFUME']  ?>
    </option>
    <?php } ?>

    </select>
    </div>
</div>



    <br> <br>
      <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">SOLICITAR</button>

      <a href="productos.php" class="btn btn-success btn-lg btn-block">CANCELAR</a>
  
</form>

    </div>
    <div class="col-sm ">

          <div class="card text-center">
          <div class="card-header">
            <img width="250" heigth="250"   src="panel/<?php echo $imagen ?>" alt="Card image cap">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $nombre  ?></h5>
            <p class="card-text"><?php echo $descripcion  ?></p>
            
          </div>
          <div class="card-footer text-muted">
            lavandy
          </div>
        </div>   

    </div>

  </div>
</div>

 <?php die();
} else {?> 

<div class="p-3">
  
</div>

      <div class="container datos">
  <div class="row center" >

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 descrip">
      <div class="datos"> 
      <h5>&nbsp<span class="icon-user"></span>&nbspEstimado Usuario:</h5>
      
      <article>&nbsp&nbspPara realizar pedidos se requiere que inicie sesión...</article>
   
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

       
<?php
}
?>




<?php include('./panel/includes/footer.php'); ?>