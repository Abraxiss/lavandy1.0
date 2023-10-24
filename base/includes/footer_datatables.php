
<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="datatables/jquery/jquery-3.3.1.min.js"></script>
    <script src="datatables/popper/popper.min.js"></script>
    <script src="datatables/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="datatables/main.js"></script>  
    

<!-- código fecha y hora actual-->  
         <script>
function mostrarFechaYHora() {
  var fechaHoraActual = new Date();

  // Obtener la fecha
  var dia = ('0' + fechaHoraActual.getDate()).slice(-2);  // Agrega un 0 si es necesario
  var mes = ('0' + (fechaHoraActual.getMonth() + 1)).slice(-2);  // Agrega un 0 si es necesario
  var año = fechaHoraActual.getFullYear();

  // Obtener la hora
  var hora = ('0' + fechaHoraActual.getHours()).slice(-2);  // Agrega un 0 si es necesario
  var minutos = ('0' + fechaHoraActual.getMinutes()).slice(-2);  // Agrega un 0 si es necesario
  var segundos = ('0' + fechaHoraActual.getSeconds()).slice(-2);  // Agrega un 0 si es necesario

  // Formatear la fecha y la hora
  var fechaFormateada = año + '-' + mes + '-' + dia;
  var horaFormateada = hora + ':' + minutos + ':' + segundos;

  // Mostrar la fecha y la hora en elementos HTML separados
  document.getElementById('fechapc').innerText =fechaFormateada;
  document.getElementById('horapc').innerText =horaFormateada;
}

// Llamar a la función para mostrar la fecha y la hora
mostrarFechaYHora();

// Actualizar la fecha y la hora cada segundo
setInterval(mostrarFechaYHora, 1000);



    </script>



</body>
</html>
