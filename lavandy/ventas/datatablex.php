<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="datatables/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="datatables/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
    <?php 
    $queryR="SELECT clientes.*, tiendas.TIENDA, tiendas.ABREV, perfume.PERFUME, clientes.ID_CLIENTE
FROM (clientes INNER JOIN tiendas ON clientes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN perfume ON clientes.AROMA_PREFERIDO = perfume.ID_PERFUME
ORDER BY clientes.ID_CLIENTE DESC
";
    $resultR=mysqli_query($conexion, $queryR);
    


    ?>



<table id="example" class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
   
      
      <th scope="col">NOMBRE</th>
      <th scope="col">
        <span class="icon-home3 "></span> |
      <span class="icon-star-full "></span></th>

      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
   
        <?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr> 
     

      <td>
        <a href="tel:+51<?php echo $filasR ['TELEFONO'] ?>" class="btn 
          btn-primary " target="_blank"> 
          <span class="icon-phone "></span>
        </a> 
        <?php echo $filasR ['NOMBRE']  ?>  <?php echo $filasR ['TELEFONO']  ?> 
      <br>
        <a href="https://api.whatsapp.com/send?phone=51<?php echo $filasR ['TELEFONO'] ?>" class="btn btn-success " target="_blank"> 
           <span class="icon-whatsapp "></span>
        </a>

        <a target="_blank" href="<?php echo $filasR ['LINK_UBICACION']  ?>"> 
        <span class="icon-location"></span>        
        <?php echo $filasR ['DIRECCION']  ?></a>  
             
      </td>
      <td> <span class="icon-home3"> </span>  
           <?php echo $filasR ['ABREV']  ?>
        <br>
           <span class="icon-star-full "> </span>  
           <?php echo $filasR ['CALIFICACION_CLIENTE']  ?>
      </td>

      <td> 
                    <a href="clientes_update.php?id=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-primary"> 
                    <span class="icon-checkmark"></span>
            </a> |
                    <a href="ordenes_create.php?idc=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-dark"> 
                    <span class="icon-price-tags"></span>
            </a> |

            <a href="articulos_delete.php?id=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-success"> 
                    <span class="icon-cog"></span>
            </a>

      </td>
            </tr>
    <?php } ?>


    
    
  </tbody>
</table>          


    
<?php include('includes/footer_datatables.php'); ?>