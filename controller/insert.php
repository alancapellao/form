<?php
include_once("model/connection.php");

if (isset($_POST['submit'])) {

    $sql = $conn->prepare("INSERT INTO users(id, nome, email, telefone, genero, nascimento, cidade, estado) VALUES (null,?,?,?,?,?,?,?)");
    $sql->execute(array($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['genero'], $_POST['data_nascimento'], $_POST['cidade'], $_POST['estado']));

    header("location: index.php");
}
?>
