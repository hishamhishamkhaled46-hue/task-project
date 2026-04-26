<?php
$id = $_GET['id'];

include("conn.php");

$delete = "DELETE FROM `products` WHERE id = '$id'";
$conn -> query($delete);

header("location:../products.php");
?>