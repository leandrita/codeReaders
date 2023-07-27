<?php
class model
{
    private $PDO;
    public function __construct()
    {
        require_once("C://xampp/htdocs/codeReaders/config/Database.php");
        $con = new db();
        $this->PDO = $con->conection();
    }

    public function insertar($titulo, $autor, $descripcion, $isbn, $imagen)
    {
        $statement = $this->PDO->prepare("INSERT INTO codereaders VALUES(null, :titulo, :autor, :descripcion, :ISBN, :imagen)");
        $statement->bindParam(":titulo", $titulo);
        $statement->bindParam(":autor", $autor);
        $statement->bindParam(":descripcion", $descripcion);
        $statement->bindParam(":ISBN", $isbn);
        $statement->bindParam(":imagen", $imagen);
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function show($id)
    {
        $statement = $this->PDO->prepare("SELECT * FROM codereaders WHERE id = :id LIMIT 1");
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function index()
    {
        $statement = $this->PDO->prepare("SELECT * FROM codereaders");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function update($id, $titulo, $autor, $descripcion, $isbn, $imagen)
    {
        if ($imagen) {
            // Si se proporciona una nueva imagen, actualiza también el campo 'imagen'
            $statement = $this->PDO->prepare("UPDATE codereaders SET título = :titulo, autor = :autor, descripción = :descripcion, ISBN = :isbn, imagen = :imagen WHERE id = :id");
            $statement->bindParam(":imagen", $imagen);
        } else {
            // Si no se proporciona una nueva imagen, actualiza todo excepto 'imagen'
            $statement = $this->PDO->prepare("UPDATE codereaders SET título = :titulo, autor = :autor, descripción = :descripcion, ISBN = :isbn WHERE id = :id");
        }

        // Bind de otros parámetros
        $statement->bindParam(":titulo", $titulo);
        $statement->bindParam(":autor", $autor);
        $statement->bindParam(":descripcion", $descripcion);
        $statement->bindParam(":isbn", $isbn);
        $statement->bindParam(":id", $id);

        return ($statement->execute()) ? true : false;
    }

    public function delete($id)
    {
        $statement = $this->PDO->prepare("DELETE FROM codereaders WHERE id = :id");
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? true : false;
    }
}
?>
