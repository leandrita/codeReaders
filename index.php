<?php
require_once 'conexion.php';

$codereaders = "SELECT * FROM codereaders";
$resultado = mysqli_query($conexion, $codereaders);
?>