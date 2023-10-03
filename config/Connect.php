<?php

define('HOST', 'localhost');
define('USER', 'root');
define('DATABASE', 'cadastream');
define('PASSWORD', '');

class Connect
{
    private $conn;

    public function __construct()
    {
        $this->Conn();
    }

    private function Conn()
    {
        try {
            $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    protected function getConnection()
    {
        return $this->conn;
    }
}
