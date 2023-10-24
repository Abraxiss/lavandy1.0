<?php
session_start();

// Imprime
echo "Color: " . $_SESSION['color'] . ".<br>";
echo "Animal " . $_SESSION['animal'] . ".";

?>