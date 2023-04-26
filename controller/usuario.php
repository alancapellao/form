<?php

require_once "config/connection.php";

if (!empty($_GET['id'])) {

    $id = (int)$_GET['id'];

    $sql = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $sql->execute(array($id));

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
