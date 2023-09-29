<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Error;

class UserController
{
    private $userModel;
    private $error;
    private $requiredFields = ['nome', 'email', 'telefone', 'genero', 'data_nascimento', 'cidade', 'estado'];

    public function __construct()
    {
        $this->userModel = new User();
        $this->error = new Error();
    }

    public function index(): void
    {
        $users = $this->userModel->getUsers();
        include('../app/views/user/index.php');
    }

    public function search(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $users = $this->userModel->search($_POST['search']);
            $this->responseJSON($users);
            return;
        }

        $this->error->error500();
    }

    public function save(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $responseData = $this->validate($_POST);

            if ($responseData['error']) {
                $this->responseJSON($responseData);
                return;
            }

            if (!$this->userModel->createUser($responseData['response'])) {
                $this->responseJSON(['error' => 1, 'response' => 'Erro ao inserir usuário!']);
                return;
            }

            $this->responseJSON(['error' => 0, 'response' => 'Usuário cadastrado com sucesso!']);
            return;
        }

        include('../app/views/user/save.php');
    }

    public function edit(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $responseData = $this->validate($_POST, true);

            if ($responseData['error']) {
                $this->responseJSON($responseData);
                return;
            }

            if (!$this->userModel->updateUser($responseData['response'])) {
                $this->responseJSON(['error' => 1, 'response' => 'Erro ao editar usuário!']);
                return;
            }

            $this->responseJSON(['error' => 0, 'response' => 'Usuário cadastrado com sucesso!']);
            return;
        }

        $userId = explode('/', $_GET['uri'])[2] ?? '';

        if (!isset($userId) || !is_numeric($userId)) {
            $this->error->error500();
            return;
        }

        $user = $this->userModel->getUserById($userId);
        include('../app/views/user/edit.php');
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['id'] ?? '';

            if (!isset($userId) || !is_numeric($userId) || !$this->userModel->deleteUser($userId)) {
                $this->responseJSON(['error' => 1, 'response' => 'ID inválido!']);
                return;
            }

            $this->responseJSON(['error' => 0, 'response' => 'Usuário deletado com sucesso!']);
            return;
        }

        $this->error->error500();
    }

    private function validate(array $data, bool $requiredID = false): bool|array
    {
        require_once('../app/helpers/filterData.php');

        $requiredFields = $this->requiredFields;

        if ($requiredID) {
            $requiredFields[] = 'id';
        }

        if (!$data = filterData($data, $requiredFields)) {
            return ['error' => 1, 'response' => 'Preencha todos os campos obrigatórios!'];
        }

        $userData = [
            'nome' => $data['nome'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'genero' => $data['genero'],
            'nascimento' => $data['data_nascimento'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
        ];

        if ($requiredID && !is_numeric($data['id'])) {
            return ['error' => 1, 'response' => 'ID inválido!'];
        } else if ($requiredID) {
            $userData['id'] = $data['id'];
        }

        return ['error' => 0, 'response' => $userData];
    }

    private function responseJSON(array $data): void
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
