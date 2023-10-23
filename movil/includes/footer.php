<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<!-- código fecha y hora actual-->  
         <script>
        // Función para formatear un número con dos dígitos
        function formatearNumero(numero) {
            return numero < 10 ? '0' + numero : numero;
        }

        // Obtener la fecha y hora actual
        var fechaHoraActual = new Date();
        var dia = formatearNumero(fechaHoraActual.getDate());
        var mes = formatearNumero(fechaHoraActual.getMonth() + 1);
        var anio = fechaHoraActual.getFullYear();
        var horas = formatearNumero(fechaHoraActual.getHours());
        var minutos = formatearNumero(fechaHoraActual.getMinutes());
        var segundos = formatearNumero(fechaHoraActual.getSeconds());

        // Construir la cadena de fecha y hora en el formato deseado
        var fechaFormateada = dia + '/' + mes + '/' + anio;
        var horaFormateada = horas + ':' + minutos + ':' + segundos;

        // Mostrar la fecha en el div con id "fechaDiv"
        document.getElementById('fechahoy').innerText = fechaFormateada;

        // Mostrar la hora en el div con id "horaDiv"
        document.getElementById('horahoy').innerText = horaFormateada;
    </script>


    

</body>
</html>
