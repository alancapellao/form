<?php

require_once "config/connection.php";

if (isset($_GET['delete'])) {

    $id = (int)$_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute(array($id));
}
