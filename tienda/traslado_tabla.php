<table class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">CLIENTE </th>
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

          <th>
            <a href="tel:+51<?php echo $filasR ['TELEFONO'] ?>" class="btn 
              btn-primary btn-sm " target="_blank"> 
              <span class="icon-phone "></span>
            </a> 
            <?php echo $filasR ['NOMBRE']  ?> 
 
            <br>
              <a href="https://api.whatsapp.com/send?phone=51<?php echo $filasR ['TELEFONO'] ?>" class="btn btn-success btn-sm " target="_blank"> 
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
           <?php echo $filasR ['HORARIO']  ?>
             
          </td>

          <td>
           <span class="icon-home3"> </span>  
           <?php echo $filasR ['TDAD']  ?>
           
           <br>
           <span class="icon-price-tags"> </span>
           <?php echo $filasR ['ABREV']  ?> -
           <?php echo $filasR ['N_ORD']  ?> 
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
          <a href="traslados_update.php?id=<?php echo $filasR ['ID_TRASLADO']  ?>" class="btn btn-primary"> 
          <span class="icon-checkmark"></span>
          </a> |


      </td>
      </tr>
    <?php } ?>


    
    
  </tbody>
</table>
