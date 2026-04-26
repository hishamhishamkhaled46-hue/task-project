<?php
$id = $_GET['id'];

include("conn.php");

$delete = "DELETE FROM `users` WHERE id = '$id'";
$conn -> query($delete);

header("location:../users.php");
?>