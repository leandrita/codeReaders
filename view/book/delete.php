<?php
require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$obj->delete($_GET['id'])
    ?>