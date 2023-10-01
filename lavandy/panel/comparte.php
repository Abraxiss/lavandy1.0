    

	<br><br>

	<?php

	$vendedor=$id_userup;
	/*$url='localhost/MyCatalogo3.0/session/session.php?ve=';*/
  $url='https://miscatalogos.000webhostapp.com/session/session.php?ve=';

	$link=$url.$vendedor;

	 ?>



    <div class="form-group" >
      <label for="cat_nombre">Link de para Compartir:</label>
      <input class="form-control" type="text" value="<?php echo $link; ?>"  id="myInput" name="cat_nombre" readonly>
	  <button class="btn btn-success btn-lg btn-block "  onclick="myFunction()">Copy Link</button>

      <small id="Help" class="form-text text-muted">Copia el link para compartir tu catálogo.</small>


	<br><br>
      <a href="<?php echo $link; ?>" class="btn btn-primary btn-lg btn-block"> ir a tu catálogo</a>
    </div>


<!-- The button used to copy the text -->


<script>
	
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}	
</script>

