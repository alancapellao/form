<?php

require_once "config/connection.php";

if (isset($_GET['search'])) {
    $data = $_GET['search'];
    $select = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or telefone LIKE '%$data%' or cidade LIKE '%$data%' or estado LIKE '%$data%' ORDER BY id DESC";
} else {
    $select = "SELECT * FROM usuarios ORDER BY id DESC";
}

$sql = $conn->prepare($select);
$sql->execute();
