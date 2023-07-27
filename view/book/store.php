<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$obj->guardar($_POST['titulo']);
?>