<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $uri = explode('/', $_GET['uri']);
        $search = $uri[1] ?? '';

        if ($search) {
            $users = $this->userModel->search($search);
        } else {
            $users = $this->userModel->getUsers();
        }

        include('../app/views/user/index.php');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'genero' => $_POST['genero'],
                'nascimento' => $_POST['data_nascimento'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado']
            ];

            if (!$this->userModel->createUser($userData)) {
                echo '<script>alert("Erro ao criar usuário");</script>';
                return;
            }

            header('Location: /usuarios');
        } else {
            include('../app/views/user/create.php'); 
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['id']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
                echo '<script>alert("ID do usuário inválido");</script>';
                return;
            }

            $userData = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'genero' => $_POST['genero'],
                'nascimento' => $_POST['data_nascimento'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
                'id' => $_POST['id']
            ];

            if (!$this->userModel->updateUser($userData)) {
                echo '<script>alert("Erro ao atualizar usuário");</script>';
                return;
            }

            header('Location: /usuarios');
        } else {
            $uri = explode('/', $_GET['uri']);
            $userId = $uri[2];

            if (!isset($userId) || empty($userId) || !is_numeric($userId)) {
                echo '<script>alert("ID do usuário inválido");</script>';
                header('Location: /usuarios');
                return;
            }

            $user = $this->userModel->getUserById($userId); 
            include('../app/views/user/edit.php');
        }
    }

    public function delete()
    {
        $uri = explode('/', $_GET['uri']);
        $userId = $uri[2];

        if (!isset($userId) || empty($userId) || !is_numeric($userId)) {
            echo '<script>alert("ID do usuário inválido");</script>';
        } else if (!$this->userModel->deleteUser($userId)) {
            echo '<script>alert("Erro ao excluir usuário");</script>';
        }

        header('Location: /usuarios');
    }
}
