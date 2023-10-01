<?php include('./panel/includes/header.php'); ?>
<?php include("./panel/data/conexion.php"); ?>
<?php include("./session/sessionup.php"); ?>
<?php include("./includes/menubar.php"); ?>
<link rel="stylesheet" href="css/perfil.css">




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
    
        # code...
$id = $_GET['perido'];

     $query="SELECT * FROM articulos WHERE id_articulo= $id";
     $result=mysqli_query($conexion, $query);
     $filas=mysqli_fetch_assoc($result);
    ?>
                
 <div class="text-center" >
    <br>

    <h4 text-center><span class="con-cart"></span>&nbsp DATOS PARA TU PEDIDO</h4> 
</div>
    
<div class="container p-3 ">

  <div class="row" >
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" >
        <div class="text-center">
            
        <img src="./panel/<?php echo $filas ['art_imagen']  ?>" width="250" heigth="300" >
        </div>
<div>
        <div class="vouch">
        <br>
        <p>__________________________</p> 
        <p><?php echo $filas ['art_nombre']  ?></p>

        <?php 
        $Precio=$filas ['art_precio'];
        $Descuento=$filas ['art_descuento']*$Precio / 100 ;
        $total=$Precio-$Descuento;

         ?>
        <p>Codigo:&nbsp<?php echo $filas ['art_codigo'];?></p>
        <p>Precio: <?php echo $filas ['art_moneda']  ?><?php echo number_format($Precio ,2); ?></p>
        <p>Descuento:&nbsp<?php echo $filas ['art_descuento'];?>%</p>
        <p>Total Descuento:&nbsp<?php echo $filas ['art_moneda']  ?><?php echo number_format($Descuento ,2);?></p>
        <p>Precio Total:&nbsp<?php echo $filas ['art_moneda']  ?><?php echo number_format($total,2);?></p>

        <p>__________________________</p>
        <style>.des{padding-left: 80px; padding-right: 80px;}</style>
        <div class="des">
         <p><?php echo $filas ['art_descripcion']  ?></p>   
        </div>
        <p>__________________________</p>


        </div>
</div>


    </div>
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
        <div class="col align-self-center">
          
    <?php include('./includes/pedidos_create.php'); ?>

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