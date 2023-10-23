<?php include("./../panel/data/conexion.php"); ?>

<?php

  

if (isset($_GET['id'])) {

	  $id = $_GET['id'];

    if ($_GET['p']=='NO') {


    $query = "UPDATE pedidos set 
    pd_cancela = 'SI'
    WHERE id_pedido=$id";

    mysqli_query($conexion, $query);
    mysqli_close($conexion);


    echo'<script>
    alert("Tu Pedido fue cancelado...");
    </script>';
    echo'<script type="text/javascript">
    window.location.href="./../mispedidos.php";
    </script>';
 
    exit();
    die();

    } else {
        if ($_GET['p']=='SI') {

    $query = "UPDATE pedidos set 
    pd_cancela = 'NO'
    WHERE id_pedido=$id";

    mysqli_query($conexion, $query);
    mysqli_close($conexion);
    echo'<script>
    alert("Tu Pedido fue reactivado...");
    </script>';
    echo'<script type="text/javascript">
    window.location.href="./../mispedidos.php";
    </script>';
   
    exit();
    die();
        }

      
    }
    


mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../mispedidos.php";
    </script>';
exit();
die();

}

?>