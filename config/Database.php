<?php
class db
{
    private $host = "localhost";
    private $dbname = "biblioteca";
    private $user = "root";
    private $password = "root";

    public function conection()
    {
        try {
            $PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
