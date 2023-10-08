<?php
class Connect
{
    private $conn;
    private $host;
    private $user;
    private $database;
    private $password;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USER');
        $this->database = getenv('DB_DATABASE');
        $this->password = getenv('DB_PASSWORD');
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
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
