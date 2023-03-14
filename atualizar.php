<?php
include_once("model/connection.php");

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = $conn->prepare("UPDATE users
    SET nome = '$nome', email = '$email', telefone = '$telefone', genero = '$genero', nascimento = '$nascimento', cidade = '$cidade', estado = '$estado'
    WHERE id = '$id'");

    $sql->execute();

    header("location: index.php");
}

?>
