<?php

include("model/connection.php");

$sql = $conn->prepare("SELECT * FROM users");

?>