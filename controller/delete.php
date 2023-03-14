<?php

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->exec("DELETE FROM users where id=$id");
}
?>