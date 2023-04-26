<?php

require_once "../config/connection.php";

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['genero']) && isset($_POST['data_nascimento']) && isset($_POST['cidade']) && isset($_POST['estado'])) {

    $sql = $conn->prepare("INSERT INTO usuarios(nome, email, telefone, genero, nascimento, cidade, estado) VALUES (?,?,?,?,?,?,?)");
    $sql->execute(array($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['genero'], $_POST['data_nascimento'], $_POST['cidade'], $_POST['estado']));
    
    header("location: ../index.php");
}
