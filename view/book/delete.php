<?php
require_once("/Applications/MAMP/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$obj->delete($_GET['id'])
    ?>