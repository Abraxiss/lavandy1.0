
<table class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">#ORDEN</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">ORIGEN</th>
      <th scope="col">DESTINO</th>
      <th scope="col"> ANULADO </th>
      <th scope="col">ALCANCE</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
   
      <?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr> 
      <td >
<a href="crud_diario/create_vta.php?ido=<?php echo $filasR ['ID_ORD']?>" class="btn btn-primary " style="color: white;">
<?php 
$OBS = $filasR ['OBS_ORD'];
if ($OBS=="" ) {
 ?> <span class="icon-price-tag"></span> &nbsp <?php  
echo " " . $filasR ['ABREV'];  echo "-" . $filasR ['N_ORD'] ;  
} else {
 ?> <span class="icon-eye"></span> &nbsp <?php  
echo " " . $filasR ['ABREV'];  echo "-" . $filasR ['N_ORD'] ;  

}
 ?>     
</a>
      </td>
          <th>
            <a class=" btn-sm " href="tel:+51<?php echo $filasR ['TELEFONO'] ?>"  target="_blank"> 
              <span class="icon-phone "></span>
            </a> 
            <?php echo $filasR ['NOMBRE']  ?> 
 
            <br>
              <a href="tel:+51<?php echo $filasR ['TELEFONO'] ?>"  target="_blank"> 
              <a class=" btn-sm " href="https://api.whatsapp.com/send?phone=51<?php echo $filasR ['TELEFONO'] ?>" target="_blank"> 
              <span class="icon-whatsapp "></span>
              </a>         
              <a target="_blank" href="<?php echo $filasR ['LINK_UBICACION']  ?>"> 
              <span class="icon-location"></span> <?php echo $filasR ['DIRECCION']  ?></a> 

          </th> 

          <td scope="row">
           <span class="icon-home3"> </span>  
           <?php echo $filasR ['TDAO']  ?>
           <br>
           <span class="icon-clock2"> </span>  
           <?php echo $filasR ['FECHA_RECOJO']  ?>
             
          </td>

          <td>
           <span class="icon-home3"> </span>  
           <?php echo $filasR ['TDAD']  ?>
           
           <br>
            <span class="icon-clock2"> </span>  
           <?php echo $filasR ['FECHA_ENTREGA']  ?>  
          </td>

           <td>
          
           <?php echo $filasR ['ANULADO']  ?> 
          </td>

          <td>
            <?php echo $filasR ['OBS_ORD']  ?>
            <br>
            <label style="color: red;">
            <?php echo $filasR ['STATUS_TRAS']  ?>
            </label>
           
          </td>         


      <td> 
          <a href="./crud_traslados/apendiente.php?id=<?php echo $filasR ['ID_TRASLADO']  ?>&ord=<?php echo $filasR ['ID_ORD']  ?>" class="btn btn-success"> 
          <span class="icon-truck"></span>
          </a> 
 
          <a href="./crud_traslados/aentregado.php?id=<?php echo $filasR ['ID_TRASLADO']  ?>&ord=<?php echo $filasR ['ID_ORD']  ?>"  class="btn btn-primary"> 
          <span class="icon-box-add"></span>
          </a> 
      </td>
      </tr>
    <?php } ?>


    
    
  </tbody>
</table>
