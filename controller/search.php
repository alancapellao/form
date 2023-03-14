<?php
include("model/connection.php");

if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $select = "SELECT * FROM users WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or telefone LIKE '%$data%' or cidade LIKE '%$data%' or estado LIKE '%$data%'  ORDER BY id DESC";
    }
    else
    {
        $select = "SELECT * FROM users ORDER BY id DESC";
    }

    $sql = $conn->prepare($select);
    $sql->execute();
