<?php
class controller
{
    private $model;
    public function __construct()
    {
        require_once("C://xampp/htdocs/codeReaders/model/BookModel.php");
        $this->model = new model();
    }
    public function guardar($titulo, $autor, $descripcion, $isbn, $imagen)
    {
        $id = $this->model->insertar($titulo);
        return ($id != false) ? header("Location: show.php?id=" . $id) : header("Location: create.php");
    }
    public function show($id)
    {
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location: index.php");
    }
    public function index()
    {
        return ($this->model->index()) ? $this->model->index() : false;
    }
    public function update($id, $titulo)
    {
        return ($this->model->update($id, $titulo) != false) ? header("Location: show.php?id=" . $id) : header("Location: index.php");
    }
    public function delete($id)
    {
        return ($this->model->delete($id)) ? header("Location: /codeReaders/index.php") : header("Location: show.php?id=" . $id);
    }
}

?>