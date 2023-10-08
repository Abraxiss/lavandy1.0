<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>


<?php
function generarEnlaceWhatsApp($numero, $mensaje) {
    // Encode the message, maintaining line breaks
    $mensajeCodificado = rawurlencode($mensaje);

    // Replace spaces with the representation URL (%20)
    $mensajeCodificado = str_replace(' ', '%20', $mensajeCodificado);

    // Replace commas with %2C
    $mensajeCodificado = str_replace(',', '%2C', $mensajeCodificado);

    // Replace line breaks with the representation URL (%0A)
    $mensajeCodificado = str_replace('%0D%0A', '%0A', $mensajeCodificado);

    // Formatea el número y el mensaje para ser parte del enlace
    $numeroWhatsApp = str_replace('+', '', $numero);

    // Construye el enlace con la etiqueta <a>
    $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroWhatsApp&text=$mensajeCodificado";

    return $enlaceWhatsApp;
}

?>

<br><br>
      <?/*---------obtiene nombre de catalogo---------------*/?>
<?php if (isset($_POST['id_cliente'])): ?> 
    <?php 

    $ID_TMSJ = $_POST['id_tipo_msj'];
      $query5= "SELECT TIPO_MSJ FROM tipo_mensajes WHERE ID_TIPO_MSJ= $ID_TMSJ";
      $result5=mysqli_query($conexion, $query5);
      $f=mysqli_fetch_assoc($result5);
    $N_TIPO=$f ['TIPO_MSJ'];

    $ID_CLTE = $_POST['id_cliente'];
      $query6= "SELECT NOMBRE, TELEFONO FROM clientes WHERE ID_CLIENTE= $ID_CLTE";
      $result6=mysqli_query($conexion, $query6);
      $f6=mysqli_fetch_assoc($result6);
    $N_CLIENTE=$f6 ['NOMBRE'];
    $N_TELEFONO=$f6 ['TELEFONO'];
     ?>
     <?php else: 
      $ID_TMSJ="";  
      $N_TIPO="";  
      $ID_CLTE="";
      $N_CLIENTE="";  
      $N_TELEFONO=""; 

      ?>

<?php endif ?>

<?/*---------obtiene catidad de mensajes por tipo--------*/?>
<?php if (isset($_POST['id_tipo_msj'])): ?>
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
            <select class="custom-select" id="id_tipo_msj" name="id_tipo_msj" >
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
                <th scope="col">OPCIONES</th>

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

  <?php  

   $numero = "51" . $N_TELEFONO;
   $mensaje = $filas ['MENSAJE'];
   $enlaceWhatsApp = generarEnlaceWhatsApp($numero, $mensaje);

   ?>
 

                  <a href="<?php echo $enlaceWhatsApp;?>" class="btn btn-success" target="_blank"> 
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