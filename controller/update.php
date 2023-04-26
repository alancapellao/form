<?php

require_once "../config/connection.php";

if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['genero']) && isset($_POST['data_nascimento']) && isset($_POST['cidade']) && isset($_POST['estado'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, telefone = ?, genero = ?, nascimento = ?, cidade = ?, estado = ? WHERE id = ?");
    $stmt->execute(array($nome, $email, $telefone, $genero, $nascimento, $cidade, $estado, $id));
    
    header("location: ../index.php");
}
