<?php

require_once('../config/Connect.php');

class Client extends Connect
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'clients';
    }

    public function select()
    {
        $query = $this->getConnection()->prepare('SELECT * FROM ' . $this->table);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($name, $email, $phone)
    {
        try {
            $query = $this->getConnection()->prepare("INSERT INTO " . $this->table . " (name, email, phone) VALUES (:name, :email, :phone)");

            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':phone', $phone, PDO::PARAM_STR);

            $query->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($id, $name, $email, $phone)
    {
        try {
            $query = $this->getConnection()->prepare("UPDATE " . $this->table . " SET name = :name, email = :email, phone = :phone WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':phone', $phone, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function selectById($id)
    {
        try {
            $query = $this->getConnection()->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
