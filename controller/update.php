<?php
include_once("model/connection.php");

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = $conn->prepare("SELECT * FROM users WHERE id=$id");

    $sql->execute();

    $fetchUsers = $sql->fetchAll();

    foreach ($fetchUsers as $key => $value) {
        $nome = $value['nome'];
        $email = $value['email'];
        $telefone = $value['telefone'];
        $genero = $value['genero'];
        $data_nasc = $value['nascimento'];
        $cidade = $value['cidade'];
        $estado = $value['estado'];
    }
}
?>
