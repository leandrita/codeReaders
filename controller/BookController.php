<?php
class controller
{
    private $model;

    public function __construct()
    {
        require_once("/Applications/MAMP/htdocs/codeReaders/model/Book.php");
        $this->model = new model();
    }

    public function store($titulo)
    {
        $id = $this->model->insertar($titulo);
        return ($id != false) ? header("Location: show.php?id=" . $id) : header("Location: create.php");
    }

    public function show($id)
    {
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location: index.php");
    }

    public function index($currentPage = 1)
    {
        $recordsPerPage = 5;
        $offset = ($currentPage - 1) * $recordsPerPage;

        return $this->model->getPaginated($offset, $recordsPerPage);
    }

    public function update($id, $titulo, $autor, $descripcion, $isbn)
    {
        return ($this->model->update($id, $titulo, $autor, $descripcion, $isbn) != false) ? header("Location: show.php?id=" . $id) : header("Location: index.php");
    }

    public function delete($id)
    {
        return ($this->model->delete($id)) ? header("Location: /codeReaders/index.php") : header("Location: show.php?id=" . $id);
    }
}
