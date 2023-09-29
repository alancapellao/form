<?php
namespace App\Models;

use App\Models\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getUsers() : array|bool
    {
        return $this->db->query('SELECT * FROM usuarios')->fetchAll();
    }

    public function getUserById($userId) : array|bool
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
        $stmt->bindValue(':id', $userId);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function search($search) : array|bool
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE nome LIKE :search");
        $stmt->bindValue(':search', "%$search%");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function createUser($userData) : bool
    {
        $column = implode(', ', array_keys($userData));
        $bind = implode(', ', array_fill(0, count($userData), '?'));

        $stmt = $this->db->prepare("INSERT INTO usuarios ($column) VALUES ($bind)");

        if (!$stmt->execute(array_values($userData))) {
            return false;
        }

        return true;
    }

    public function updateUser($userData) : bool
    {
        $id = $userData['id'];
        unset($userData['id']);

        $columnAndValue = implode(', ', array_map(function ($column) {
            return "$column = ?";
        }, array_keys($userData)));

        $stmt = $this->db->prepare("UPDATE usuarios SET $columnAndValue WHERE id = $id");

        if (!$stmt->execute(array_values($userData))) {
            return false;
        }

        return true;
    }

    public function deleteUser($userId) : bool
    {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindValue(':id', $userId);

        if (!$stmt->execute()) {
            return false;
        }

        return true;
    }
}
