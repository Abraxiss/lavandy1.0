<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br><br>
      <?/*---------obtiene nombre de catalogo---------------*/?>

<?php
if (isset($_GET['id_cliente']) AND isset($_GET['id_tipo_msj'])) {
    $ID_CLTE = $_GET['id_cliente'];
      $query6= "SELECT NOMBRE, TELEFONO FROM clientes WHERE ID_CLIENTE= $ID_CLTE";
      $result6=mysqli_query($conexion, $query6);
      $f6=mysqli_fetch_assoc($result6);
    $N_CLIENTE=$f6 ['NOMBRE'];
    $N_TELEFONO=$f6 ['TELEFONO'];

    $ID_TMSJ = $_GET['id_tipo_msj'];
      $query5= "SELECT TIPO_MSJ FROM tipo_mensajes WHERE ID_TIPO_MSJ= $ID_TMSJ";
      $result5=mysqli_query($conexion, $query5);
      $f=mysqli_fetch_assoc($result5);
    $N_TIPO=$f ['TIPO_MSJ']; 
} elseif (isset($_GET['id_cliente'])) {
      $ID_CLTE = $_GET['id_cliente'];
      $query6= "SELECT NOMBRE, TELEFONO FROM clientes WHERE ID_CLIENTE= $ID_CLTE";
      $result6=mysqli_query($conexion, $query6);
      $f6=mysqli_fetch_assoc($result6);
    $N_CLIENTE=$f6 ['NOMBRE'];
    $N_TELEFONO=$f6 ['TELEFONO'];
      $ID_TMSJ="";  
      $N_TIPO="";  

}else {

      $ID_TMSJ="";  
      $N_TIPO="";  
      $ID_CLTE="";
      $N_CLIENTE="";  
      $N_TELEFONO=""; 

}


?>



<?/*---------obtiene catidad de mensajes por tipo--------*/?>
<?php if (isset($_GET['id_tipo_msj'])): ?>
  <?php 

  $query= "SELECT * FROM mensajes WHERE ID_TIPO_MSJ= $ID_TMSJ";
  $result=mysqli_query($conexion, $query);

  ?>  
  <?php else:
  $query= "SELECT * FROM mensajes  ";
  $result=mysqli_query($conexion, $query);

   ?>
<?php endif ?>

            

<div class="container">
  <div class="row">
    <div class="col-sm-4">
     <h4>ENVIAR MENSAJE:</h4> 
                 <?/*---formulario tabla---*/?>
<div class="contenedor" style="padding: 10px; border: 1px solid lightgrey">
            

            <form style="padding: 10px;"  action="mensajes_enviar.php" method="GET" class="colm">

            <div class="form-row">     
            <label for="id_cliente">CLIENTE</label>
            <select class="custom-select" id="id_cliente" name="id_cliente" required>
            <option selected value="<?php echo $ID_CLTE ?>">
              <?php echo $N_CLIENTE ?></option>
            <?php 
              $queryC="SELECT *FROM clientes ";
              $resultC=mysqli_query($conexion, $queryC);
            ?>
            <?php while($filasC=mysqli_fetch_assoc($resultC)) { ?>      
            <option value="<?php echo $filasC ['ID_CLIENTE']?>" >
              <?php echo $filasC ['TELEFONO']  ?>  <?php echo $filasC ['NOMBRE']  ?>
            </option>
            <?php } ?>
            </select>
            </div>

            <br>

            <div class="form-row">    
            <label for="id_tipo_msj">TIPO DE MESAJE</label>
            <select class="custom-select" id="id_tipo_msj" name="id_tipo_msj" required >
            <option selected value="<?php echo $ID_TMSJ ?>">
              <?php echo $N_TIPO ?></option>
            <?php 
              $queryM="SELECT *FROM tipo_mensajes ORDER BY TIPO_MSJ ";
              $resultM=mysqli_query($conexion, $queryM);    ?>
            <?php while($filasM=mysqli_fetch_assoc($resultM)) { ?>      
            <option value="<?php echo $filasM ['ID_TIPO_MSJ']?>" >
              <?php echo $filasM ['TIPO_MSJ']  ?>
            </option>
            <?php } ?>
            </select>
            </div>

<br>

          <button type="submit" class="btn btn-lg btn-block btn-primary" id="guardar" name="guardar">LISTAR</button>
        </form> 

</div>
        

    </div>
    <div class="col-sm">



             
            <h5>TIPO DE MENSAJE: <?php echo $N_TIPO; ?></h5>
              

          <?/*---cabeseras de la tabla---*/?>

          <table class="table table-bordered text-center " >
            <thead class="thead-light ">
              <tr>

                
                <th scope="col">ITEM</th>
                <th scope="col">MENSAJES</th>
                <th scope="col">ENVIAR</th>

              </tr>
            </thead>

            <?/*---contenido de la tabla---*/?>

            <tbody>

            <?php while($filas=mysqli_fetch_assoc($result)) { ?>
                <tr>
                  
                  <td>
                      <?php echo $filas ['ID_MENSAJE'];?>
                  </td>
                  
                  <td align="left">
                   <?php echo $filas ['MENSAJE'];?>
                   </td>

                 <td>

                <div class="container text-center ">

 

                  <a target="_blank" href="crud_mensajes/enviar.php?n=<?php echo $N_TELEFONO ?>&m=<?php echo $filas ['ID_MENSAJE']?>" class="btn btn-success " > 
                    <span class="icon-whatsapp"></span>
                  </a>

                </div>

                 </td>


                </tr>

                  


             <?php } ?>

            </tbody>
          </table>


    </div>

  </div>
</div>






<?php include('includes/footer.php'); ?>