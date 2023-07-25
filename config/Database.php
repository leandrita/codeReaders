<?php

$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "bibliotecaphp";

$connection = new mysqli($server_name, $user_name, $password, $database_name);

if (!$connection) {
    echo "Se ha producido un error.";
}

?>