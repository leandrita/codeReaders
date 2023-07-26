<?php

class model
{
    private $PDO;
    public function __construct()
    {
        require_once("/Applications/MAMP/htdocs/codeReaders/config/Database.php");
        $con = new db();
        $this->PDO = $con->conection();
    }
    public function insertar($titulo)
    {
        $statement = $this->PDO->prepare("INSERT INTO codereaders VALUES(null,:titulo)");
        $statement->bindParam(":titulo", $titulo);
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }
    public function show($id)
    {
        $statement = $this->PDO->prepare("SELECT * FROM codereaders where id = :id limit 1");
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
    public function index()
    {
        $statement = $this->PDO->prepare("SELECT * FROM codereaders");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    public function update($id, $titulo)
    {
        $statement = $this->PDO->prepare("UPDATE codereaders SET titulo = :titulo WHERE id = :id");
        $statement->bindParam(":titulo", $titulo);
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? $id : false;
    }
    public function delete($id)
    {
        $statement = $this->PDO->prepare("DELETE FROM codereaders WHERE id = :id");
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? true : false;
    }
}
?>