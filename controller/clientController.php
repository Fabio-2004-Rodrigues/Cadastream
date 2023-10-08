<?php

require_once('../model/Client.php');

class clientController
{

    private $model;

    public function __construct()
    {
        $this->model = new Client();
    }

    public function select()
    {
        return $this->model->select();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $clients = $this->select();

            $emailExists = false;
            $phoneExists = false;

            foreach ($clients as $client) {
                if ($client['email'] === $email) {
                    $emailExists = true;
                }
                if ($client['phone'] === $phone) {
                    $phoneExists = true;
                }
                if ($emailExists && $phoneExists) {
                    break;
                }
            }

            if (!$emailExists && !$phoneExists) {
                if ($this->model->create($name, $email, $phone)) {
                    header('Location: index.php');
                    exit();
                } else {
                    echo 'Não foi possível fazer a inserção';
                }
            } else {
                if ($emailExists) {
                    echo 'O e-mail já existe.';
                }
                if ($phoneExists) {
                    echo 'O telefone já existe.';
                }
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $clients = $this->select();

            $emailExists = false;
            $phoneExists = false;

            foreach ($clients as $client) {
                if ($client['id'] != $id) {
                    if ($client['email'] === $email) {
                        $emailExists = true;
                    }
                    if ($client['phone'] === $phone) {
                        $phoneExists = true;
                    }
                }

                if ($emailExists && $phoneExists) {
                    break;
                }
            }

            if (!$emailExists && !$phoneExists) {
                if ($this->model->update($id, $name, $email, $phone)) {
                    header('Location: index.php');
                    exit();
                } else {
                    echo 'Não foi possível atualizar o cliente';
                }
            } else {
                if ($emailExists) {
                    echo 'O e-mail já existe.';
                }
                if ($phoneExists) {
                    echo 'O telefone já existe.';
                }
            }
        }
    }


    public function selectById($id)
    {
        return $this->model->selectById($id);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_GET['a'] === 'remover') {
            $id = $_POST['id'];
            $this->model->delete($id);
            header('Location: index.php');
            exit();
        }
    }
}
