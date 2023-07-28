<?php
class db
{
    private $host = "localhost";
    private $dbname = "bibliotecaphp";
    private $user = "root";
    private $password = "";
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

?>